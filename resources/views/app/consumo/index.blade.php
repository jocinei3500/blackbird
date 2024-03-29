@extends('app.layouts.app')
@section('titulo', 'Produtos')

@section('content')
    <!---estilização do input box buscar produtos---->
    <style>
        #formSearchingProducts {
            background-color: white;
            width: 50%;
            height: 30px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        input {
            all: unset;
            font: 16px;
            color: rgb(52, 52, 53);
            height: 100%;
            width: 100%;
            padding: 6px 10px;
        }

        ::placeholder {
            color: rgb(132, 134, 141);
            opacity: 0.9;
        }


        button {
            all: unset;
            cursor: pointer;
            width: 44px;
            height: 44px;
        }


        thead {
            background-color: rgb(169, 169, 169);
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        tr:hover {
            background-color: rgb(169, 169, 169);
        }
    </style>
    <!-------------------------------------------------------------------------->
    <div class="card">
        <div class="card-header-template">
            <div><i class="icofont-list mr-2"></i>LISTAGEM DE CONSUMO</div>
            <form id="formSearchingProducts" action="{{route('consumo.index')}}" method="get">
                <!--input box filtro buscar produto--------->
                <input type="text" id="query" name="filtro_equipamento" placeholder="Buscar equipamento..." aria-label="Search through site content">
                <button type="submit">
                    <i class="icofont-search"></i>
                </button>
            </form>
            <div>
                <a href="{{ route('consumo.create') }}" class="btn btn-sm btn-primary">
                    <i class="icofont-plus-circle mr-1"></i>NOVO
                </a>
                <a href="{{ route('consumo.index') }}" class="btn btn-sm btn-primary">
                    <i class="icofont-page"></i>TODOS
                </a>
            </div>

        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="th-title">Id</th>
                        <th scope="col" class="th-title">Equipamento</th>
                        <th scope="col" class="th-title">Produto</th>
                        <th scope="col" class="th-title">quantidade</th>
                        <th scope="col" class="th-title">Data</th>
                        <th scope="col" class="th-title">Operaçoes</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($consumos as $consumo)
                        <tr>
                            <th scope="row">{{ $consumo->id }}</td>
                            <td>{{ $consumo->equipamento->nome}}</td>
                            <td>{{ $consumo->produto->nome }}</td>
                            <td>{{ $consumo->quantidade}}</td>
                            <td>{{Carbon\Carbon::parse($consumo->data)->format('d/m/Y')}}</td>
                            <td>
                                <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">
                                    <a class="btn btn-sm-template btn-outline-primary"
                                        href="{{ route('consumo.show', ['consumo' => $consumo->id]) }}"><i
                                            class="icofont-eye-alt"></i>
                                    </a>
                                    <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan"
                                        href="{{ route('consumo.edit', ['consumo' => $consumo->id]) }}">
                                        <i class="icofont-ui-edit"></i>
                                    </a>
                                    <a class="btn btn-sm-template btn-outline-danger @can('user') disabled @endcan"
                                        href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-id="{{ $consumo->id }}">
                                        <i class="icofont-ui-delete"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.shared.modal_delete')
                {{ route('consumo.destroy') }}
            @endcomponent
            <div class="d-flex justify-content-center">
                {{ $consumos->appends($request)->links() }}
            </div>

        </div>


    </div>

@endsection
