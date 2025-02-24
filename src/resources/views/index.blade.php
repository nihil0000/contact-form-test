@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main class="contact">
    <p class="contact__title">Contact</p>

    <div class="contact__form">
        <form action="{{ route('confirm') }}" class="form__body" method="post" novalidate>
            @csrf
            <!-- input name -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お名前</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="form__group-item">
                    <div class="name-input__wrapper">
                        <input type="text" class="name-input" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="name-input__wrapper">
                        <input type="text" class="name-input" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- radio gender -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">性別</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="gender-radio__wrapper">
                    <div class="gender-radio">
                        <div class="radio-group">
                            @foreach (config('genders') as $key => $value)
                                <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', 1) == $key ? 'checked' : ''}}>
                                <label for="gender_{{ $key }}">
                                    <span class="radio-mark"></span>{{ $value }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="gender-form__error">
                        @error('gender')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- input email -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">メールアドレス</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="email-input__wrapper">
                    <div class="email-input">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    </div>
                    <div class="email-form__error">
                        @error('email')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- input tel -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">電話番号</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="tel-input__wrapper">
                    <div class="tel-input">
                        <input type="tel" name="tel_area_code" placeholder="080" value="{{ old('tel_area_code') }}"> -
                        <input type="tel" name="tel_city_code" placeholder="1234" value="{{ old('tel_city_code') }}"> -
                        <input type="tel" name="tel_subscriber" placeholder="5678" value="{{ old('tel_subscriber') }}">
                    </div>
                    <div class="tel-form__error">
                        @error('tel')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- input address -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">住所</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="address-input__wrapper">
                    <div class="address-input">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    </div>
                    <div class="address-form__error">
                        @error('address')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- input building name -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">建物名</span>
                </div>
                <div class="form__group-item">
                    <input type="text" class="building-name-input" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <!-- option to select contact type -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お問い合わせの種類</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="contact-type-select__wrapper">
                    <div class="custom-select">
                        <select name="category_id" class="contact-type-select" required>
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}" {{ old('category_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="contact-type-form_error">
                        @error('category_id')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- input contact detail -->
            <div class="form__group">
                <div class="form__group-label">
                    <span class="label__text">お問い合わせ内容</span>
                    <span class="label__text--required">※</span>
                </div>
                <div class="detail-form-input__wrapper">
                    <div class="detail-input">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </div>
                    <div class="detail-form__error">
                        @error('detail')
                            <p class="form__error-msg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="confirm-button">確認画面</button>
        </form>
    </div>
</main>
@endsection
