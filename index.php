<?php require_once("conexaobd.php"); ?>

<?php
include("sessao_verifica.php");
$filmesMelhor = "
SELECT m.*
FROM tb_midia m
INNER JOIN (
  SELECT idTipo, MAX(notaMedia) AS maxNota
  FROM tb_midia
  GROUP BY idTipo
) AS melhores
ON m.idTipo = melhores.idTipo AND m.notaMedia = melhores.maxNota
ORDER BY m.idTipo";

$rs_filmesMelhor  = mysqli_query($conn_bd_hf, $filmesMelhor) or die(mysqli_error($conn_bd_hf));
$linhas_filmesMelhor  = mysqli_num_rows($rs_filmesMelhor);
$row_rs_filmesMelhor  = mysqli_fetch_assoc($rs_filmesMelhor);

// $filmesMelhor = "SELECT * FROM tb_midia WHERE idTipo IN (1,2,3,4) ORDER BY notaMedia desc limit 5";
// $rs_filmesMelhor  = mysqli_query($conn_bd_hf, $filmesMelhor) or die($mysqli_error($conn_bd_hf));
// $linhas_filmesMelhor  = mysqli_num_rows($rs_filmesMelhor);
// $row_rs_filmesMelhor  = mysqli_fetch_assoc($rs_filmesMelhor);

$filmesIndicado = "
SELECT m.*
FROM tb_midia m
INNER JOIN (
  SELECT idTipo, MAX(visualizacao) AS maxVisualizacao
  FROM tb_midia
  GROUP BY idTipo
) AS indicados
ON m.idTipo = indicados.idTipo AND m.visualizacao = indicados.maxVisualizacao
ORDER BY m.idTipo";

$rs_filmesIndicado  = mysqli_query($conn_bd_hf, $filmesIndicado) or die(mysqli_error($conn_bd_hf));
$linhas_filmesIndicado  = mysqli_num_rows($rs_filmesIndicado);
$row_rs_filmesIndicado  = mysqli_fetch_assoc($rs_filmesIndicado);

// $filmesIndicado = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY visualizacao desc limit 5";
// $rs_filmesIndicado   = mysqli_query($conn_bd_hf, $filmesIndicado) or die($mysqli_error($conn_bd_hf));
// $linhas_filmesIndicado   = mysqli_num_rows($rs_filmesIndicado);
// $row_rs_filmesIndicado   = mysqli_fetch_assoc($rs_filmesIndicado);

$filmesPior = "
SELECT m.*
FROM tb_midia m
INNER JOIN (
  SELECT idTipo, MIN(notaMedia) AS minNota
  FROM tb_midia
  GROUP BY idTipo
) AS pior
ON m.idTipo = pior.idTipo AND m.notaMedia = pior.minNota
ORDER BY m.idTipo";

$rs_filmesPior  = mysqli_query($conn_bd_hf, $filmesPior) or die(mysqli_error($conn_bd_hf));
$linhas_filmesPior  = mysqli_num_rows($rs_filmesPior);
$row_rs_filmesPior  = mysqli_fetch_assoc($rs_filmesPior);


// $filmesPior = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY notaMedia asc limit 5";
// $rs_filmesPior  = mysqli_query($conn_bd_hf, $filmesPior) or die($mysqli_error($conn_bd_hf));
// $linhas_filmesPior  = mysqli_num_rows($rs_filmesPior);
// $row_rs_filmesPior  = mysqli_fetch_assoc($rs_filmesPior);

$filmesRecente = "
SELECT m.*
FROM tb_midia m
INNER JOIN (
  SELECT idTipo, MAX(anoLancamento) AS maxLancamento
  FROM tb_midia
  GROUP BY idTipo
) AS recente
ON m.idTipo = recente.idTipo AND m.anoLancamento = recente.maxLancamento
ORDER BY m.idTipo";

$rs_filmesRecente  = mysqli_query($conn_bd_hf, $filmesRecente) or die(mysqli_error($conn_bd_hf));
$linhas_filmesRecente  = mysqli_num_rows($rs_filmesRecente);
$row_rs_filmesRecente  = mysqli_fetch_assoc($rs_filmesRecente);

