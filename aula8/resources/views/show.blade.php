<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('shared.head')

<body>
    <div class="d-flex justify-content-center">
        <div class="aula2">
            <table id="table-response" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{$pessoa->id}}</th>
                        <td>{{$pessoa->nome}}</td>
                        <td>{{$pessoa->email}}</td>
                        <td>{{$pessoa->senha}}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a href="{{ url("/editar/{$pessoa->id}") }}" class="btn btn-primary">Atualizar registro</a>

                <form method="post" action="{{ url("api/pessoa/{$pessoa->id}") }}">
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Apagar registro</button>
                </form>
            </div>
        </div>

        @include('shared.footer')
    </div>
</body>

</html>