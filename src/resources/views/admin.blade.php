@extends('layouts/app')

@section('content')
<main class="admin-container">
    <p class="admin__title">Admin</p>

    <div class="search-header">
        <form action="" class="search">
            <div class="search-group">
                <!-- input to search name or email -->
                <dev class="search-item">
                    <input type="text" class="input-name-email" name="name_email" placeholder="名前やメールアドレスを入力してください">
                </dev>

                <!-- option to select gender -->
                <div class="search-item">
                    <select name="gender" id="" class="select-gender">
                        <option value="">性別</option>
                        <!-- TODO: foreach -->
                    </select>
                </div>

                <!-- option to select type of contact -->
                <div class="search-item">
                    <select name="contact_type" id="" class="select-contact-type">
                        <option value="">お問い合わせの種類</option>
                        <!-- TODO: foreach -->
                    </select>
                </div>

                <button class="search-button">検索</button>
                <button class="reset">リセット</button>
            </div>
        </form>
    </div>
</main>
@endsection
