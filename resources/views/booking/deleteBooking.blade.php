@extends('layout.layout')

@section('title', 'Удаление заявки')

@section('content')
<p>ВЫ действительно хотите Удалить заявку № {{$id->id}}</p>
<form action="" method="post">
    @csrf
    <button type="submit">Удалить</button>
    <a href="{{route('lk')}}" class="btn btn-primary">отмена</a>
 </form>
@endsection