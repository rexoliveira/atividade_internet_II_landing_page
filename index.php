<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />

    <script src="scripts/mascaras.js" async></script>

    <title>Landing Page</title>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          
          <a href="consulta.php">
            <li>Consulta</li>
          </a>
        </ul>
      </nav>
      <section>
        <img src="image/favicon.png" alt="imagem-tecnologia" />
        <h1>Receba as novidades em tecnologia</h1>
      </section>
    </header>

    <main>
      <form id="form_cadastro" action="processa.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required minlength="4" maxlength="40"/>

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="sobrenome" required minlength="4" maxlength="60" />

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required/>

        <label for="tel">Celular</label>
        <!-- Não permite letras//Permite formatação padrão -->
        <input
          type="text"
          id="telefone"
          name="tel"
          onkeypress="mask(this, mphone);"
          onblur="mask(this, mphone);"
          th:value="${usuario.telefone}"
          placeholder="(00) 00000-0000"
          required
          
        />

        <label for="preferencias"> Conteúdos preferidos</label>

        <div class="check">
          <input type="checkbox" id="nerd" name="nerd" />
          <label for="nerd">Mundo Nerd</label>
        </div>

        <div class="check">
          <input type="checkbox" id="amanha" name="tecn" />
          <label for="tecn">Tecnologias do Amanhã</label>
        </div>

        <div class="check">
          <input type="checkbox" id="meta" name="meta" />
          <label for="meta">Metaverso</label>
        </div>

        <label for="textarea"
          >Escreva abaixo as linguagens que você se indentifica</label
        >
        <textarea
          id="linguagem"
          name="textarea"
          cols="10"
          rows="3"
          wrap="hard"
          autocorrect="off"
        ></textarea>

        <input class="botao" type="submit" name="button_enviar" value="Enviar" />
        <input class="botao" type="submit" name="button_limpar" value="Limpar" />
      </form>
    </main>

    <footer></footer>
  </body>
</html>