// $filmesRecente = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY anoLancamento desc limit 5";
// $rs_filmesRecente  = mysqli_query($conn_bd_hf, $filmesRecente) or die($mysqli_error($conn_bd_hf));
// $linhas_filmesRecente  = mysqli_num_rows($rs_filmesRecente);
// $row_rs_filmesRecente  = mysqli_fetch_assoc($rs_filmesRecente);

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Séries</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <div class="logo">
      <img src="imagens/logo1.png" alt="Logo" />
    </div>

    <nav>
      <a href="index.php" class="active">Início</a>
      <a href="series.php">Séries</a>
      <a href="filmes.php">Filmes</a>
      <a href="animes.php">Animes</a>
      <a href="desenhos.php">Desenhos</a>
    </nav>
    <div class="icons" style="display: flex; align-items: center;">
      <form action="pesquisa-resultado.php" method="get" id="form_pesquisa">
        <input type="text" placeholder="Pesquisar..." name="pesquisado" id="pesquisado" class="search-input" style="display: none;" />
      </form>

      <button id="search-btn" style="background: none; border: none; cursor: pointer; margin-left: 10px;">
        <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 2a8 8 0 015.29 13.71l5 5a1 1 0 01-1.42 1.42l-5-5A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z" />
        </svg>
      </button>

      <a href="perfil.php" style="display: inline-block; margin-left: 15px;">
        <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
        </svg>
      </a>
    </div>
    <script>
      const searchBtn = document.getElementById('search-btn');
      const searchInput = document.getElementById('pesquisado');

      searchBtn.addEventListener('click', () => {
        const visible = searchInput.style.display === 'inline-block';
        searchInput.style.display = visible ? 'none' : 'inline-block';
        if (!visible) searchInput.focus();
      });

      searchInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
          realizarPesquisa();
        }
      });

      function realizarPesquisa() {
        const termo = searchInput.value;
      }
    </script>

  </header>

  <main>
    <!-- <h1>Séries</h1>
    <div class="genre-select">
      <label for="genre">Gênero</label>
      <select id="genre">
        <option value="all">Todos</option>
        <option value="acao">Ação</option>
        <option value="drama">Drama</option>
        <option value="comedia">Comédia</option>
      </select>
    </div> -->
    <section>
      <h2>Melhores Avaliados</h2>
      <div class="series-row">
        <?php do { ?>
          <a href="midia.php?idMidia=<?php echo ($row_rs_filmesMelhor["idMidia"]); ?>" class="card-link">
            <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
              <h1><?php echo ($row_rs_filmesMelhor["nomeMidia"]); ?></h1>
              <p><?php echo ($row_rs_filmesMelhor["notaMedia"]); ?></p>
            </div>
          </a>
        <?php } while ($row_rs_filmesMelhor = mysqli_fetch_assoc($rs_filmesMelhor)); ?>
      </div>
    </section>

    <section>
      <h2>Indicados</h2>
      <div class="series-row">
        <?php do { ?>
          <a href="midia.php?idMidia=<?php echo ($row_rs_filmesPior["idMidia"]); ?>" class="card-link">
            <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
              <h1><?php echo ($row_rs_filmesIndicado["nomeMidia"]); ?></h1>
              <p><?php echo ($row_rs_filmesIndicado["notaMedia"]); ?></p>
            </div>
          </a>
        <?php } while ($row_rs_filmesIndicado = mysqli_fetch_assoc($rs_filmesIndicado)); ?>
      </div>
    </section>

    <section>
      <h2>Piores Avaliados</h2>
      <div class="series-row">
        <?php do { ?>
          <a href="midia.php?idMidia=<?php echo ($row_rs_filmesPior["idMidia"]); ?>" class="card-link">
            <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
              <h1><?php echo ($row_rs_filmesPior["nomeMidia"]); ?></h1>
              <p><?php echo ($row_rs_filmesPior["notaMedia"]); ?></p>
            </div>
          </a>
        <?php } while ($row_rs_filmesPior = mysqli_fetch_assoc($rs_filmesPior)); ?>
      </div>
    </section>

    <section>
      <h2>Mais Recentes</h2>
      <div class="series-row">
        <?php do { ?>
          <a href="midia.php?idMidia=<?php echo ($row_rs_filmesRecente["idMidia"]); ?>" class="card-link">
            <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
              <h1><?php echo ($row_rs_filmesRecente["nomeMidia"]); ?></h1>
              <p><?php echo ($row_rs_filmesRecente["notaMedia"]); ?></p>
            </div>
          </a>
        <?php } while ($row_rs_filmesRecente = mysqli_fetch_assoc($rs_filmesRecente)); ?>
      </div>
    </section>
  </main>
</body>

</html>