<header class="bg-dark">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">UnSet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" data-tookit="tooltip" title="Página Inicial" href="<?=URL?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toolkit="tooltip" title="Sobre nós" href="<?=URL?>/pages/about">Sobre nós</a>
            </li>
          </ul>
          <?php if(isset($_SESSION['user_id'])): ?>
            <span class="navbar-text">
              <span>Olá <?= $_SESSION['user_name'] ?>, seja bem vindo!</span>
              <a class="btn btn-sm btn-danger ms-2" href="<?= URL ?>/users/exit">Sair</a>
            </span>
          <?php else: ?>
            <span class="navbar-text">
              <a class="btn btn-primary" href="<?= URL ?>/users/register" data-tookit="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
              <a class="btn btn-primary" href="<?= URL ?>/users/login" data-tookit="tooltip" title="Tem uma conta? Faça login">Entrar</a>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
</header>