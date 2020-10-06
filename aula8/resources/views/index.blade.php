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
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pessoas as $pessoa)
                    <tr>
                        <th>{{$pessoa->id}}</th>
                        <td>{{$pessoa->nome}}</td>
                        <td>{{$pessoa->email}}</td>
                        <td>{{$pessoa->senha}}</td>
                        <td>
                            <a href="{{ url("pessoa/$pessoa->id") }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/cadastro" class="btn btn-primary">Criar registro</a>
            </div>
        </div>

        @include('shared.footer')
</body>

</html>