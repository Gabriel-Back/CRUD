@extends('layout')

@section('header')
    
@endsection

@section('body')

    <!-- Botão para adicionar cliente -->

    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar Cliente</a>

    <!-- Tabela para listar os clientes -->
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>UF</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</td>
                <td>{{ $cliente->uf }}</td>
                <td>{{ $cliente->cidade }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum cliente encontrado.</td>
            </tr>
        @endforelse
    </tbody>



@endsection

@section('footer')

@endsection