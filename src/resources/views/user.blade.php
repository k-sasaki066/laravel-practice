@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection

@section('content')
    <div class="header__wrap">
        <p class="header__text">ユーザー一覧</p>
        <p class="header__text-right">現在</p>
    </div>
    <div class="table__wrap">
        <table class="attendance__table">
            <tr class="table__row">
                <th class="table__header">No.</th>
                <th class="table__header">ID</th>
                <th class="table__header">名前</th>
                <th class="table__header">Email</th>
                <th class="table__header">勤務状態</th>
            </tr>
                <tr class="table__row">
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">サンプル</td>
                    <td class="table__item">勤務中</td>
                </tr>
                
        </table>
    </div>
    
@endsection
