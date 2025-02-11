@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="confirm">
    <p class="confirm__title">Confirm</p>

    <div class="contact__form">
        <form action="/thanks" class="form__body" method="post">

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
                            <input type="text" class="name-input" name="last_name" value="山田 太郎" readonly>
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
                            <input type="test" id="male" name="gender" value="male" readonly>
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
                            <input type="test" id="male" name="gender" value="male" readonly>
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
                            <input type="tel" name="tel1" maxlength="3" value="09012345678" readonly>
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
                            <input type="text" class="address-input" name="address" value="東京都渋谷区千駄ヶ谷1-2-3" readonly>
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
                            <input type="text" class="building-name-input" name="building_name" value="千駄ヶ谷マンション" readonly>
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
                            <input type="text" class="input-name" value="商品の交換について" readonly>
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
                            <input type="text" class="input-name" value="お願いします。" readonly>
                        </div>
                    </td>
                </tr>
            </table>

            <button class="btn-confirm">送信</button>
            <a href="/" class="btn-edit">修正</a>
        </form>
    </div>
</main>
@endsection
