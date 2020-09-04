
const postCadastro = '../../src/cadastro.php';
const getLista = '../../src/listar.php';

$(document).ready(function () {

    $.get(getLista, function (resposta) {
        resposta = JSON.parse(resposta);
        if (resposta.status == 200) {
            for (let i = 0; i < resposta.data.length; i++) {
                let linha = `
                    <tr>
                        <th>${resposta.data[i].id}</th>
                        <td>${resposta.data[i].nome}</td>
                        <td>${resposta.data[i].email}</td>
                        <td>${resposta.data[i].senha}</td>
                    </tr>
                    `
                console.log(linha)
                $('#table-response tbody').append(linha)
            }
        }
        else {
            alert("Erro inesperado");
        }
    });
});

$('#cadastroForm').submit(function (event) {
    event.preventDefault();

    let nome = $('#nome').val();
    let email = $('#email').val();
    let senha = $('#senha').val();
    let confSenha = $('#confSenha').val();

    let obj = {
        nome, email, senha, confSenha
    }

    $.post(postCadastro, obj, function (resposta) {
        // Essa resposta vai ser 201 (Created) ou 400 (Bad request)
        resposta = JSON.parse(resposta);
        if (resposta.status == 201) {
            alert("Pessoa criada com sucesso");
            window.location.replace('../index.html');
        }
        else if (resposta.status == 400) {
            alert("Senha e confirmação de senha, devem ser iguais!");
        }
        else {
            alert("Erro inesperado");
        }
    });
})