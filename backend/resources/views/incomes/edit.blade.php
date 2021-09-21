@extends('layouts.app')

@section('title')
  収入編集
@endsection

@section('content')
  <div class="c-form">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('income') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      収入編集
    </h1>
    <form action="{{ route('income.update') }}" method="POST" class="c-form-content">
      @csrf

      <div class="c-form-group">
        <label for="income_source_id" class="c-label">収入源</label>
        <select id="income_source_id" name="income_source_id" class="c-form-input @error('income_source_id') is-invalid @enderror">
          @if (old('incomeSources'))
            @foreach($incomeSources as $incomeSource)
              <option value="{{ $incomeSource->id }}" @if($incomeSource->id == old('income_source_id')) selected @endif>{{ $incomeSource->name }}</option>
            @endforeach
          @else
            @foreach($incomeSources as $incomeSource)
              <option value="{{ $incomeSource->id }}" @if($incomeSource->id == $income->income_source_id) selected @endif>{{ $incomeSource->name }}</option>
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
        <input id="amount" type="text" class="c-form-input @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') ?? $income->amount }}" placeholder="0000" required autocomplete="amount" autofocus>

        @error('amount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="c-form-group">
        <label for="date" class="c-label">日付</label>
        <input id="date" type="date" class="c-form-input @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $income->accrual_date }}" placeholder="0000" required autocomplete="date" autofocus />

        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <input type="hidden" name='income_id' value="{{ $income->id }}" />
      <div class="c-form-btn-wrapper">
          <button class="c-btn">変更</button>
      </div>
    </form>
  </div>
@endsection
