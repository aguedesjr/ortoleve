<?php
# Arquivo de conexao com o banco de dados
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conn = "localhost";
#$hostname_conn = "localhost:3306:/var/run/mysql/mysql.sock";
$database_conn = "ortoleve";
$username_conn = "ortoleve";
$password_conn = "20oRt0l3vE10@";
$conn = mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn) or trigger_error(mysqli_error(),E_USER_ERROR); 

mysqli_select_db($conn, $database_conn);
?>
