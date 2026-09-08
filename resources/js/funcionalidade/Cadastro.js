import jquery from 'jquery';
$(document).ready(function(){
    $('#cadastroform').submit(function(event){
        event.preventDefault(); // Impede o envio padrão do formulário

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();

        // Aqui você pode adicionar a lógica para enviar os dados para o servidor

        // Por exemplo, usando AJAX:
        $.ajax({
            url: '/register',
            method: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
                _token: $('meta[name="csrf-token"]').attr('content') // Inclua o token CSRF se necessário
            },
            success: function(response) {
                // Lógica em caso de sucesso (por exemplo, redirecionar para outra página)
                window.location.href = '/dashboard'; // Substitua pela URL desejada após o cadastro
            },
            error: function(xhr, status, error) {
                // Lógica em caso de erro (por exemplo, exibir uma mensagem de erro)
                alert('Erro ao fazer cadastro: ' + xhr.responseText);
            }
        });
    });
});

