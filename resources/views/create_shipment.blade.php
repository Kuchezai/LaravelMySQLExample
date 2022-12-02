@extends('layout.navbar')
@section('content')
    <div style="margin: 10% 35%; border: #1a202c">
        <h1>Добавить товар</h1>
        <form method="POST" action="{{route('shipment.store')}}">
            @csrf
            <div class="form-group mt-3 mb-2">
                <label for="exampleInputEmail1">Название товара</label>
                <input class="form-control" id="exampleInputEmail1" name='name' placeholder="Введите название товара">
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlTextarea1">Описание товара</label>
                <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="3"
                          placeholder="Введите описание товара"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlSelect1">Компания, которой принадлежит товар</label>
                <select class="form-control" id="exampleFormControlSelect1" name='company'>
                    @foreach ($companies as $company)
                        <option>{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
