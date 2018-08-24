<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$nome = utf8_decode($_POST["form_botcheck"]);


//$sql = "INSERT INTO empresas (nome) VALUES ('$nome);";
//mysqli_query($conn,$sql);
//mysqli_close($conn);
$message = "";
$status = "false";

if(!mysqli_query($conn,"DELETE FROM usuario WHERE id = '$nome'")){
    $message = 'Erro ao enviar formulário: '. print(mysqli_error($conn));
    $status = "false";
}else{
    $message = 'Usuário <strong>removido</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>