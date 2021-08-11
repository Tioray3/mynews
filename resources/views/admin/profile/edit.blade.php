<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>MyNews</title>
    </head>
    <body>
        <h1>プロフィール編集画面</h1>

        {{-- layouts/profile.blade.phpを読み込む --}}
        @extends('layouts.profile')
        @section('title', 'プロフィール編集')
        
        {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>プロフィール編集</h2>
                        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                            @if (count($errors) > 0 )
                            <ul>
                                @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">氏名</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">性別</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">趣味</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">自己紹介欄</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea> 
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
               </div>
            </div>
        @endsection
    </body>
</html>