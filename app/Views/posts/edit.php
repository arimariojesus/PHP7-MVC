<div class="col-md-8 mx-auto p-5">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h3>Editar post</h3>
    </div>
    <div class="card-body bg-light">
      
      <form action="<?= URL ?>/posts/edit/<?= $data['id'] ?>" name="login" method="POST" class="mt-4" enctype="multipart/form-data">
        <div class="form-group mb-3">
          <label for="thumbnail" class="form-label">Imagem de visualização</label>
          <input class="form-control <?= !empty($data['thumbnail_error']) ? 'is-invalid' : '' ?>" type="file" id="thumbnail" name="thumbnail">
          <div class="invalid-feedback">
            <?= $data['thumbnail_error'] ?>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="title" class="form-label">Título: <sup class="text-danger">*</sup></label>
          <input type="text" name="title" id="title" value="<?=$data['title']?>" class="form-control <?= !empty($data['title_error']) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $data['title_error'] ?>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="text" class="form-label">Texto: <sup class="text-danger">*</sup></label>
          <textarea name="text" id="text" class="form-control <?= !empty($data['text_error']) ? 'is-invalid' : '' ?>" rows="5"><?=$data['text']?></textarea>
          <div class="invalid-feedback">
            <?= $data['text_error'] ?>
          </div>
        </div>

        <div class="d-grid">
          <input type="submit" value="Atualizar Post" class="btn btn-primary btn-block">
        </div>
      </form>
    </div>
  </div>
</div>