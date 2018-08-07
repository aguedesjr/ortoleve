<?php
  //1 – Definimos Para quem vai ser enviado o email
  $para = "contato@ortoleve.com.br";
  //$para = "agsoares@gmail.com";
  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = $_POST['form_name'];
  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = $_POST['form_subject'];
  //4 - resgatar endereco
  //$endereco = $_POST['endereco'];
  //5 - resgatar telefone
  $tel = $_POST['form_phone'];
  //6 - resgatar email
  $email = $_POST['form_email'];
  //7 - resgatar a mensagem
  $texto = $_POST['form_message'];
  
  
   //7 – Agora definimos a  mensagem que vai ser enviado no e-mail para a ortoleve
  $mensagem = "<strong>Contato solicitado.</strong>";
  $mensagem .= "<br>";
  $mensagem .= "<br> <strong>Segue dados do contato:</strong>";
  $mensagem .= "<br> <strong>--------------------------------------------------------</strong>";
  $mensagem .= "<br> <strong>Nome:  </strong>".$nome;
  $mensagem .= "<br> <strong>E-mail: </strong>".$email;
  $mensagem .= "<br> <strong>Tel: </strong>".$tel;
  $mensagem .= "<br> <strong>Assunto: </strong>".$assunto;
  $mensagem .= "<br> <strong>Mensagem: </strong>".$texto;
  
  
  //8 – Agora definimos a  mensagem que vai ser enviado no e-mail para o usuario
  $mensagem1 = "<strong>Contato Ortoleve.</strong>";
  $mensagem1 .= "<br> <strong>Caro </strong>".$nome;
  $mensagem1 .= "<br>";
  $mensagem1 .= "<br> Agradecemos o contato.";
  $mensagem1 .= "<br> <strong>Em breve um de nossos profissionais irá entrar em contato referente ao assunto informado para melhor atendê-lo.</strong>";
  $mensagem1 .= "<br> <strong>Estamos ansiosos para tê-lo como nosso cliente.</strong>";
  $mensagem1 .= "<br>";
  $mensagem1 .= "<br> <strong>Essa é uma mensagem automática. Favor não responder a este e-mail.</strong>";
  $mensagem1 .= "<br>";
  $mensagem1 .= "<br> <strong>Atte, </strong>";
  $mensagem1 .= "<br> <strong>Ortoleve | Clínica de Odontologia Especializada</strong>";
  
  
  //9 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From: Não Responda Ortoleve<nao-responda@ortoleve.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender: <nao-responda@ortoleve.com.br>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path: <nao-responda@ortoleve.com.br>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";
  
mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email para a ortoleve.
mail($email, "Contato", $mensagem1,$headers); //função que faz o envio do email para o usuario.

$message = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
$status = "true";
$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);

//header("location:contato.php");

?>