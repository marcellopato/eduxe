@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Cadastro de Escolas <span class="float-right"><a href="{{ route('school.create') }}" class="btn btn-primary my-4">Nova Escola</a></span>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Contato</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $school)
                            <tr>
                                <th>{{ $school->company_name }}</th>
                                <td>{{ $school->cnpj }}</td>
                                <td>{{ $school->contact }}</td>
                                <td>{{ $school->phone }}</td>
                                <td><a href="{{ route('school.edit', ['id' => $school->id]) }}">Editar</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var vue = new Vue({
        el: '#app',
        data: {
            isLoading: false
        }
    });
</script>
@endsection
