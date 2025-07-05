@extends('app.layouts.app')
@section('titulo', 'DBMAXIS-Configuarções de Dashboard')

@section('content')
    <!-------------------------------------------------------------------------->
    <div class="card">
        <div class="card-header-template">
            <div><i class="icofont-list mr-2"></i>Configurações de Dashboard</div>

        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="th-title">visualização de estoque de produtos</th>
                         <th scope="col" class="th-title"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->produto->nome }}</td>
                            <td>
                                <a class="btn btn-sm-template btn-outline-danger" href="#" data-bs-toggle="modal"
                                    @can('admin')data-bs-target="#deleteModal"
                                        @elsecan('user') data-bs-target="#modal_msg" @endcan
                                    data-id="{{ $produto->id }}">
                                    <i class="icofont-ui-delete"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.shared.modal_delete')
                {{ route('produto.destroy') }}
            @endcomponent
            @component('app.shared.modal_msg_no_permission')
            @endcomponent

        </div>


    </div>

@endsection
