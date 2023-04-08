@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Instituição</h6>
        </div>
        <div class="p-3">
            @if (isset($message))
                <div class="alert alert-{{ $message['alert'] }} border-left-{{ $message['alert'] }} alert-dismissible fade show"
                    role="alert">
                    {{ $message['text'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if ($instituicao)
                <show-instituicao-component />
            @else
                <a href="#" data-bs-toggle="modal" data-bs-target="#createInstituicao"><i class="fas fa-plus"></i>
                    Cadastrar Instituição</a>
            @endif
        </div>
    </div>

    <create-instituicao-component/>
@endsection
