@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <index-user-component/>
        </div>
    </div>

   <modal-component title='Cadastro de Usuário'/>

@endsection
