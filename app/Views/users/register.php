<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header">
      <h3>Cadastre-se</h3>
    </div>
    <div class="card-body">
      <p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer seu cadastro</small></p>

      <form action="<?= URL ?>/users/register" name="register" method="POST" class="mt-4">
        <div class="form-group">
          <label for="name" class="form-label">Nome: <sup class="text-danger">*</sup></label>
          <input type="text" name="name" id="name" class="form-control" value="<?=$data['name']?>" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">E-mail: <sup class="text-danger">*</sup></label>
          <input type="email" name="email" id="email" class="form-control" value="<?=$data['email']?>" required>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="password" id="password" class="form-control" value="<?=$data['password']?>" required>
        </div>
        <div class="form-group">
          <label for="confirm_password" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?= $data['confirm_password']?>" required>
        </div>

        <div class="row mt-3">
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