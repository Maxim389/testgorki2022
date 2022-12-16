@extends('layout.layout')

@section('title', 'Личный кабинет')

@section('content')
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">статус брони</th>
                        <th scope="col">Дата заселения</th>
                        <th scope="col">Изменение брони</th>
                        <th scope="col">Отмена брони</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->status}}</td>
                            <td>{{$order->arrival_date}}</td>
                            <td><a href="{{route('update', $order->id)}}">Изменить</a></td>
                            <td><a href="{{route('delete', $order->id)}}">Отменить</a></td>
                        </tr>
                    @empty
                    <td>у вас нет брони</td>
                    @endforelse
                    </tbody>
                </table>
                <form action="">
                    <label for="status">Фильтрация по статусу</label>
                    <input type="text" id="status" name="status">
                    <input type="submit" value="Отправить">
                </form>
                <div class="flex aic" style="justify-content: center;">
                {{ $orders->links() }}
                </div>
@endsection