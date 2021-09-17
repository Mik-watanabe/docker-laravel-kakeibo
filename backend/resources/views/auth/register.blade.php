@extends('layouts.app_only_content')

@section('title')
    会員登録
@endsection

@section('content')
<div class="register-container c-form">
    <h1 class="c-form-heading">新規登録</h1>

    <form method="POST" action="{{ route('register') }}" class="c-form-content">
        @csrf

        <div class="c-form-group">
            <label for="name" class="c-label">ユーザーネーム</label>
            <input id="name" type="text" class="c-form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="家計簿さん">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="c-form-group">
            <label for="email" class="c-label">メールアドレス</label>
            <input id="email" type="email" class="c-form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="kakeibo@example.com">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="c-form-group">
            <label for="password" class="c-label">パスワード</label>
            <input id="password" type="password" class="c-form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="c-form-group">
            <label for="password_confirm" class="c-label">確認用パスワード</label>
            <input id="password_confirm" type="password" class="c-form-input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required utocomplete="new-password" placeholder="確認用password">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="c-form-btn-wrapper">
            <button type="submit" class="c-btn">
                登録する
            </button>
        </div>

        <a class="c-form-link" href="{{ route('login') }}">アカウントをお持ちの方はこちら</a>
    </form>
</div>
@endsection
