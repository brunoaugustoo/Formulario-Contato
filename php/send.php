<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['e-mail'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Preparar o e-mail
    $to = 'contato@brunoaugusto.com';
    $subject = 'Novo contato: '.$assunto;
    $message = "Nome: ".$nome."\n".
               "E-mail: ".$email."\n".
               "Telefone: ".$telefone."\n".
               "Mensagem: ".$mensagem."\n".
               "Se inscrever: ".$seinscrever;
    
    // Enviar o e-mail
    if(mail($to, $subject, $message)){
        echo "E-mail enviado com sucesso.";
        
        // Enviar um e-mail de confirmação para a pessoa que preencheu o formulário
        $to = $email;
        $subject = 'Confirmação do contato';
        $message = "Obrigado pelo seu contato, ".$nome.". Nós recebemos sua mensagem e responderemos em breve.";
        
        if(mail($to, $subject, $message)){
            echo "E-mail de confirmação enviado com sucesso.";
        } else {
            echo "Falha ao enviar o e-mail de confirmação.";
        }
        
    } else {
        echo "Falha ao enviar o e-mail.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
