@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<p class="content-title">お疲れ様です、{{Auth::user()->name}}さん</p>
<div class="attendance__alert">
    @if(session('message'))
    <div class="attendance__alert--success">
        {{ session('message') }}
    </div>
    @endif
</div>

<div class="attendance__content">
    <div class="attendance__panel">
        <form class="attendance__button">
            <button class="attendance__button-submit" type="submit">勤務開始</button>
        </form>
        <form class="attendance__button">
            <button class="attendance__button-submit" type="submit">勤務終了</button>
        </form>
    </div>
    <div class="attendance-table">
        <table class="attendance-table__inner">
            <tr class="attendance-table__row">
                <th class="attendance-table__header">名前</th>
                <th class="attendance-table__header">開始時間</th>
                <th class="attendance-table__header">終了時間</th>
            </tr>
            <tr class="attendance-table__row">
                <td class="attendance-table__item">サンプル太郎</td>
                <td class="attendance-table__item">サンプル</td>
                <td class="attendance-table__item">サンプル</td>
            </tr>
        </table>
    </div>
</div>
@endsection