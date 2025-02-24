@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<main class="login-container">
    <p class="login__title">Login</p>

    <div class="login-form">
        <form action="/login" class="form__body" method="post" novalidate>
            @csrf
            <!-- email form -->
            <div class="form__group">
                <p class="form__group-label">メールアドレス</p>

                <div class="form__group-item">
                    <input type="email" class="form__input" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>

                <!-- validation -->
                @if ($errors->has('email'))
                <div class="form__error">
                    @foreach ($errors->get('email') as $error)
                        <p class="form__error-msg">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- password form -->
            <div class="form__group">
                <p class="form__group-label">パスワード</p>

                <div class="form__group-item">
                    <input type="password" class="form__input" name="password" placeholder="例: coachtech1106">
                </div>

                <!-- validation -->
                @if ($errors->has('password'))
                <div class="form__error">
                    @foreach ($errors->get('password') as $error)
                        <p class="form__error-msg">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>

            <button type="submit" class="login-button">ログイン</button>
        </form>
    </div>
</main>
@endsection
