@extends('layout')

@section('header')
    <h1>Editar Cliente</h1>
@endsection

@section('body')
    
    <!-- Formulário para criar um novo cliente -->

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome: </label>
            <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" >
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento: </label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $cliente->data_nascimento }}" >
        </div>
        <div class="mb-3">
            <label for="cep" class="form-label">CEP: </label>
            <input type="text" name="cep" id="cep" value="{{ $cliente->cep }}" >
        </div>
        <div></div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço: </label>
            <input type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}" >
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número: </label>
            <input type="text" name="numero" id="numero" value="{{ $cliente->numero }}" >
        </div>
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro: </label>
            <input type="text" name="bairro" id="bairro" value="{{ $cliente->bairro }}" >
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade: </label>
            <input type="text" name="cidade" id="cidade" value="{{ $cliente->cidade }}" >
        </div>
        <div class="mb-3">
            <label for="uf" class="form-label">UF: </label>
            <input type="text" name="uf" id="uf" value="{{ $cliente->uf }}" >
        </div>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@section('footer')

@endsection

@section('script')

    <!-- comando do campo CEP para buscar o endereço -->
    <script>
        document.getElementById('cep').addEventListener('blur', function() {
            var cep = this.value.replace(/\D/g, '');
            if (cep.length === 8) {
                fetch(`/api/cep/${cep}`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.error) {
                            document.getElementById('endereco').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('uf').value = data.uf;
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(() => alert('Erro ao buscar CEP.'));
            } else {
                alert('CEP inválido.');
            }
        });
    </script>

@endsection