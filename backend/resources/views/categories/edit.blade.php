@extends('layouts.app')

@section('title')
  カテゴリ
@endsection

@section('content')
  <div class="c-form category-container">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('category') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      カテゴリ編集
    </h1>
    <form action="{{ route('category.update') }}" method="POST" class="create-category-section">
      @csrf
      <div class="c-form-group">
        <label for="category" class="c-label create-category-form-label">カテゴリ名</label>
        <div class="form-wrapper">
          <div class="category-form-left">
            <input id="category" type="text" class="c-form-input create-category-form-input @error('category') is-invalid @enderror" name="category" value="{{ old('category') ?? $category->name }}" autofocus placeholder="支出名" required />
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <input type="hidden" name="category_id" value="{{ $category->id }}" />
          <button type="submit" class="c-btn create-category-form-btn">変更</button>
        </div>
      </div>
    </form>
  </div>
@endsection
