@extends('layouts.app')

@section('title')
  収入登録
@endsection

@section('content')
  <div class="c-form">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('income.top') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      収入登録
    </h1>
    <form action="{{ route('income.register') }}" method="POST" class="c-form-content">
      @csrf

      <div class="c-form-group">
        <label for="income_source_id" class="c-label">収入源</label>
        <select id="income_source_id" name="income_source_id" class="c-form-input @error('income_source_id') is-invalid @enderror">
          @if ($incomeSources->isEmpty())
            <option selected disable>収入源を登録してください</option>
          @else
            @if (!old('income_source_id'))
              <option selected disabled>収入源を選択してください</option>
            @endif
            @foreach($incomeSources as $incomeSource)
              <option value="{{ $incomeSource->id }}" @if(old('income_source_id') && $incomeSource->id == old('income_source_id')) selected @endif>{{ $incomeSource->name }}</option>
            @endforeach
          @endif
        </select>

        @error('income_source_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="c-form-group">
        <label for="amount" class="c-label">金額</label>
        <input id="amount" type="text" class="c-form-input @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="0000" required autocomplete="amount" autofocus>

        @error('amount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="c-form-group">
        <label for="date" class="c-label">日付</label>
        <input id="date" type="date" class="c-form-input @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" placeholder="0000" required autocomplete="date" autofocus />

        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="c-form-btn-wrapper">
          <button class="c-btn">登録</button>
      </div>
    </form>
  </div>
@endsection
