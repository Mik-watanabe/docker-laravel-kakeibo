@extends('layouts.app')

@section('title')
  収入源の編集
@endsection

@section('content')
  <div class="c-form income-source-container">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('incomeSource.top') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      収入源の編集
    </h1>
    <form action="{{ route('incomeSource.update') }}" method="POST" class="create-income-source-section">
      @csrf
      <div class="c-form-group">
        <label for="income_source" class="c-label create-income-source-form-label">収入源</label>
        <div class="form-wrapper">
          <div class="income-source-form-left">
            <input id="income_source" type="text" class="c-form-input create-income_source-form-input @error('income_source') is-invalid @enderror" name="income_source" value="{{ old('income_source') ?? $incomeSource->name }}" autofocus required />
            @error('income_source')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <input type="hidden" name="income_source_id" value="{{ $incomeSource->id }}" />
          <button type="submit" class="c-btn create-income-source-form-btn">変更</button>
        </div>
      </div>
    </form>
  </div>
@endsection
