@extends('layouts.app_only_content')

@section('title')
    ログイン
@endsection

@section('content')
<div class="login-container c-form">
    <h1 class="c-form-heading">ログイン</h1>

    <form method="POST" action="{{ route('login') }}" class="c-form-content">
        @csrf

        <div class="c-form-group">
            <label for="email" class="c-label">メールアドレス</label>
            <input id="email" type="email" class="c-form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="c-form-group">
            <label for="password" class="c-label">パスワード</label>
            <input id="password" type="password" class="c-form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="remeber">
                ログイン状態を保存する
            </label>
        </div>

        <div class="c-form-btn-wrapper">
            <button type="submit" class="c-btn">
                ログイン
            </button>
        </div>

        <a href="{{ route('register') }}" class="c-form-link">アカウントをお持ちでない方はこちら</a>
        <a href="{{ route('password.request') }}" class="c-form-link">パスワードをお忘れの方はこちら</a>
    </form>
</div>
@endsection
