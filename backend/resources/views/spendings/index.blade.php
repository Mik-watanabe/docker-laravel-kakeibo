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
                {{ $key }}／{{$ranking->sum('amount')}}円
              </span>
            @endforeach
          @endif
    </div>
    <a href="./create.php" class="link-register">支出を登録する</a>
    <form action="./index.php" class="search-form" method="GET">
        <h2 class="search-form-title">絞り込み検索<a href="{{ route('spendings')}}" class="search-form-title-link">元に戻す</a></h2>
        <div class="search-form-input-list">
          <label>
            <span class="search-form-heading">カテゴリ：</span>
            <select name="category_id" class="search-form-input">
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
            <input type="date" name="date_start" class="search-form-input" />
            <span class="deco">　〜　</span>
            <input type="date" name="date_finish" class="search-form-input" />
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
      @if (!$spendings)
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
            <td><a href="" class="table-link edit">編集</a></td>
            <td><a href="" class="table-link delete">削除</a></td>
          </tr>
        @endforeach
            {{-- echo '<tr>';
            echo '<td>' . $spending->name() . '</td>';
            foreach($spendingCategoryEntities as $category) {
                if ($category->id()->value() == $spending->categoryId()->value()) {
                    $categoryName = $category->name();
                    break;
                } else {
                    $categoryName = '未分類';
                };
            }
            echo '<td>' . $categoryName . '</td>';
            echo '<td>' . $spending->amount()->value() . '</td>';
            echo '<td>' . $spending->accrualDateForView() . '</td>';
                echo '<td><a class="edit-link" href="./edit.php?id=' . $spending->id()->value() . '">編集</a></td>';
                echo '<td><form action="/kakeibo/complete/spendingDelete.php" method="POST"><input type="hidden" name="spending_id" value="' . $spending->id()->value() . '"/><button type="submit">削除</button></form></td>';
            echo '</tr>';
        }
        ?> --}}
      @endif
    </table>
  </div>
</div>
@endsection
