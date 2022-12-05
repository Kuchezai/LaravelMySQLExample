@extends('layout.navbar')
@section('content')
    <div style="margin: 7% 10%; border: #1a202c">
        <h1>Список договоров</h1>
        @if(session('message'))
            <div class="text-success">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
        <table class="table table-striped table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Поставщик</th>
                <th scope="col">Покупатель</th>
                <th scope="col">Сумма</th>
                <th scope="col">ID Товара</th>
                <th scope="col">Описание товара</th>
                <th scope="col">Дата заключения</th>
                <th scope="col">Дата сдачи</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($agreements as $agreement)
                <tr>
                    <th scope="row">{{ $agreement->id }}</th>
                    <td>
                        <a href="{{route('companies.show', ['company' => $agreement->seller()->first()->id]) }}">{{$agreement->seller()->first()->requisites}}</a>
                    </td>
                    <td>
                        <a href="{{route('companies.show', ['company' => $agreement->buyer()->first()->id]) }}">{{$agreement->buyer()->first()->requisites}}</a>
                    </td>
                    <td>{{$agreement->amount}}</td>
                    <td>{{$agreement->sh_id}}</td>
                    <td>{{$agreement->shipment()->first()->description}}</td>
                    <td>{{$agreement->created_at}}</td>
                    <td>{{$agreement->complete_by}}</td>
                    <td>{{$agreement->payment()->first()->status ?? 'None' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{$agreements->links()}}
        </div>
        <button type="button" class="btn btn-dark" id='modal-btn' data-bs-toggle="modal"
                data-bs-target="#myModal">Подтвердить оплату
        </button>
        <button type="button" class="btn btn-dark" id='modal-btn-over' data-bs-toggle="modal-over"
                data-bs-target="#myModal-over">Подтвердить выполнение договора
        </button>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form method="POST" action="{{route('agreements.payment.edit')}}">
                @csrf
                <div class="modal-content bg-dark text-light">

                    <div class="modal-header">
                        <h4 class="modal-title">Подтверждение оплаты</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mb-2">
                            <label for="exampleFormControlSelect2">ID Договора</label>
                            <select class="form-control" id="exampleFormControlSelect2" name='a_id'>
                                @foreach ($agreements as $agreement)
                                    <option value="{{$agreement->id}}"> {{$agreement->id}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="myModal-over" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form method="POST" action="{{route('shipment.edit')}}">
                @csrf
                <div class="modal-content bg-dark text-light">

                    <div class="modal-header">
                        <h4 class="modal-title">Подтверждение выполнения</h4>
                        <button type="button" class="close" data-dismiss="modal-over">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mb-2">
                            <label for="exampleFormControlSelect2">ID Договора</label>
                            <select class="form-control" id="exampleFormControlSelect2" name='a_id'>
                                @foreach ($agreements as $agreement)
                                    <option value="{{$agreement->id}}"> {{$agreement->id}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(function () {
            $('#myModal').modal({
                show: false,
                backdrop: 'static'
            });
            $('#modal-btn').on('click', function () {
                $('#myModal').modal('show');
            });
            $('#myModal-over').modal({
                show: false,
                backdrop: 'static'
            });
            $('#modal-btn-over').on('click', function () {
                $('#myModal-over').modal('show');
            });
            $('.close').on('click', function () {
                $('#myModal-over').modal('hide');
                $('#myModal').modal('hide');
            });

        });
    </script>
@endsection
