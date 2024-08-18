@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
    <form class="header__wrap" action="" method="post">
        @csrf
        <button class="date__change-button" name="prevDate"><</button>
        <input type="hidden" name="displayDate" value="">
        <p class="header__text"></p>
        <button class="date__change-button" name="nextDate">></button>
    </form>

    <div class="table__wrap">
        <table class="attendance__table">
            <tr class="table__row">
                <th class="table__header">名前</th>
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