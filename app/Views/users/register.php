<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h3>Cadastre-se</h3>
    </div>
    <div class="card-body">
      <p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer seu cadastro</small></p>

      <form action="<?= URL ?>/users/register" name="register" method="POST" class="mt-4">
        <div class="form-group">
          <label for="name" class="form-label">Nome: <sup class="text-danger">*</sup></label>
          <input type="text" name="name" id="name" value="<?=$data['name']?>" class="form-control <?= !empty($data['name_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['name_error'] ?>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email: <sup class="text-danger">*</sup></label>
          <input type="text" name="email" id="email" value="<?=$data['email']?>"class="form-control <?= !empty($data['email_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['email_error'] ?>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="password" id="password" value="<?=$data['password']?>"class="form-control <?= !empty($data['password_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['password_error'] ?>
          </div>
        </div>
        <div class="form-group">
          <label for="confirm_password" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="confirm_password" id="confirm_password" value="<?= $data['confirm_password']?>" class="form-control <?= !empty($data['confirm_password_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['confirm_password_error'] ?>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6 d-grid">
            <input type="submit" value="Cadastrar" class="btn btn-primary">
          </div>
          <div class="col-md-6">
            <a href="<?= URL ?>/users/login">Você tem uma conta? Faça login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>