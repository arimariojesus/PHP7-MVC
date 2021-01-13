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
      <?php
        require_once(APP.'/Views/posts/showImage.php');
        $showImage = new ShowImage();
      ?>
      <?php foreach ($data['posts'] as $post) : ?>
      <?php $image = $showImage->show($post->postID, $post->userID) ?>

        <div class="card mb-3">
          <img src="data:<?=$image['type']?>;base64,<?=base64_encode($image['content'])?>" class="card-img-top" />
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