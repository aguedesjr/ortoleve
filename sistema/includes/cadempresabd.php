<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$nome = utf8_decode($_POST["nome"]);


//$sql = "INSERT INTO empresas (nome) VALUES ('$nome);";
//mysqli_query($conn,$sql);
//mysqli_close($conn);
$message = "";
$status = "false";

if(!mysqli_query($conn,"INSERT INTO empresas (nome) VALUES ('$nome')")){
    $message = 'Erro ao enviar formulário: '. print(mysqli_error($conn));
    $status = "false";
}else{
    $message = 'Empresa <strong>cadastrada</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>