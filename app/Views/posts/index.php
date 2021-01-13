<div class="container py-5">

  <?= Session::message('post') ?>

  <div class="card">
    <div class="card-header bg-secondary text-white">
      POSTAGENS
      <div class="float-end">
        <a href="<?= URL ?>/posts/register" class="btn btn-light">Postar</a>
      </div>
    </div>
    <div class="card-body">
      <?php foreach ($data['posts'] as $post) : ?>

        <div class="card mb-3">
          <img src="data:<?=$post->thumbnailType?>;base64,<?=base64_encode($post->thumbnailContent)?>" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text"><?= $post->text ?></p>
            <a href="#" class="btn btn-outline-primary">Ler mais...</a>
          </div>
          <div class="card-footer text-muted">
            Escrito por: <strong><?= $post->name ?></strong> em <?= Date::formatDate($post->postDateCreated) ?>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>

</div>