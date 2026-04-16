@extends('layout')

@section('body')
<div class="container mt-4">
    <h3 class="mb-4 border-bottom pb-2">Editar Cliente</h3>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}" required>
            </div>
            <div class="col-md-4">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->cep }}" required>
            </div>
            <div class="col-md-7">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $cliente->endereco }}" required>
            </div>
            <div class="col-md-2">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" value="{{ $cliente->numero }}" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $cliente->bairro }}" required>
            </div>
            <div class="col-md-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}" required>
            </div>
            <div class="col-md-2">
                <label for="uf" class="form-label">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" value="{{ $cliente->uf }}" maxlength="2" required>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

@section('script')
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

@endsection