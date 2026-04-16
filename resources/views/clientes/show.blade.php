@extends('layout')

@section('body')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h3 class="mb-0">Detalhes do Cliente</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-outline-secondary">Voltar para a Lista</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <span class="text-muted d-block small uppercase">Nome Completo</span>
            <div class="fs-5 fw-bold">{{ $cliente->nome }}</div>
        </div>
        <div class="col-md-4">
            <span class="text-muted d-block small">Data de Nascimento</span>
            <div class="fs-5">{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <h6 class="text-primary text-uppercase small">Endereço</h6>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <span class="text-muted d-block small">CEP</span>
            <div class="border-bottom pb-1">{{ $cliente->cep }}</div>
        </div>
        <div class="col-md-7">
            <span class="text-muted d-block small">Logradouro</span>
            <div class="border-bottom pb-1">{{ $cliente->endereco }}, {{ $cliente->numero }}</div>
        </div>
        <div class="col-md-2">
            <span class="text-muted d-block small">Bairro</span>
            <div class="border-bottom pb-1">{{ $cliente->bairro }}</div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-10">
            <span class="text-muted d-block small">Cidade</span>
            <div class="border-bottom pb-1">{{ $cliente->cidade }}</div>
        </div>
        <div class="col-md-2">
            <span class="text-muted d-block small">UF</span>
            <div class="border-bottom pb-1">{{ $cliente->uf }}</div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary px-4">Editar Cadastro</a>
    </div>
</div>
@endsection