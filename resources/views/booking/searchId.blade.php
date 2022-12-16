@extends('layout.layout')

@section('title', 'Поиск по id')

@section('content')
    <form action="" style="margin: 10px 0;">
        <input type="text" name="id" placeholder="Введите id">
        <input type="submit" value="Отправить">
    </form>
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
                    @forelse($search as $s)
                        <tr>
                            <td>{{$s->id}}</td>
                            <td>{{$s->status}}</td>
                            <td>{{$s->arrival_date}}</td>
                            <td><a href="{{route('update', $s->id)}}">Изменить</a></td>
                            <td><a href="{{route('delete', $s->id)}}">Отменить</a></td>
                        </tr>
                    @empty
                    <td>у вас нет брони</td>
                    @endforelse
                    </tbody>
                </table>
@endsection