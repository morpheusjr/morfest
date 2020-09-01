$('#cadastroForm').submit(function(event) {
    event.preventDefault();
    
    let id = $('#id').val();
    let nome = $('#nome').val();
    let email = $('#email').val();
    let idade = $('#idade').val();

    let obj = {
        id, nome, email, idade
    }

    $.post('cadastro.php', obj, function(data){
        data = JSON.parse(data)

        let linha = `
            <tr>
                <th>${data.id}</th>
                <td>${data.nome}</td>
                <td>${data.email}</td>
                <td>${data.idade}</td>
            </tr>
        `
        console.log(linha)
        $('#table-response tbody').append(linha)
    })
})