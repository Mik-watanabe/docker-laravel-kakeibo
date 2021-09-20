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
    <form action="../../complete/spendingCategoryRegister.php" method="POST" class="create-category-section">
        <div class="create-category-form">
            <label class="create-category-form-wrapper">
                <span class="c-label create-category-form-label">カテゴリの追加</span>
                <input class="c-form-input create-category-form-input" type="text" name="category" placeholder="カテゴリを入力" required/>
            </label>
            <button type="submit" class="c-btn create-category-form-btn">登録</button>
        </div>
    </form>
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
          <td><a href="" class="table-link edit">編集</a></td>
          <td><a href="" class="table-link delete">削除</a></td>
        </tr>
      @endforeach
    @endif
    </table>
  </div>
@endsection
