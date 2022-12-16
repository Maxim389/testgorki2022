@extends('layout.layout')

@section('title', 'Изменение брони')

@section('content')
<div class="form-container">
        <form action="" method="post">
            @csrf
            @error('arrival_date') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="arrival_date" class="label">Укажите дату заезда</label>
                <input id="arrival_date" type="date" value="{{$id->arrival_date}}" name="arrival_date">
            </div>
            @if(auth()->user()->role == 'Admin')
            <div class="form-item">
            <label for="status" class="label">Укажите дату заезда</label>
            <select id="status" name="status">
                <option value="{{$id->status}}">{{$id->status}}</option>
                    @if($id -> status == "Подтверждена")
                    <option value="Не подтверждена">Не подтверждена</option>
                    @else
                    <option value="Подтверждена">Подтверждена</option>
                    @endif
            </select>
            </div>
            @endif
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection