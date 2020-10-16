$('#botaoCadastrar').on('click', function (event) {

    event.preventDefault();
    cadastraUsuario();
});


function cadastraUsuario() {

    let obj;

    let id = $('#id').val();
    let nome = $('#nome').val();
    let email = $('#email').val();
    let idade = $('#idade').val();

    obj = { id, nome, email, idade }

    $.post('cadastro.php', obj, function () {
    }).done(function (data) {
        console.log("Sucesso ao realizar cadastro!");
        adicionaLinhaTabela(data);
    }).fail(function (data) {
        console.log("Falha ao realizar cadastro!");
    });
}


function adicionaLinhaTabela(data) {

    data = JSON.parse(data)

    let linha = `
            <tr>
                <th>${data.id}</th>
                <td>${data.nome}</td>
                <td>${data.email}</td>
                <td>${data.idade}</td>
            </tr>
        `
    $('#table-response tbody').append(linha)
}