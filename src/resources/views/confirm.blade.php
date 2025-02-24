@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="confirm">
    <p class="confirm__title">Confirm</p>

    <div class="contact-form__container">
        <form action="{{ route('thanks') }}" class="form__body" method="post">
            @csrf
            <table class="confirm-table">
                <!-- name -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">お名前</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" value="{{ $contacts['last_name'] . ' ' . $contacts['first_name'] }}" readonly>
                            <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}">
                            <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}">
                        </div>
                    </td>
                </tr>

                <!-- gender -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">性別</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" value="{{ config('genders')[$contacts['gender']] ?? '未設定' }}" readonly>
                            <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
                        </div>
                    </td>
                </tr>

                <!-- email -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">メールアドレス</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" name="email" value="{{ $contacts['email'] }}" readonly>
                        </div>
                    </td>
                </tr>

                <!-- tel -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">電話番号</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="tel" name="tel" value="{{ $contacts['tel_area_code'] . $contacts['tel_city_code'] . $contacts['tel_subscriber'] }}" readonly>
                            <input type="hidden" name="tel_area_code" value="{{ $contacts['tel_area_code'] }}">
                            <input type="hidden" name="tel_city_code" value="{{ $contacts['tel_city_code'] }}">
                            <input type="hidden" name="tel_subscriber" value="{{ $contacts['tel_subscriber'] }}">
                        </div>
                    </td>
                </tr>

                <!-- address -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">住所</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" name="address" value="{{ $contacts['address'] }}" readonly>
                        </div>
                    </td>
                </tr>

                <!-- building name -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">建物名</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" name="building" value="{{ $contacts['building'] }}" readonly>
                        </div>
                    </td>
                </tr>

                <!-- contact type -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">お問い合わせの種類</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" value="{{ config('categories')[$contacts['category_id']] }}" readonly>
                            <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
                        </div>
                    </td>
                </tr>

                <!-- contact content -->
                <tr>
                    <th>
                        <div class="form__group-label">
                            <span class="label__text">お問い合わせ内容</span>
                        </div>
                    </th>
                    <td>
                        <div class="form__group-item">
                            <input type="text" name="detail" value="{{ $contacts['detail'] }}" readonly>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="button__wrapper">
                <button type="submit" class="submit-btn">送信</button>

                <button type="submit" class="edit-btn" formaction="{{ route('edit') }}">修正</button>
            </div>
        </form>
    </div>
</main>
@endsection
