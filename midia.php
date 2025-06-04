<?php require_once("conexaobd.php");?>

<?php

  include("sessao_verifica.php");

  if (isset($_GET['idMidia'])) {
    $idMidia = $_GET['idMidia'];
  } else {
    header("Location: index.php");
  }

$midia = "SELECT * FROM tb_midia WHERE idMidia = {$idMidia}";
$rs_midia  = mysqli_query($conn_bd_hf, $midia) or die($mysqli_error($conn_bd_hf));
$linhas_midia  = mysqli_num_rows($rs_midia);
$row_rs_midia  = mysqli_fetch_assoc($rs_midia);

$comentario = "SELECT * FROM tb_lista INNER JOIN tb_usuario on tb_usuario.idUsuario = tb_lista.idUsuario WHERE tb_lista.idMidia = {$idMidia}";
$rs_comentario  = mysqli_query($conn_bd_hf, $comentario) or die($mysqli_error($conn_bd_hf));
$linhas_comentario  = mysqli_num_rows($rs_comentario);
$row_rs_comentario  = mysqli_fetch_assoc($rs_comentario);

if (isset($_POST['status']) ) {

$status = $_POST['status'];
$comentario = $_POST['comentario'];
$nota = $_POST['nota'];
$episodio = $_POST['episodio'];


$inserirLista = "INSERT INTO tb_lista (idLista, idUsuario, idMidia, notaMidia, episodios, status, comentarioMidia, idTipo) VALUES (NULL, '1', '$idMidia', '$nota', '$episodio', '$status', '$comentario', '');";
$rs_inserirLista = mysqli_query($conn_bd_hf, $inserirLista) or die($mysqli_error($conn_bd_hf));

if($rs_inserirLista == true){
	echo('<script> alert("Dado inserido !! :)"); 
	window.location.href="midia.php?idMidia={$idMidia}";
	</script>');
}
}






?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mídia</title>
  <link rel="stylesheet" href="midia-style.css" />
</head>

<body>
  <header>
    <div class="logo">
      <img src="imagens/logo1.png" alt="Logo" />
    </div>
    <nav>
      <a href="index.php">Início</a>
      <a href="series.php">Séries</a>
      <a href="filmes.php">Filmes</a>
      <a href="animes.php">Animes</a>
      <a href="desenhos.php">Desenhos</a>
    </nav>
    <div class="icons">
      <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
        style="margin-right: 15px;">
        <path d="M10 2a8 8 0 015.29 13.71l5 5a1 1 0 01-1.42 1.42l-5-5A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z" />
      </svg>
      <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
      </svg>
    </div>
  </header>

  <main class="main">
    <div class="conteudo-superior">
      <div>
        <div class="poster">Imagem</div>
        <div class="avaliacao"> <?php 
                            
                    $notaMidia = $row_rs_midia['notaMedia'];
                    $estrelas = "";
                    for($i = 0; $i < 10; $i++){
                            if($i < $notaMidia){
                                $estrelas = $estrelas . "★";
                            } else {
                                $estrelas = $estrelas . "☆";
                            }

                    }

                    echo($estrelas);
                    ?></div>
        <div class="info">
          <p><strong>Episódios:</strong><?php echo($row_rs_midia['qtdEpisodio'])?></p>
          <p><strong>Data de lançamento:</strong><?php echo($row_rs_midia['anoLancamento'])?>(<a href="#" style="color:#ffcb14;">Brasil</a>)</p>
        </div>
      </div>

      <div class="descricao">
        <p><strong>Sinopse:</strong><br /><?php echo($row_rs_midia['sinopse'])?></p>
        <br><br>

        <form method="post" id="form_avaliar" action="adicionarmidia.php?idMidia=<?php echo($row_rs_midia['idMidia'])?>">
        
        <select name="status" id="status">
          <option value="w">Assistindo</option>
          <option value="c">Completo</option>
          <option value="p">Pausado</option>
        </select>
        <br>
        <br>
        <input name="episodio" type="number" id="episodio" min="1" max="<?php echo($row_rs_midia['qtdEpisodio']);?>" style="width: 3em" required>/<?php echo($row_rs_midia['qtdEpisodio']);?>
        <br>
        <textarea placeholder="Faça sua avaliação." name="comentario" id="comentario" required></textarea>

          <div id="nota" class="avaliacao dinamica">
            <span class="estrela" onclick="guardarAvaliacao(1)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(2)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(3)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(4)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(5)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(6)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(7)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(8)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(9)">★</span>
            <span class="estrela" onclick="guardarAvaliacao(10)">★</span>
            
            <script>
              function guardarAvaliacao(nota){
                  var notaMidia = nota.toString();
                  document.getElementById("avaliacao").value = notaMidia;
              }


            </script>
            <input type="hidden" name="avaliacao" id="avaliacao" value="10">
          </div>

          <button type="submit">Enviar</button>
        </form>
        <div class="comentarios-section">
          <h3>Comentários Recentes</h3>
          <section class="slider">
            <input type="radio" name="slide" id="s1" checked />
            <input type="radio" name="slide" id="s2" />
            <input type="radio" name="slide" id="s3" />

            <div class="slider-content">
              <div class="slider-item">
                  <?php do{ ?>
                <div class="comentario">
                  <div class="usuario">👤 <?php echo($row_rs_comentario['nomeUsuario'])?></div>
                  <p><?php echo($row_rs_comentario['comentarioMidia'])?></p>
                  <div class="estrela">         
                    <?php
                    $notaMidia = $row_rs_comentario['notaMidia'];
                    $estrelas = "";
                    for($i = 0; $i < 10; $i++){
                            if($i < $notaMidia){
                                $estrelas = $estrelas . "★";
                            } else {
                                $estrelas = $estrelas . "☆";
                            }

                    }

                    echo($estrelas);?></div><?php } while($row_rs_comentario = mysqli_fetch_assoc($rs_comentario)); ?>
                </div>
              
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 2</p>
                  <div class="estrela">★★★★★☆☆☆☆☆</div>
                  <div class="data">Data</div>
                </div>
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 3</p>
                  <div class="estrela">★★★★★★★★☆☆</div>
                  <div class="data">Data</div>
                </div>
              </div>
              <div class="slider-item">
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 4</p>
                  <div class="estrela">★★★★★☆☆☆☆☆</div>
                  <div class="data">Data</div>
                </div>
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 5</p>
                  <div class="estrela">★★★★★★★☆☆☆</div>
                  <div class="data">Data</div>
                </div>
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 6</p>
                  <div class="estrela">★★★★★★★☆☆☆</div>
                  <div class="data">Data</div>
                </div>
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 7</p>
                  <div class="estrela">★★★★★★★☆☆☆</div>
                  <div class="data">Data</div>
                </div>
              </div>
            </div>

          <div class="slider-nav">
            <label for="s1"></label>
            <label for="s2"></label>
            <label for="s3"></label>
          </div>

          </section>
        </div>
      </div>
    </div>
  </main>

  <!-- Script das estrelas -->
  <script>
    const estrelas = document.querySelectorAll('.avaliacao.dinamica .estrela');

    estrelas.forEach((estrela, index) => {
      estrela.addEventListener('click', () => {
        const nota = index + 1;

        estrelas.forEach((e, i) => {
          e.textContent = i < nota ? '★' : '☆';
        });
      });
    });
  </script>
</body>

</html>