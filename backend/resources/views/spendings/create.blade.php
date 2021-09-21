@extends('layouts.app')

@section('title')
  支出登録
@endsection

@section('content')
  <div class="c-form">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('spendings.top') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      支出登録
    </h1>
    <form action="{{ route('spendings.register') }}" method="POST" class="c-form-content">
      @csrf

      <div class="c-form-group">
        <label for="spending" class="c-label">支出名</label>
        <input id="spending" type="text" class="c-form-input @error('spending') is-invalid @enderror" name="spending" value="{{ old('spending') }}" autofocus placeholder="支出名" required />

        @error('spending')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="c-form-group">
        <label for="category" class="c-label">カテゴリ</label>
        <select id="category" name="category" class="c-form-input @error('category') is-invalid @enderror">
          @if ($categories->isEmpty())
            <option selected disable>カテゴリーを登録してください</option>
          @else
            @if (!old('category'))
              <option selected disabled>カテゴリーを選択してください</option>
            @endif
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if(old('category') && $category->id == old('category')) selected @endif>{{ $category->name }}</option>
            @endforeach
          @endif
        </select>

        @error('category')
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
