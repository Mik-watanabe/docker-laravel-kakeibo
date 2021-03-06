@extends('layouts.app')

@section('title')
  支出TOP
@endsection

@section('content')
<div class="spending-top-container c-list-content">
  <h1 class="c-list-content-title">支出リスト</h1>
  <div class="spending-upper-group">
    <div class="total-amount-section">
        <span class="total-amount-heading">合計：</span>
        <span class="total-amount">{{ $spendings->sum('amount') }} 円</span>
    </div>
    <div class="ranking-section">
        <span class="ranking-section-heading">カテゴリ別ランキング：</span>
          @if (!$rankings)
            <span class="ranking-section-txt">支出が登録されていません</span>
          @else
            {{-- ランキング上位３位 --}}
            @foreach ($rankings as $key => $ranking)
              <span class="ranking-section-txt">
                <span class="ranking-heading">{{ $loop->index + 1 }}位</span>
                {{ $key }}／{{ $ranking }}円
              </span>
            @endforeach
          @endif
    </div>
    <a href="{{ route('spendings.register') }}" class="link-register">支出を登録する</a>
    <form action="{{ route('spendings.top') }}" class="search-form" method="GET">
        <h2 class="search-form-title">絞り込み検索<a href="{{ route('spendings.top')}}" class="search-form-title-link">元に戻す</a></h2>
        <div class="search-form-input-list">
          <label>
            <span class="search-form-heading">カテゴリ：</span>
            <select name="category_id" class="search-form-input select">
              @if (!$categories)
                <option selected disabled>カテゴリーが登録されていません</option>
              @else
                @if (is_null($categoryId))
                  <option selected disabled>カテゴリーを選択してください</option>
                @endif
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(!is_null($categoryId) && $category->id == $categoryId) selected @endif>{{ $category->name }}</option>
                  @endforeach
              @endif
            </select>
          </label>
          <label>
            <span class="search-form-heading">日付：</span>
            <input type="date" name="date_start" class="search-form-input" @if(!is_null($dateStart)) value="{{ $dateStart }}" @endif/>
            <span class="deco">　〜　</span>
            <input type="date" name="date_finish" class="search-form-input" @if(!is_null($dateFinish)) value="{{ $dateFinish }}" @endif/>
          </label>
          <div>
              <button class="c-btn search-form-btn">検索</button>
          </div>
        </div>
    </form>
  </div>
  <div class="c-list">
    <table class="spending-table c-table">
      <tr>
        <th width="25%">支出名</th>
        <th width="20%">カテゴリ</th>
        <th width="15%">金額</th>
        <th width="15%">日付</th>
        <th width="12.5%">編集</th>
        <th width="12.5%">削除</th>
      </tr>
      @if ($spendings->isEmpty())
        <tr>
          <td>収入は登録されていません</td>
          <td>　　</td>
          <td>　　</td>
          <td>　　</td>
          <td>　　</td>
          <td>　　</td>
        </tr>
      @else
        @foreach ($spendings as $spending)
          <tr>
            <td>{{ $spending->name }}</td>
            <td>{{ $spending->category->name }}</td>
            <td>{{ $spending->amount }}</td>
            <td>{{ $spending->accrualDateForView() }}</td>
            <td><a href="{{ route('spendings.edit', ['spending' => $spending]) }}" class="table-link edit">編集</a></td>
            <td><a href="{{ route('spendings.destroy', $spending)}}" class="table-link delete"  onclick="return confirm('本当に削除しますか?')">削除</a></td>
          </tr>
        @endforeach
      @endif
    </table>
  </div>
</div>
@endsection
