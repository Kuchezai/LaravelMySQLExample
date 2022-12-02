@extends('layout.navbar')
@section('content')
    <div style="margin: 10% 35%; border: #1a202c">
        <h1>Добавить компанию</h1>
        <form method="POST" action="{{route('companies.store')}}">
            @csrf
            <div class="form-group mt-3 mb-2">
                <label for="exampleInputEmail1">Название компании</label>
                <input class="form-control" id="exampleInputEmail1" name='name' placeholder="Введите название товара">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail2">Реквизиты</label>
                <input class="form-control" id="exampleInputEmail2" name='requisites'
                       placeholder="Введите название товара">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
