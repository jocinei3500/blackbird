@extends('app.layouts.app')

@section('content')
        <div class="card">
            <div class="card-header-template">
                <div>
                    CADASTRAR OBRA
                </div>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('obra.index') }}">LISTAGEM</a>
                </div>
            </div>
            <div class="card-body">
                @component('app.obra._components.form_create_edit',['empresas'=>$empresas])
                @endcomponent
            </div>
        </div>
@endsection
