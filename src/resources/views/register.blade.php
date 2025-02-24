@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<main class="register-container">
    <p class="register__title">Register</p>

    <div class="register-form">
        <form action="/register" class="form__body" method="post" novalidate>
            @csrf

            <!-- name form -->
            <div class="form__group">
                <p class="form__group-label">お名前</p>

                <div class="form__group-item">
                    <input type="text" class="form__input" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                </div>

                <!-- validation -->
                @if ($errors->has('name'))
                <div class="form__error">
                    @foreach ($errors->get('name') as $error)
                        <p class="form__error-msg">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>

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

            <button type="submit" class="register-button">登録</button>
        </form>
    </div>
</main>
@endsection
