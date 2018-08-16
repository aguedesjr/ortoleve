<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$nome = utf8_decode($_POST["nome"]);
$empresa = utf8_decode($_POST["empresa"]);
$contrato = utf8_decode($_POST["contrato"]);
$parceria = utf8_decode($_POST["parceria"]);
$carteira = utf8_decode($_POST["carteira"]);
$vencimento = utf8_decode($_POST["vencimento"]);
$senha = utf8_decode($_POST["senha"]);

/*$sql = "INSERT INTO usuario (nome,senha,carteira,contrato,empresa,parceria,vencimento) VALUES ('$nome',ENCRYPT('$senha'),'$carteira','$contrato','$empresa','$parceria','$vencimento');";
mysqli_query($conn,$sql);
mysqli_close($conn);*/
$message = "";
$status = "false";

if(!mysqli_query($conn,"INSERT INTO usuario (nome,senha,carteira,contrato,empresa,parceria,vencimento) VALUES ('$nome',ENCRYPT('$senha'),'$carteira','$contrato','$empresa','$parceria','$vencimento');")){
    $message = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
    $status = "false";
}else{
    $message = 'Usuário <strong>cadastrado</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>