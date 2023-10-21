document.getElementById('contact-form').addEventListener('submit', function(event) {
    // Impede o envio imediato do formulário
    event.preventDefault();

    var nome = document.getElementById('nome');
    var email = document.getElementById('e-mail');
    var assunto = document.getElementById('assunto');
    var telefone = document.getElementById('telefone');
    var mensagem = document.getElementById('mensagem');

    // Remove a classe 'erros' e restaura os placeholders originais
    nome.className = '';
    nome.placeholder = '';
    email.className = '';
    email.placeholder = '';
    assunto.className = '';
    assunto.placeholder = '';
    telefone.className = '';
    telefone.placeholder = '';
    mensagem.className = '';
    mensagem.placeholder = '';

    if (!nome.value || !email.value || !assunto.value || !telefone.value || !mensagem.value) {
        // Adiciona a classe 'erros' e altera os placeholders para as mensagens de erro
        if (!nome.value) {
            nome.className = 'erros';
            nome.placeholder = 'Por favor, preencha o campo nome.';
        }
        if (!email.value) {
            email.className = 'erros';
            email.placeholder = 'Por favor, preencha o campo e-mail.';
        }
        if (!assunto.value) {
            assunto.className = 'erros';
            assunto.placeholder = 'Por favor, preencha o campo assunto.';
        }
        if (!telefone.value) {
            telefone.className = 'erros';
            telefone.placeholder = 'Por favor, preencha o campo telefone.';
        }
        if (!mensagem.value) {
            mensagem.className = 'erros';
            mensagem.placeholder = 'Por favor, preencha o campo mensagem.';
        }
        return false;
    }

    var reEmail = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if (!reEmail.test(email.value)) {
        email.className = 'erros';
        email.value = '';
        email.placeholder = 'Por favor, insira um endereço de e-mail válido.';
        return false;
    }

    var reTelefone = /^\(\d{2}\) \d{5}-\d{4}$/;
    if (!reTelefone.test(telefone.value)) {
        telefone.className = 'erros';
        telefone.value = '';
        telefone.placeholder = 'Por favor, insira um telefone válido Ex.: (99) 99999-9999.';
        return false;
    }

    // Se a validação for bem-sucedida, envia o formulário
    event.target.submit();
});

// Adiciona automaticamente os parênteses e o hífen enquanto o usuário está digitando
document.getElementById('telefone').addEventListener('input', function(event) {
  var inputTelefone = event.target;
  var reTelefoneInput = /^(\d{2})(\d{5})(\d{4})$/;
  inputTelefone.value = inputTelefone.value.replace(/\D/g, '').replace(reTelefoneInput, '($1) $2-$3');
});
