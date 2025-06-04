<?php require_once("conexaobd.php");?>

<?php
include("sessao_verifica.php");
$idUsuario = $_SESSION['idUsuario'];


$seriesMelhor = "SELECT * FROM tb_midia WHERE idTipo = 1 ORDER BY notaMedia DESC LIMIT 5";
$rs_seriesMelhor = mysqli_query($conn_bd_hf, $seriesMelhor) or die(mysqli_error($conn_bd_hf));
$linhas_seriesMelhor = mysqli_num_rows($rs_seriesMelhor);
$row_rs_seriesMelhor = mysqli_fetch_assoc($rs_seriesMelhor);


$seriesIndicado = "SELECT * FROM tb_midia WHERE idTipo = 1 ORDER BY visualizacao desc limit 5";
$rs_seriesIndicado   = mysqli_query($conn_bd_hf, $seriesIndicado ) or die($mysqli_error($conn_bd_hf));
$linhas_seriesIndicado   = mysqli_num_rows($rs_seriesIndicado);
$row_rs_seriesIndicado   = mysqli_fetch_assoc($rs_seriesIndicado );

$seriesPior = "SELECT * FROM tb_midia WHERE idTipo = 1 ORDER BY notaMedia asc limit 5";
$rs_seriesPior  = mysqli_query($conn_bd_hf, $seriesPior ) or die($mysqli_error($conn_bd_hf));
$linhas_seriesPior  = mysqli_num_rows($rs_seriesPior );
$row_rs_seriesPior  = mysqli_fetch_assoc($rs_seriesPior);

$seriesRecente = "SELECT * FROM tb_midia WHERE idTipo = 1 ORDER BY anoLancamento desc limit 5";
$rs_seriesRecente  = mysqli_query($conn_bd_hf, $seriesRecente ) or die($mysqli_error($conn_bd_hf));
$linhas_seriesRecente  = mysqli_num_rows($rs_seriesRecente );
$row_rs_seriesRecente  = mysqli_fetch_assoc($rs_seriesRecente);

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
     <a href="index.php">Início</a>
      <a href="series.php" class="active">Séries</a>
      <a href="filmes.php">Filmes</a>
      <a href="animes.php">Animes</a>
      <a href="desenhos.php">Desenhos</a>
    </nav>
    <div class="icons" style="display: flex; align-items: center;">
  
  <input type="text" placeholder="Pesquisar..." id="search-input" class="search-input" style="display: none;" />

  <button id="search-btn" style="background: none; border: none; cursor: pointer; margin-left: 10px;">
    <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M10 2a8 8 0 015.29 13.71l5 5a1 1 0 01-1.42 1.42l-5-5A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z"/>
    </svg>
  </button>

  <a href="perfil.php?idUsuario=<?php echo($idUsuario)?>" style="display: inline-block; margin-left: 15px;">
    <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
    </svg>
  </a>
</div>
<script>
  const searchBtn = document.getElementById('search-btn');
  const searchInput = document.getElementById('search-input');

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
    alert("Você pesquisou por: " + termo);
  }
</script>
  </header>

  <main>
    <h1>Séries</h1>
    <div class="genre-select">
      <label for="genre">Gênero</label>
      <select id="genre">
        <option value="all">Todos</option>
        <option value="acao">Ação</option>
        <option value="drama">Drama</option>
        <option value="comedia">Comédia</option>
      </select>
    </div>

    <section>
    <h2>Melhores Avaliados</h2>
      <div class="series-row">
        <?php do {?>
        <a href="midia.php?idMidia=<?php echo($row_rs_seriesMelhor["idMidia"]);?>" class="card-link">
        <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_seriesMelhor["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_seriesMelhor["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_seriesMelhor = mysqli_fetch_assoc($rs_seriesMelhor));?>
      </div>
    </section>

 <section>
      <h2>Indicados</h2>
      <div class="series-row">
      <?php do {?>
        <a href="midia.php?idMidia=<?php echo($row_rs_seriesPior["idMidia"]);?>" class="card-link">
          <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_seriesIndicado["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_seriesIndicado["notaMedia"]);?></p>
          </div>   
        </a>
      <?php } while($row_rs_seriesIndicado = mysqli_fetch_assoc($rs_seriesIndicado));?>
      </div>
    </section>

    <section>
      <h2>Piores Avaliados</h2>
      <div class="series-row">
        <?php do {?>
          <a href="midia.php?idMidia=<?php echo($row_rs_seriesPior["idMidia"]);?>" class="card-link">
          <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_seriesPior["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_seriesPior["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_seriesPior = mysqli_fetch_assoc($rs_seriesPior));?>
      </div>
    </section>

    <section>
      <h2>Mais Recentes</h2>
      <div class="series-row">
        <?php do {?>
        <a href="midia.php?idMidia=<?php echo($row_rs_seriesRecente["idMidia"]);?>" class="card-link">
        <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_seriesRecente["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_seriesRecente["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_seriesRecente = mysqli_fetch_assoc($rs_seriesRecente));?>
      </div>
    </section>
  </main>
</body>
</html>