<?php
require_once("conexaobd.php");
?> 

<?php
//Não coloquei em nenhum arquivo por ter poucos dados inseridos.
$numMidias = "SELECT * FROM tb_midia";
$rs_numMidias  = mysqli_query($conn_bd_hf, $numMidias) or die(mysqli_error($conn_bd_hf));
$linhas_numMidias  = mysqli_num_rows($rs_numMidias);
$nota = 0;
$media = 0;

    for($i = 0; $i <= $linhas_numMidias; $i++){
        $pegarMedia = "SELECT * FROM tb_lista WHERE idMidia = '{$i}'";
        $rs_pegarMedia  = mysqli_query($conn_bd_hf, $pegarMedia) or die(mysqli_error($conn_bd_hf));
        $row_rs_pegarMedia = mysqli_fetch_assoc($rs_pegarMedia);
        $linhas_pegarMedia  = mysqli_num_rows($rs_pegarMedia);

        for($j = 0; $j <= $linhas_pegarMedia; $j++ ){
            $pegarNota = $row_rs_pegarMedia["notaMidia"];
            $nota = $nota + $pegarNota;
        }
        $media = $nota/$linhas_pegarMedia;
        $editarMedia = "UPDATE tb_midia SET notaMedia = '{$media}' WHERE tb_midia.idMidia = {$i};";
        $rs_editarMedia  = mysqli_query($conn_bd_hf, $editarMedia) or die(mysqli_error($conn_bd_hf));
    }

    
?>