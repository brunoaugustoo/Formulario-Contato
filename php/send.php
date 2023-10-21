<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['e-mail'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Preparar o e-mail
    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: contato@brunoaugusto.com\r\n"; // remetente
    $headers .= "Return-Path: contato@brunoaugusto.com\r\n"; // return-path


    $to = 'contato@brunoaugusto.com';
    $subject = 'Novo contato: '.$assunto;
    $message = "Nome: ".$nome."\n".
               "E-mail: ".$email."\n".
               "Telefone: ".$telefone."\n".
               "Mensagem: ".$mensagem."\n";
    
    // Enviar o e-mail
    if(mail($to, $subject, $message, $headers)){
        echo "E-mail enviado com sucesso.";
        
        // Enviar um e-mail de confirmação para a pessoa que preencheu o formulário
        $to = $email;
        $subject = 'Confirmação do contato';
        $message = "Obrigado pelo seu contato, ".$nome.". Nós recebemos sua mensagem e responderemos em breve.";
        
        if(mail($to, $subject, $message, $headers)){
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
