@extends('layout.layout')

@section('title', 'Авторизация')

@section('content')
    <div class="form-container">
    @error('authError') <p style="color: red;">{{$message}}</p> @enderror
        <form action="" method="post">
            @csrf
            @error('login') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="login" class="label">Логин</label>
                <input id="login" type="text" name="login" placeholder="login">
            </div>
            @error('password') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="password" class="label">Пароль</label>
                <input id="password" type="password" name="password">
            </div>
            <div class="form-item">
            <input class="submit-btn" type="submit" style="margin: 5px 0;" value="Отправить">
            </div>
        </form>
    </div>
@endsection