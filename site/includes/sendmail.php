<?php

/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

$enviaFormularioParaNome = 'Ortoleve';
$enviaFormularioParaEmail = 'nao-responda@ortoleve.com.br';

$caixaPostalServidorNome = 'WebSite | Formulário';
$caixaPostalServidorEmail = 'nao-responda@ortoleve.com.br';
$caixaPostalServidorSenha = 'zBf1NRaK';

/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome  = $_POST['remetenteNome'];
$remetenteEmail = $_POST['remetenteEmail'];
$assunto  = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$mensagemConcatenada = 'Formulário gerado via website'.'< br/>';
$mensagemConcatenada .= '-------------------------------< br/>< br/>';
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'< br/>';
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'< br/>';
$mensagemConcatenada .= 'Assunto: '.$assunto.'< br/>';
$mensagemConcatenada .= '-------------------------------< br/>< br/>';
$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"< br/>';


//require_once('phpmailer/class.phpmailer.php');
//require_once('phpmailer/class.smtp.php');
require_once('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);

$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));


$message = "";
$status = "false";

if(!$mail->Send()){
    $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
    $message = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
    $status = "true";
}



$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>