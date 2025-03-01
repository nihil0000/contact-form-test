@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<main class="admin">
    <p class="admin-ttl">Admin</p>

    <section class="search-container">
        <!-- search function -->
        <div class="search-function__wrapper">
            <form action="{{ route('admin.index') }}" class="search-form" method="get">
                @csrf

                <!-- input to search name or email -->
                <dev class="search-item">
                    <input type="text" class="input-name-email" name="name_email" placeholder="名前やメールアドレスを入力してください" value="{{ request('name_email') }}">
                </dev>

                <!-- option to select gender -->
                <div class="search-item">
                    <select name="gender" id="" class="select-gender">
                        <option value="">性別</option>
                        @foreach (config('genders') as $key => $value)
                            <option value="{{ $key }}" {{ request('gender') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- option to select type of contact -->
                <div class="search-item">
                    <select name="contact_type" id="" class="select-contact-type">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $key => $value)
                            <option value="{{ $key }}" {{ request('contact_type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- option to select date -->
                <div class="search-item">
                    <input type="date" class="select__contact-date" name="contact_date" value="{{ request('contact_date') }}">
                </div>

                <button type="submit" class="search-btn">検索</button>
                <input type="button" class="reset-btn" value="リセット" onclick="location.href='{{ route('admin.index') }}'">
            </form>
        </div>

        <!-- exoport -->
        <div class="export-container">
            <form action="{{ route('admin.export') }}" method="get">
                <input type="hidden" name="name_email" value="{{ request('name_email') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="contact_type" value="{{ request('contact_type') }}">
                <input type="hidden" name="contact_date" value="{{ request('contact_date') }}">
                <button type="submit" class="export-btn">エクスポート</button>
            </form>
            {{ $contacts->links('vendor.pagination.pagination') }}
        </div>

        <!-- contact table -->
        <div class="contact-table__wrapper">
            <table class="contact-table">
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name . ' '  .$contact->first_name }}</td>
                    <td>{{ config('genders')[$contact->gender] }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $categories[$contact->category_id] }}</td>
                    <td>
                        <a href="#{{ $contact->id }}" class="detail-btn">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- modal -->
        @foreach ($contacts as $contact)
        <div id="{{ $contact->id }}" class="modal">
            <div class="modal-content">
                <a href="#!" class="close-btn">&times;</a>

                <!-- modal table -->
                <table class="modal-table">
                    <tr>
                        <th>お名前</th>
                        <td>{{ $contact->last_name . ' ' . $contact->irst_name }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ config('genders')[$contact->gender] }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <!-- <td>{{ $contact['tel'] }}</td> -->
                        <td>{{ str_replace('-', '', $contact->tel) }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $contact->address }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $contact->building }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{ $categories[$contact->category_id] }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの内容</th>
                        <td>{{ $contact->detail }}</td>
                    </tr>
                </table>

                <!-- delete button -->
                <form action="{{ route('admin.destroy', ['contact' => $contact->id]) }}" class="delete-form" method="post">
                    @method('delete')
                    @csrf
                    <div class="delete-btn">
                        <button class="delete-btn__submit" type="submit">削除</button>
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </section>

</main>
@endsection
