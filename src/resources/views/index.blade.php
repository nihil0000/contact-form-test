@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main class="contact">
    <p class="contact__title">Contact</p>

    <div class="contact__form">
        <form action="/confirm" class="form__body" method="post">
            <!-- name -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お名前</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <div class="name-input__inner">
                        <input type="text" class="name-input" name="last_name" placeholder="例: 山田">
                        <input type="text" class="name-input" name="first_name" placeholder="例: 太郎">
                    </div>
                </div>
            </div>

            <!-- sex -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">性別</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="male">
                        <span class="radio-mark"></span>
                        <label for="male">男性</label>

                        <input type="radio" id="female" name="gender" value="female">
                        <span class="radio-mark"></span>
                        <label for="female">女性</label>

                        <input type="radio" id="other" name="gender" value="other">
                        <span class="radio-mark"></span>
                        <label for="other">その他</label>
                    </div>
                </div>
            </div>

            <!-- email -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">メールアドレス</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <input type="email" class="email-input" name="email" placeholder="例: test@example.com">
                </div>
            </div>

            <!-- tel -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">電話番号</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <div class="tel-input">
                        <input type="tel" name="tel1" maxlength="3" placeholder="080"> -
                        <input type="tel" name="tel2" maxlength="4" placeholder="1234"> -
                        <input type="tel" name="tel3" maxlength="4" placeholder="5678">
                    </div>
                </div>
            </div>

            <!-- address -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">住所</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <input type="text" class="address-input" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>

            <!-- building name -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">建物名</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <input type="text" class="building-name-input" name="building_name" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>

            <!-- contact type -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お問い合わせの種類</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <div class="custom-select">
                        <select name="contact_type" class="contact-type-select">
                            <option value="">選択してください</option>
                            {{-- <!-- @foreach () --> --}}
                        </select>
                    </div>
                </div>
            </div>

            <!-- contact content -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お問い合わせ内容</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <textarea class="contact-content-input" name="contact_content" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </div>
            </div>

            <button class="confirm-button">確認画面</button>
        </form>
    </div>
</main>
@endsection
