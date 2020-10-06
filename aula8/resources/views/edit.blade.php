<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('shared.head')

<body>
    <div class="d-flex justify-content-center">
        <div class="aula2">
            <div>
                <form method="POST" id='cadastroForm' action="{{ url("/api/pessoa/{$pessoa->id}") }}">
                    @method('PUT')
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value={{ $pessoa->nome }}>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required value={{ $pessoa->email }}>
                        <small id="emailHelp" class="form-text text-muted">Nunca vamos divulgar seu email</small>
                    </div>
                    <div class="form-group">
                        <label for="idade">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required value={{ $pessoa->senha }}>
                    </div>
                    <div class="form-group">
                        <label for="idade">Confirmar senha</label>
                        <input type="password" class="form-control" id="confSenha" name="confSenha" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>