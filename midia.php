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
      <a href="index.html">Início</a>
      <a href="series.html">Séries</a>
      <a href="filmes.html">Filmes</a>
      <a href="animes.html">Animes</a>
      <a href="desenhos.html">Desenhos</a>
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
        <div class="avaliacao">★★★★★☆☆☆☆☆</div>
        <div class="info">
          <p><strong>Faixa Etária:</strong> Lorem ipsum</p>
          <p><strong>Episódios:</strong> x episódios</p>
          <p><strong>Data de lançamento:</strong> x de lorem de xxxx (<a href="#" style="color:#ffcb14;">Brasil</a>)</p>
        </div>
      </div>

      <div class="descricao">
        <p><strong>Sinopse:</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur esse id
          repudiandae laboriosam corrupti magni, praesentium odio vero qui ex debitis sed nisi quis quo tenetur vitae?
          Dicta, vitae accusamus.</p>

        <textarea placeholder="Faça sua avaliação."></textarea>

        <div class="avaliacao dinamica">
          <span class="estrela" data-valor="1">★</span>
          <span class="estrela" data-valor="2">★</span>
          <span class="estrela" data-valor="3">★</span>
          <span class="estrela" data-valor="4">★</span>
          <span class="estrela" data-valor="5">★</span>
          <span class="estrela" data-valor="6">★</span>
          <span class="estrela" data-valor="7">★</span>
          <span class="estrela" data-valor="8">★</span>
          <span class="estrela" data-valor="9">★</span>
          <span class="estrela" data-valor="10">★</span>
        </div>

        <button>Enviar</button>

        <div class="comentarios-section">
          <h3>Comentários Recentes</h3>
          <section class="slider">
            <input type="radio" name="slide" id="s1" checked />
            <input type="radio" name="slide" id="s2" />
            <input type="radio" name="slide" id="s3" />

            <div class="slider-content">
              <div class="slider-item">
                <div class="comentario">
                  <div class="usuario">👤 Nome de usuário</div>
                  <p>Comentário 1</p>
                  <div class="estrela">★★★★★★☆☆☆☆</div>
                  <div class="data">Data</div>
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