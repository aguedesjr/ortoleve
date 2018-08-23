<?php

//Requer conexao previa com o banco
require_once ("configs/conn.php");

define('FPDF_FONTPATH', 'fpdf181/font/');
require('fpdf181/fpdf.php');

session_start();
$login = $_SESSION['login'];
if (!isset($_SESSION["autenticado"])){
    
    header ("location:index.php");
    exit;
}

//Retorna as informações da categoria no sistema
$sql = "SELECT id, nome FROM `categoria` ORDER BY ABS(nome)";
$resultado = mysqli_query($conn,$sql);

$pdf = new FPDF("L","mm","A4"); //Ajusta as configurações da página
$pdf->AliasNbPages(); //Recebe o total de páginas
$pdf->AddPage(); //Adiciona uma página em branco
$pdf->SetFillColor(255, 115, 81);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,10,utf8_decode('Tabela de Procedimentos Odontológicos'),1,'','C','true');
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(10);
//$pdf->SetY(25);
 while ($result = mysqli_fetch_array($resultado)){
     $pdf->SetFillColor(200, 200, 200);
     $pdf->SetFont('Times','B',14);
     $pdf->Cell(0,10,$result[1],1,'','C','true');
     $pdf->Ln(10);
     //Retorna os procedimentos associados a categoria no sistema
     $sql1 = "SELECT nome, cod, valor_tab, desconto, valor_desc FROM `procedimento` WHERE categoria = '$result[0]'";
     $resultado1 = mysqli_query($conn,$sql1);
     while ($result1 = mysqli_fetch_array($resultado1)){
         $pdf->SetFont('Times','',12);
         $pdf->Cell(12,10,$result1[1],1,'','C');
         $pdf->Cell(199,10,$result1[0],1);
         $pdf->Cell(27,10,$result1[2],1);
         $pdf->Cell(12,10,$result1[3],1);
         $pdf->Cell(27,10,$result1[4],1);
         $pdf->Ln(10);
     }
     //$pdf->Ln(7);
}
$filename="files/tabela_valores.pdf";
$pdf->Output($filename,'F'); //Gera o arquivo no local que fica disponivel para o usuario no servidor
$pdf->Output(); //Gera o PDF no monitor para o usuario visualizar o arquivo

?>