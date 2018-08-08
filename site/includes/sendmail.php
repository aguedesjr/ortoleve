<?php

/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

$enviaFormularioParaNome = 'Contato Ortoleve';
$enviaFormularioParaEmail = 'contato@ortoleve.com.br';

$caixaPostalServidorNome = 'Ortoleve WebSite | Contato';
$caixaPostalServidorEmail = 'nao-responda@ortoleve.com.br';
$caixaPostalServidorSenha = 'zBf1NRaK';

/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome  = $_POST['remetenteNome'];
$remetenteEmail = $_POST['remetenteEmail'];
$assunto  = $_POST['assunto'];
$mensagem = nl2br($_POST['mensagem']);
$telefone = $_POST['telefone'];

$mensagemConcatenada = 'Contato gerado via website'.'<br/>';
$mensagemConcatenada .= '-------------------------------------------<br/><br/>';
$mensagemConcatenada .= 'Segue dados do contato:<br/><br/>';
$mensagemConcatenada .= '<strong>Nome: </strong>'.$remetenteNome.'<br/>';
$mensagemConcatenada .= '<strong>E-mail: </strong>'.$remetenteEmail.'<br/>';
$mensagemConcatenada .= '<strong>Telefone: </strong>'.$telefone.'<br/>';
$mensagemConcatenada .= '<strong>Assunto: </strong>'.$assunto.'<br/>';
$mensagemConcatenada .= '<br/>';
$mensagemConcatenada .= '<strong>Mensagem: </strong><br/>'.$mensagem.'<br/>';


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
    $message = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
    $status = "false";
}else{
    $message = 'Nós <strong>recebemos</strong> sua mensagem e entraremos em contato o mais breve possível.';
    $status = "true";
}



$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>