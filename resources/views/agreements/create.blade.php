@extends('layout.navbar')
@section('content')
    <div style="margin: 10% 35%; border: #1a202c">
        <h1>Создать договор</h1>
        @if($errors->any())
            <div class="text-danger">
                <h4>{{$errors->first()}}</h4>
            </div>
        @endif
        <form method="POST" action="{{route('agreements.store')}}">
            @csrf
            <div class="form-group mt-3 mb-2">
                <label for="exampleFormControlSelect1">Компания-поставщик</label>
                <select class="form-control" id="exampleFormControlSelect1" name='s_name'>
                    @foreach ($companies as $company)
                        <option>{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect2">Компания-покупатель</label>
                <select class="form-control" id="exampleFormControlSelect2" name='b_name'>
                    @foreach ($companies as $company)
                        <option>{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Сумма договора</label>
                <input class="form-control" id="exampleInputEmail1" name='amount' placeholder="Введите сумму">
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect2">ID Товара</label>
                <select class="form-control" id="exampleFormControlSelect2" name='sh_id'>
                    @foreach ($shipments as $shipment)
                        <option value="{{$shipment->id}}"> {{$shipment->id}} ({{$shipment->name}}) | Владелец: {{$shipment->company()->first()->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="date">Срок поставки, до:</label>
                <input type="date" class="form-control" id ='date' name ='complete_by' min="{{date("Y-m-d", time() - 86400)}}">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection

