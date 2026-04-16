@extends('layout')

@section('header')
@endsection

@section('body')
<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h3 class="mb-0">Lista de Clientes</h3>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            Adicionar Cliente
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>UF</th>
                    <th>Cidade</th>
                    <th class="text-end">Ações</th> </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td class="fw-bold">{{ $cliente->nome }}</td>
                        <td>{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</td>
                        <td>{{ $cliente->uf }}</td>
                        <td>{{ $cliente->cidade }}</td>
                        
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info text-white">Mostrar</a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Nenhum cliente cadastrado no momento.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('footer')
@endsection