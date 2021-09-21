@extends('layouts.app')

@section('title')
  カテゴリ
@endsection

@section('content')
  <div class="c-form category-container">
    <h1 class="c-prev-and-title-wrapper">
      <a class="c-prev-link" href="{{ route('top') }}">
        <img src="/images/arrow-message.svg" class="c-prev-link-img" alt="戻るボタン">
      </a>
      カテゴリ一覧
    </h1>
    <form action="{{ route('category.top') }}" method="POST" class="create-category-section">
      @csrf
      <div class="c-form-group">
        <label for="category" class="c-label create-category-form-label">カテゴリ名</label>
        <div class="form-wrapper">
          <div class="category-form-left">
            <input id="category" type="text" class="c-form-input create-category-form-input @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" autofocus placeholder="支出名" required />
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <button type="submit" class="c-btn create-category-form-btn">登録</button>
        </div>
      </div>
    </form>

    <div class="category-table-wrapper">
      <table class="c-table category-table">
        <tr>
            <th width="70%">カテゴリ</th>
            <th width="15%">編集</th>
            <th width="15%">削除</th>
        </tr>
        @if ($categories->isEmpty())
            <tr>
                <td>カテゴリは登録されていません</td>
                <td>　　</td>
                <td>　　</td>
            </tr>
        @else
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td><a href="{{ route('category.edit', ['category' => $category]) }}" class="table-link edit">編集</a></td>
              <td><a href="{{ route('category.destroy', ['category' => $category]) }}" onclick="return confirm('指定されたカテゴリに分類されている支出も削除されます。削除してよろしいですか？')"　class="table-link delete">削除</a></td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>
  </div>
@endsection
