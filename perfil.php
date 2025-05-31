<?php require_once("conexaobd.php");?>
 
<?php
$usuario = "SELECT * FROM tb_usuario WHERE idUsuario = '1'";
$rs_usuario = mysqli_query($conn_bd_hf, $usuario) or die($mysqli_error($conn_bd_hf));
$linhas_usuario = mysqli_num_rows($rs_usuario);
$row_rs_usuario = mysqli_fetch_assoc($rs_usuario);

$qtdMidias = "SELECT * FROM tb_lista WHERE idUsuario = '1'";
$rs_qtdMidias = mysqli_query($conn_bd_hf, $qtdMidias) or die($mysqli_error($conn_bd_hf));
$linhas_qtdMidias = mysqli_num_rows($rs_qtdMidias);



$lista = "SELECT * FROM tb_lista inner join tb_midia on tb_lista.idMidia = tb_midia.idMidia where idUsuario = 1 order by tb_midia.nomeMidia";
$rs_lista = mysqli_query($conn_bd_hf, $lista) or die($mysqli_error($conn_bd_hf));
$linhas_lista = mysqli_num_rows($rs_lista);
$row_rs_lista = mysqli_fetch_assoc($rs_lista);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mídia</title>
    <link rel="stylesheet" href="perfil-style.css" />
</head>

