<?php require_once("conexaobd.php");?>

<?php

$status = $_GET['status'];
$idMidia = $_GET['idMidia'];

$atualizar = "UPDATE tb_lista SET status = '$status' WHERE tb_lista.idUsuario = 1 AND tb_lista.idMidia = $idMidia";
$rs_atualizar = mysqli_query($conn_bd_hf, $atualizar) or die($mysqli_error($conn_bd_hf));

$usuario = "SELECT * FROM tb_usuario WHERE idUsuario = '1'";
$rs_usuario = mysqli_query($conn_bd_hf, $usuario) or die($mysqli_error($conn_bd_hf));
$linhas_usuario = mysqli_num_rows($rs_usuario);
$row_rs_usuario = mysqli_fetch_assoc($rs_usuario);

$id = $row_rs_usuario['idUsuario'];
header("Location: perfil.php?idUsuario=$id");

?>