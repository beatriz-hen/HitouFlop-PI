<?php 

// métodos de conexão de BD mysqli, mysql e pdo.

$hostname_conn_bd_hf = "localhost";
$database_conn_bd_hf = "bd_hf";
$username_conn_bd_hf = "root";
$password_conn_bd_hf = "";

//criando a conexão usando as variáveis

$conn_bd_hf = mysqli_connect($hostname_conn_bd_hf, $username_conn_bd_hf, $password_conn_bd_hf, $database_conn_bd_hf) or trigger_error(mysqli_errno(), e_user_error());

//verification da conexao: echo "oi"


?>