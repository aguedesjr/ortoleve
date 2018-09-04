<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$id = utf8_decode($_POST["form_botcheck"]);
$cod = utf8_decode($_POST["codigo"]);
$nome = utf8_decode($_POST["nome"]);
$categoria = utf8_decode($_POST["categoria"]);
$desconto = utf8_decode($_POST["desconto"]);
$valortab = utf8_decode($_POST["valortab"]);
$valordesc = utf8_decode($_POST["valordesc"]);


//$sql = "INSERT INTO empresas (nome) VALUES ('$nome);";
//mysqli_query($conn,$sql);
//mysqli_close($conn);
$message = "";
$status = "false";

if(!mysqli_query($conn,"UPDATE procedimento SET categoria='$categoria', nome='$nome', valor_tab='$valortab', valor_desc='$valordesc', cod='$cod', desconto='$desconto' WHERE id = '$id'")){
    $message = 'Erro ao enviar formulário: '. print(mysqli_error($conn));
    $status = "false";
}else{
    $message = 'Procedimento <strong>alterado</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>