@extends('layout.layout')

@section('title', 'Регистрация')

@section('content')
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="name" class="label">Фио</label>
                <input id="name" type="text" name="name" placeholder="name">
            </div>
            @error('login') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="login" class="label">Логин</label>
                <input id="login" type="text" name="login" placeholder="login">
            </div>
            @error('email') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="email" class="label">Электронная почта</label>
                <input id="email" type="text" name="email" placeholder="email">
            </div>
            @error('photo') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="photo" class="label">Фото (необязательно)</label>
                <input id="photo" type="file" name="photo">
            </div>
            @error('password') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="password" class="label">Пароль</label>
                <input id="password" type="password" name="password">
            </div>
            <div class="form-item">
            <label for="password" class="label">Подтверждение пароля</label>
                <input id="password" type="password" name="password_confirmation">
            </div>
            @error('success') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
            <label for="">Я согласен на обработку персональных данных</label>
            <input name="success" type="checkbox">
            <input class="submit-btn" type="submit" value="Отправить">
            </div>
        </form>
    </div>
@endsection