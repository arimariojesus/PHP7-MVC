<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h3>Login</h3>
    </div>
    <div class="card-body">
      <p class="card-text"><small class="text-muted">Informe seus dados para fazer login</small></p>

      <div class="<?= empty($data['fail']) ? 'd-none' : 'alert alert-danger' ?>">
        <?=!empty($data['fail_message']) ? $data['fail_message'] : ''?>
      </div>

      <form action="<?= URL ?>/users/login" name="login" method="POST" class="mt-4">
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

        <div class="row mt-3">
          <div class="col-md-6 d-grid">
            <input type="submit" value="Login" class="btn btn-primary">
          </div>
          <div class="col-md-6">
            <a href="<?=URL?>/users/register">Não tem uma conta? Cadastre-se</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>