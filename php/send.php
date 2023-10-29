<?php
if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['e-mail'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $to = 'contato@brunoaugusto.com'; // substitua pelo seu e-mail
    $subject = 'Formulário de Contato';
    $message = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\nAssunto: $assunto\nMensagem: $mensagem";
    
    // Cabeçalhos
    $headers = "From: Meu Nome <contato@brunoaugusto.com>\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Return-Path: contato@brunoaugusto.com\n";

    // Enviar e-mail
    if(mail($to, $subject, $message, $headers, "-r"."contato@brunoaugusto.com")){
        // Enviar e-mail de confirmação para o remetente
        $confirmSubject = 'Confirmação de recebimento de mensagem';
        $confirmMessage = "Olá, $nome. Recebemos sua mensagem e entraremos em contato em breve.";
        mail($email, $confirmSubject, $confirmMessage, $headers, "-r"."contato@brunoaugusto.com");
        
        echo "<script>alert('E-mail enviado com sucesso!'); location.href='../contato.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar e-mail. Tente novamente.'); location.href='../contato.html';</script>";
    }
}
?>
