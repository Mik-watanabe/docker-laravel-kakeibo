@extends('layouts.app')

@section('title')
  収入源
@endsection

@section('content')
  <div class="c-form income-source-container">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('top') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      収入源一覧
    </h1>
    <form action="{{ route('incomeSource') }}" method="POST" class="create-income-source-section">
      @csrf
      <div class="c-form-group">
        <label for="incomeSource" class="c-label create-income-source-form-label">収入源</label>
        <div class="form-wrapper">
          <div class="income-source-form-left">
            <input id="incomeSource" type="text" class="c-form-input create-income-source-form-input @error('income_source') is-invalid @enderror" name="income_source" value="{{ old('income_source') }}" autofocus placeholder="支出名" required />
            @error('income_source')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <button type="submit" class="c-btn create-income-source-form-btn">登録</button>
        </div>
      </div>
    </form>

    <div class="income-source-table-wrapper">
      <table class="c-table income-source-table">
        <tr>
            <th width="70%">収入源</th>
            <th width="15%">編集</th>
            <th width="15%">削除</th>
        </tr>
        @if ($incomeSources->isEmpty())
            <tr>
                <td>収入源は登録されていません</td>
                <td>　　</td>
                <td>　　</td>
            </tr>
        @else
          @foreach ($incomeSources as $incomeSource)
            <tr>
              <td>{{ $incomeSource->name }}</td>
              <td><a href="{{ route('incomeSource.edit', ['incomeSource' => $incomeSource]) }}" class="table-link edit">編集</a></td>
              <td><a href="{{ route('incomeSource.destroy', ['incomeSource' => $incomeSource]) }}" onclick="return confirm('指定された収入源に分類されている収入も削除されます。削除してよろしいですか？')" class="table-link delete">削除</a></td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>
  </div>
@endsection
