@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<main class="thanks">
    <h1 class="thanks-bg-txt">Thank you</h1>
    <h2 class="thanks-ttl">お問い合わせありがとうございました</h2>

    <input type="button" value="HOME" onclick="location.href='/'">
    </div>
</main>
@endsection
