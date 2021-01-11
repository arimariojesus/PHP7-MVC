<div class="col-md-8 mx-auto p-5">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
      <li class="breadcrumb-item active" aria-current="page">Escrever post</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h3>Escrever post</h3>
    </div>
    <div class="card-body bg-light">
      
      <form action="<?= URL ?>/posts/register" name="login" method="POST" class="mt-4">
        <!-- <div class="mb-3">
          <label for="formFile" class="form-label">Imagem de visualização</label>
          <input class="form-control" type="file" id="formFile">
        </div> -->

        <div class="form-group">
          <label for="title" class="form-label">Título: <sup class="text-danger">*</sup></label>
          <input type="text" name="title" id="title" value="<?=$data['title']?>"class="form-control <?= !empty($data['title_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['title_error'] ?>
          </div>
        </div>

        <div class="form-group">
          <label for="text" class="form-label">Texto: <sup class="text-danger">*</sup></label>
          <textarea name="text" id="text" class="form-control <?= !empty($data['text_error']) ? 'is-invalid' : '' ?>" rows="5"><?=$data['text']?></textarea>
          <div class="invalid-feedback">
            <?= $data['text_error'] ?>
          </div>
        </div>

        <div class="d-grid mt-3">
          <input type="submit" value="Postar" class="btn btn-primary btn-block">
        </div>
      </form>
    </div>
  </div>
</div>