@extends('layout.layout')

@section('title', 'кабинет администратора')

@section('content')
<div class="search-btn-container">
<a href="{{route('searchId')}}" class="search-btn">Поиск по id</a>
<a href="{{route('searchUser')}}" class="search-btn">Поиск по имени</a>
</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Номер брони</th>
                        <th scope="col">статус брони</th>
                        <th scope="col">Дата заселения</th>
                        <th scope="col">Изменение брони</th>
                        <th scope="col">Отмена брони</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($booking as $b)
                        <tr>
                            <td>{{$b->id}}</td>
                            <td>{{$b->status}}</td>
                            <td>{{$b->arrival_date}}</td>
                            <td><a href="{{route('update', $b->id)}}">Изменить</a></td>
                            <td><a href="{{route('delete', $b->id)}}">Отменить</a></td>
                        </tr>
                    @empty
                    <td>у вас нет брони</td>
                    @endforelse
                    </tbody>
                </table>
                <form action="">
                 <label for="status">Фильтрация по статусу</label>
                    <input type="text" name="status">
                    <input type="submit" value="Отправить">
                </form>
                <form action="" style="margin-top: 5px;">
                    <input type="submit" value="Вывести следущие записи">
                    <input type="hidden" name="offset" value="{{$offset+10}}">
                </form>
@endsection