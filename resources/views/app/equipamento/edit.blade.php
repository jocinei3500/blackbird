@extends('app.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header-template">
            <div>EDITAR EQUIPAMENTO</div>
        <div>
            <a class="btn btn-sm btn-primary" href="{{route('equipamento.index')}}" class="btn">
                LISTAGEM
            </a>
        </div>
    </div>
        <div class="card-body">
            @component('app.equipamento._components.form_create_edit', [
                'marcas'=>$marcas, 
                'equipamento'=>$equipamento, 
                'equipamentos'=>$equipamentos,
                'produtos'=>$produtos
                ])       
            @endcomponent
        </div>
    </div>



@endsection

