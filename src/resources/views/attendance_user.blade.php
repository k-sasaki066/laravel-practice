@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/attendance_user.css') }}">
@endsection

@section('content')
    <form class="header__wrap" action="" method="post">
        @csrf

        
            <p class="header__text"> さんの勤怠表</p>
        
            <p class="header__text">ユーザーを選択してください</p>
       

        <div class="search__item">
            <input class="search__input" type="text" name="search_name" placeholder="名前検索" value="" list="user_list">
            <datalist id="user_list">
                
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    
            </datalist>
            <button class="search__button">検索</button>
        </div>
    </form>

    <div class="table__wrap">
        <table class="attendance__table">
            <tr class="table__row">
                <th class="table__header">日付</th>
                <th class="table__header">勤務開始</th>
                <th class="table__header">勤務終了</th>
                <th class="table__header">休憩時間</th>
                <th class="table__header">勤務時間</th>
            </tr>
            @foreach ($users as $user)
                <tr class="table__row">
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection