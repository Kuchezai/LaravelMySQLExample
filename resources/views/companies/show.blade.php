@extends('layout.navbar')
@section('content')
    <div style="margin: 7% 10%; border: #1a202c">
        @foreach ($company as $com)
            <h1>Компания «{{$com->name}}»</h1>
        @endforeach
        <table class="table table-striped table-bordered table-dark">
            <caption>Список товаров компании {{$com->name}}</caption>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <th scope="row">{{ $shipment->id }}</th>
                    <td>{{ $shipment->name }}</td>
                    <td>{{ $shipment->description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <table class="table table-striped table-bordered table-dark">
            <caption>Список договоров компании {{$com->name}}</caption>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Поставщик</th>
                <th scope="col">Покупатель</th>
                <th scope="col">Сумма</th>
                <th scope="col">ID Товара</th>
                <th scope="col">Дата заключения</th>
                <th scope="col">Дата сдачи</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($agreements as $agreement)
                <tr>
                    <th scope="row">{{ $agreement->id }}</th>
                    <td><a href="{{route('companies.show', ['company' => $agreement->seller()->first()->id]) }}">{{$agreement->seller()->first()->requisites}}</a></td>
                    <td><a href="{{route('companies.show', ['company' => $agreement->buyer()->first()->id]) }}">{{$agreement->buyer()->first()->requisites}}</a></td>
                    <td>{{$agreement->amount}}</td>
                    <td>{{$agreement->shipment()->first()->description}}</td>
                    <td>{{$agreement->created_at}}</td>
                    <td>{{$agreement->complete_by}}</td>
                    <td>{{$agreement->payment()->first()->status ?? 'None' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