<body>
    <header>
        <div class="logo">
      <img src="imagens/logo1.png" alt="Logo" />
    </div>
        <div class="icons">
            <a href="perfil.html" style="display: inline-block; margin-left: 15px;">
                <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </a>
            <button class="btn-sair">Sair</button>
        </div>
    </header>

    <div class="perfil-container">
        <div class="perfil-topo">
            <button class="btn-voltar" onclick="history.back()">←</button>
            <div class="foto-perfil">
                <img id="imagem-perfil" src="" alt="Foto de Perfil" style="display:none;" />
                <input type="file" id="upload-foto" accept="image/*" style="display:none;" />
                <span>📷</span>
                <button class="btn-foto">+</button>
            </div>
            <div class="info-usuario">
                <div class="nome-editavel">
                    <h2 id="nome-display">
                       <?php echo($row_rs_usuario['nomeUsuario']);?>
                        <button class="btn-nome" id="editar-nome-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 
                          7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 
                          1.003 0 0 0-1.42 0l-1.83 1.83 
                          3.75 3.75 1.84-1.82z" />
                            </svg>
                        </button>
                    </h2>
                    <input type="text" id="nome-input" class="input-nome" value="Nome do Usuário" />
                </div>
                <hr style="background-color: #4fc3f7;" />
                <p><?php if($linhas_qtdMidias == 1) { echo($linhas_qtdMidias); echo(" mídia assistida.");  } else {echo($linhas_qtdMidias); echo(" mídias assistidas."); ;} ?> </p>
            </div>
        </div>

        <div class="cards-container">
            <?php do { ?>
            <div class="card">
                <div class="card-topo">
                    <div>
                        <h3><?php echo($row_rs_lista['nomeMidia'])?></h3>
                        <strong><?php echo("Progresso: ");
                            echo($row_rs_lista['episodios']);
                        
                            $qtdEp = "SELECT * FROM tb_midia WHERE idMidia = '{$row_rs_lista["idMidia"]}'";
                            $rs_qtdEp = mysqli_query($conn_bd_hf, $qtdEp) or die($mysqli_error($conn_bd_hf));
                            $linhas_qtdEp = mysqli_num_rows($rs_qtdEp);
                            $row_rs_qtdEp = mysqli_fetch_assoc($rs_qtdEp);
                            echo("/"); echo($row_rs_qtdEp['qtdEpisodio']);
                        
                        ?></strong>
                    </div>
                    <div class="estrelas">
                        
                    <?php 
                            
                    $notaMidia = $row_rs_lista['notaMidia'];
                    $estrelas = "";
                    for($i = 0; $i < 10; $i++){
                            if($i < $notaMidia){
                                $estrelas = $estrelas . "★";
                            } else {
                                $estrelas = $estrelas . "☆";
                            }

                    }

                    echo($estrelas);
                    ?>
                
                    </div>
                </div>
                <p><?php echo($row_rs_lista['comentarioMidia'])?></p>
                <hr style="background-color: #103846;">
                <div class="acoes">
                    <button style="border-color:<?php if($row_rs_lista['status'] == 'w'){echo('#ffcb14');} else {echo('white');}?>"><svg width="20" height="20" fill="<?php if($row_rs_lista['status'] == 'w'){echo('#ffcb14');} else {echo('white');}?>" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg></button>
                    <button style="border-color: <?php if($row_rs_lista['status'] == 'p'){echo('#ffcb14');} else {echo('white');}?>"><svg width="20" height="20" fill="<?php if($row_rs_lista['status'] == 'p'){echo('#ffcb14');} else {echo('white');}?>" viewBox="0 0 24 24">
                            <path d="M6 5h4v14H6zM14 5h4v14h-4z" />
                        </svg></button>
                    <button style="border-color: <?php if($row_rs_lista['status'] == 'c'){echo('#ffcb14');} else {echo('white');}?>"><svg width="20" height="20" fill="<?php if($row_rs_lista['status'] == 'c'){echo('#ffcb14');} else {echo('white');}?>" viewBox="0 0 24 24">
                            <path
                                d="M2 21h4V9H2v12zM22 10c0-1.1-.9-2-2-2h-6.31l.95-4.57-.29-.7-1-1L8 9v10h10c.83 0 1.54-.5 1.84-1.22l2-5c.11-.23.16-.48.16-.78v-1z" />
                        </svg></button>
                </div>
            </div>
           <?php } while($row_rs_lista = mysqli_fetch_assoc($rs_lista));?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cards = document.querySelectorAll(".card");
            cards.forEach(card => {
                const botoes = card.querySelectorAll(".acoes button");
                botoes.forEach(botao => {
                    botao.addEventListener("click", () => {
                        botoes.forEach(b => b.classList.remove("ativo"));
                        botao.classList.add("ativo");
                    });
                });
            });

            const nomeDisplay = document.getElementById("nome-display");
            const nomeInput = document.getElementById("nome-input");
            const editarBtn = document.getElementById("editar-nome-btn");

            editarBtn.addEventListener("click", () => {
                nomeInput.value = nomeDisplay.textContent.trim();
                nomeDisplay.style.display = "none";
                nomeInput.style.display = "block";
                nomeInput.focus();
            });

            nomeInput.addEventListener("blur", salvarNome);
            nomeInput.addEventListener("keydown", (e) => {
                if (e.key === "Enter") salvarNome();
            });

            function salvarNome() {
                const novoNome = nomeInput.value.trim();
                if (novoNome) nomeDisplay.childNodes[0].textContent = novoNome + " ";
                nomeInput.style.display = "none";
                nomeDisplay.style.display = "block";
            }
        });
    </script>

    <script>
        const btnFoto = document.querySelector(".btn-foto");
        const inputFoto = document.getElementById("upload-foto");
        const imgPerfil = document.getElementById("imagem-perfil");
        const fotoPerfil = document.querySelector(".foto-perfil");

        btnFoto.addEventListener("click", () => {
            inputFoto.click();
        });

        inputFoto.addEventListener("change", () => {
            const file = inputFoto.files[0];
            if (file && file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPerfil.src = e.target.result;
                    imgPerfil.style.display = "block";
                    imgPerfil.style.width = "100%";
                    imgPerfil.style.height = "100%";
                    imgPerfil.style.objectFit = "cover";
                    imgPerfil.style.borderRadius = "50%";
                    // Remove emoji (📷) se estiver visível
                    const emoji = fotoPerfil.querySelector("span");
                    if (emoji) emoji.style.display = "none";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>