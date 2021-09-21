@extends('layouts.app')

@section('title')
  収入TOP
@endsection

@section('content')
<div class="income-top-container c-list-content">
  <h1 class="c-list-content-title">収入リスト</h1>
  <div class="income-upper-group">
    <div class="total-amount-section">
        <span class="total-amount-heading">合計：</span>
        <span class="total-amount">{{ $incomes->sum('amount') }} 円</span>
    </div>
    <a href="{{ route('income.register') }}" class="link-register">収入を登録する</a>
    <form action="{{ route('income.top') }}" class="search-form" method="GET">
        <h2 class="search-form-title">絞り込み検索<a href="{{ route('income.top')}}" class="search-form-title-link">元に戻す</a></h2>
        <div class="search-form-input-list">
          <label>
            <span class="search-form-heading">収入源：</span>
            <select name="income_source_id" class="search-form-input select">
              @if (!$incomeSources)
                <option selected disabled>収入源が登録されていません</option>
              @else
                @if (is_null($incomeSourceId))
                  <option selected disabled>収入源を選択してください</option>
                @endif
                  @foreach($incomeSources as $incomeSource)
                    <option value="{{ $incomeSource->id }}" @if(!is_null($incomeSourceId) && $incomeSource->id == $incomeSourceId) selected @endif>{{ $incomeSource->name }}</option>
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
    <table class="income-table c-table">
      <tr>
        <th width="25%">収入源</th>
        <th width="25%">金額</th>
        <th width="20%">日付</th>
        <th width="15%">編集</th>
        <th width="15%">削除</th>
      </tr>
      @if ($incomes->isEmpty())
        <tr>
          <td>収入は登録されていません</td>
          <td>　　</td>
          <td>　　</td>
          <td>　　</td>
          <td>　　</td>
        </tr>
      @else
        @foreach ($incomes as $income)
          <tr>
            <td>{{ $income->incomeSource->name }}</td>
            <td>{{ $income->amount }}</td>
            <td>{{ $income->accrual_date_for_view }}</td>
            <td><a href="{{ route('incomes.edit', ['income' => $income]) }}" class="table-link edit">編集</a></td>
            <td><a href="{{ route('income.destroy', $income)}}" class="table-link delete"  onclick="return confirm('本当に削除しますか?')">削除</a></td>
          </tr>
        @endforeach
      @endif
    </table>
  </div>
</div>
@endsection
