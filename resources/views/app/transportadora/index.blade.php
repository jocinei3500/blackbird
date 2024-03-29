@extends('app.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-template">
            <div>
                LISTAGEM DE TRANSPORTADORAS
            </div>
            <div>
                <a class="btn btn-primary btn-sm" href="{{ route('transportadora.create') }}">NOVO</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transportadoras as $transportadora)
                        <tr>
                            <th scope="row">{{ $transportadora->id }}</td>
                            <td>{{ $transportadora->nome }}</td>
                            <td>{{ $transportadora->descricao }}</td>
                            <td>
                                <div class="div-op">
                                    <a class="btn btn-sm-template btn-primary mx-1"
                                        href="{{ route('transportadora.show', ['transportadora' => $transportadora->id]) }}"><i
                                            class="icofont-eye-alt"></i></a>
                                    <a class="btn btn-sm-template btn-success mx-1 @can('user') disabled @endcan"
                                        href="{{ route('transportadora.edit', ['transportadora' => $transportadora->id]) }}"><i
                                            class="icofont-pen-alt-1"></i></a>
                                    <form id="form_{{ $transportadora->id }}" method="post"
                                        action="{{ route('transportadora.destroy', ['transportadora' => $transportadora->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-sm-template btn-danger mx-1 @can('user') disabled @endcan" href="#"
                                            onclick="document.getElementById('form_{{ $transportadora->id }}').submit()"><i
                                                class="icofont-close-squared-alt"></i></a>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$transportadoras->appends($request)->links()}}
            </div>

        </div>

    </div>


@endsection