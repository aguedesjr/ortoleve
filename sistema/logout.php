<? 
	session_start();
	//Codigo de logout
	$_SESSION = array();
	session_destroy(); //Encerra a sessao
	unset($_SESSION[login]); //Limpa o login
	//header ("location:index.php");
?>
<!-- Testado no site e está funcional -->
<!-- <meta HTTP-EQUIV="REFRESH" content="0; url=http://ortoleve.com.br/site/index.php"> -->
<meta HTTP-EQUIV="REFRESH" content="0; url=http://ortoleve.com.br/sistema/index.php">