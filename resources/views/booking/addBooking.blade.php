@extends('layout.layout')

@section('title', 'Забронировать номер')

@section('content')
<div class="form-container">
        <form action="" method="post">
            @csrf
            @error('arrival_date') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="arrival_date" class="label">Укажите дату заезда</label>
                <input id="arrival_date" type="date" name="arrival_date">
                <input class="submit-btn" type="submit" style="margin-top: 5px;" value="Отправить">
            </div>
        </form>
    </div>
@endsection