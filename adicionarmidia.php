<?php require_once("conexaobd.php");?>

<?php

$idMidia = $_GET['idMidia'];
$verificarLista = "SELECT * FROM tb_lista WHERE idUsuario = 1 AND idMidia = $idMidia";
$rs_verificarLista  = mysqli_query($conn_bd_hf, $verificarLista) or die($mysqli_error($conn_bd_hf));
$row_rs_verificarLista  = mysqli_fetch_assoc($rs_verificarLista);
$linhas_verificarLista = mysqli_num_rows($rs_verificarLista);

    if($linhas_verificarLista == 0){
        if(isset($_POST['status']) && isset($_POST['avaliacao']) && isset($_POST['episodio']) && isset($_POST['comentario'])){

        $status = $_POST['status'];
        $avaliacao = $_POST['avaliacao'];
        $episodio = $_POST['episodio'];
        $comentario = $_POST['comentario'];

        $inserir = "INSERT INTO tb_lista (idLista, idUsuario, idMidia, notaMidia, episodios, status, comentarioMidia, idTipo) 
        VALUES (NULL, '1', '$idMidia', '$avaliacao', '$episodio', '$status', '$comentario', '0');"; 
        $rs_inserir = mysqli_query($conn_bd_hf, $inserir) or die($mysqli_error($conn_bd_hf));

         echo("<script>alert('Mídia adicionada na lista.'); window.location.href='midia.php?idMidia=$idMidia';</script>");

        }
    } else {
        echo("<script>alert('Você já tem essa mídia em sua lista.'); window.location.href='midia.php?idMidia=$idMidia';</script>");
    }

?>