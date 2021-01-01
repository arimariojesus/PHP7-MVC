<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-body">
      <h2>Cadastre-se</h2>
      <small>Preencha o formulário abaixo para fazer seu cadastro</small>

      <form action="" name="register" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nome: <sup class="text-danger">*</sup></label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail: <sup class="text-danger">*</sup></label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        </div>

        <div class="row">
          <div class="col d-grid">
            <input type="submit" value="Cadastrar" class="btn btn-primary">
          </div>
          <div class="col">
            <a href="#">Você tem uma conta? Faça login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>