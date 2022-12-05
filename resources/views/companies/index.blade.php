@extends('layout.navbar')
@section('content')

    <div style="margin: 7% 10%; border: #1a202c">
        <h1>Список компаний</h1>
        <table class="table table-striped table-bordered table-dark">
            <caption>Список компаний</caption>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Реквизиты</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td><a href="{{route('companies.show', ['company' => $company->id]) }}">{{ $company->name }}</a></td>
                    <td>{{ $company->requisites }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{$companies->links()}}
        </div>
    </div>


@endsection


