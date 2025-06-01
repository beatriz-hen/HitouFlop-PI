<?php require_once("conexaobd.php");?>

<?php

$filmesMelhor = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY notaMedia desc limit 5";
$rs_filmesMelhor  = mysqli_query($conn_bd_hf, $filmesMelhor ) or die($mysqli_error($conn_bd_hf));
$linhas_filmesMelhor  = mysqli_num_rows($rs_filmesMelhor );
$row_rs_filmesMelhor  = mysqli_fetch_assoc($rs_filmesMelhor);

$filmesIndicado = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY visualizacao desc limit 5";
$rs_filmesIndicado   = mysqli_query($conn_bd_hf, $filmesIndicado ) or die($mysqli_error($conn_bd_hf));
$linhas_filmesIndicado   = mysqli_num_rows($rs_filmesIndicado);
$row_rs_filmesIndicado   = mysqli_fetch_assoc($rs_filmesIndicado );

$filmesPior = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY notaMedia asc limit 5";
$rs_filmesPior  = mysqli_query($conn_bd_hf, $filmesPior ) or die($mysqli_error($conn_bd_hf));
$linhas_filmesPior  = mysqli_num_rows($rs_filmesPior );
$row_rs_filmesPior  = mysqli_fetch_assoc($rs_filmesPior);

$filmesRecente = "SELECT * FROM tb_midia WHERE idTipo = 4 ORDER BY anoLancamento desc limit 5";
$rs_filmesRecente  = mysqli_query($conn_bd_hf, $filmesRecente ) or die($mysqli_error($conn_bd_hf));
$linhas_filmesRecente  = mysqli_num_rows($rs_filmesRecente );
$row_rs_filmesRecente  = mysqli_fetch_assoc($rs_filmesRecente);

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
      <a href="index.html">Início</a>
      <a href="series.html">Séries</a>
      <a href="filmes.html" class="active">Filmes</a>
      <a href="animes.html">Animes</a>
      <a href="desenhos.html">Desenhos</a>
    </nav>
    <div class="icons" style="display: flex; align-items: center;">
  
  <input type="text" placeholder="Pesquisar..." id="search-input" class="search-input" style="display: none;" />

  <button id="search-btn" style="background: none; border: none; cursor: pointer; margin-left: 10px;">
    <svg width="24" height="24" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M10 2a8 8 0 015.29 13.71l5 5a1 1 0 01-1.42 1.42l-5-5A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z"/>
    </svg>
  </button>

  <a href="perfil.html" style="display: inline-block; margin-left: 15px;">
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
    <h1>Filmes</h1>
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
        <a href="midia.html?idMidia=<?php echo($row_rs_filmesMelhor["idMidia"]);?>" class="card-link">
        <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_filmesMelhor["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_filmesMelhor["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_filmesMelhor = mysqli_fetch_assoc($rs_filmesMelhor));?>
      </div>
    </section>

    <section>
      <h2>Indicados</h2>
      <div class="series-row">
      <?php do {?>
        <a href="midia.html?id=1" class="card-link">
          <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_filmesIndicado["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_filmesIndicado["notaMedia"]);?></p>
          </div>   
        </a>
      <?php } while($row_rs_filmesIndicado = mysqli_fetch_assoc($rs_filmesIndicado));?>
      </div>
    </section>

    <section>
      <h2>Piores Avaliados</h2>
      <div class="series-row">
        <?php do {?>
          <a href="midia.html?idMidia=<?php echo($row_rs_filmesPior["idMidia"]);?>" class="card-link">
          <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_filmesPior["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_filmesPior["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_filmesPior = mysqli_fetch_assoc($rs_filmesPior));?>
      </div>
    </section>

    <section>
      <h2>Mais Recentes</h2>
      <div class="series-row">
        <?php do {?>
        <a href="midia.html?idMidia=<?php echo($row_rs_filmesRecente["idMidia"]);?>" class="card-link">
        <div class="card" style="background-image: url('imagens/capas/filme1.jpg');">
          <h1><?php echo($row_rs_filmesRecente["nomeMidia"]);?></h1>
          <p><?php echo($row_rs_filmesRecente["notaMedia"]);?></p>
          </div>
        </a>
        <?php } while($row_rs_filmesRecente = mysqli_fetch_assoc($rs_filmesRecente));?>
      </div>
    </section>
  </main>
</body>
</html>
