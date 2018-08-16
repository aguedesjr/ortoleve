<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$login = utf8_decode($_POST["login"]);
$senha = utf8_decode($_POST["senha"]);

/*$sql = "INSERT INTO usuario (nome,senha,carteira,contrato,empresa,parceria,vencimento) VALUES ('$nome',ENCRYPT('$senha'),'$carteira','$contrato','$empresa','$parceria','$vencimento');";
mysqli_query($conn,$sql);
mysqli_close($conn);*/
$message = "";
$status = "false";

if(!mysqli_query($conn,"UPDATE usuario SET senha=ENCRYPT('$senha') WHERE carteira='$login';")){
    $message = 'Erro ao enviar formulário: '. print(mysqli_error($conn));
    $status = "false";
}else{
    $message = 'Senha <strong>alterada</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>