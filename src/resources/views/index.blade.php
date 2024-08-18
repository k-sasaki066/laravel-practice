@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content__header">
    <p class="content__header-text">
        {{ Auth::user()->name }}さんお疲れ様です！
    </p>
</div>
<div class="attendance__alert">
    @if(session('message'))
    <div class="attendance__alert--success">
        {{ session('message') }}
    </div>
    @endif
</div>

<form class="form__wrap" action="/work" method="post">
        @csrf
        <div class="form__item">
            
                <button class="form__item-button" type="submit" name="start_work">勤務開始</button>
            
                <!-- <button class="form__item-button" type="submit" name="start_work" disabled>勤務開始</button> -->
            
        </div>
        <div class="form__item">
            
                <button class="form__item-button" type="submit" name="end_work">勤務終了</button>
            
                <!-- <button class="form__item-button" type="submit" name="end_work" disabled>勤務終了</button> -->
            
        </div>
        <div class="form__item">
            
                <button class="form__item-button" type="submit" name="start_rest">休憩開始</button>
            
                <!-- <button class="form__item-button" type="submit" name="start_rest" disabled>休憩開始</button> -->
            
        </div>
        <div class="form__item">
            
                <button class="form__item-button" type="submit" name="end_rest">休憩終了</button>
            
                <!-- <button class="form__item-button" type="submit" name="end_rest" disabled>休憩終了</button> -->
            
        </div>
    </form>
@endsection
