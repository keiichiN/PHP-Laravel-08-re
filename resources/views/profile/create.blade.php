{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

@section('title', 'プロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
            </div>
        </div>
    </div>
@endsection