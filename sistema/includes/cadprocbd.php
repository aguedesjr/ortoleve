<?php

session_start();
//Requer conexão prévia com o banco de dados
require_once ("../configs/conn.php");

//Recupera as informações vindas do formulário de cadastro de usuários
$nome = utf8_decode($_POST["nome"]); //nome procedimento
$codigo = utf8_decode($_POST["codigo"]); //codigo procedimento
$categoria = utf8_decode($_POST["categoria"]); //categoria procedimento (ex.: cirurgia, protese, etc)
$desconto = utf8_decode($_POST["desconto"]); //desconto procedimento
$valortab = utf8_decode($_POST["valortab"]); //valor tabelado procedimento
$valordesc = utf8_decode($_POST["valordesc"]); //valor desconto procedimento


/*$sql = "INSERT INTO usuario (nome,senha,carteira,contrato,empresa,parceria,vencimento) VALUES ('$nome',ENCRYPT('$senha'),'$carteira','$contrato','$empresa','$parceria','$vencimento');";
mysqli_query($conn,$sql);
mysqli_close($conn);*/
$message = "";
$status = "false";

if(!mysqli_query($conn,"INSERT INTO procedimento (categoria,nome,valor_tab,valor_desc,cod,desconto) VALUES ('$categoria','$nome','$valortab','$valordesc','$codigo','$desconto');")){
    $message = 'Erro ao enviar formulário: '. print(mysqli_error($conn));
    $status = "false";
}else{
    $message = 'Procedimento <strong>cadastrado</strong> com sucesso';
    $status = "true";
}
mysqli_close($conn);


$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>