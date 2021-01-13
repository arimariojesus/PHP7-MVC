<div class="container my-5">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$data['post']->title?></li>
    </ol>
  </nav>

  <div class="card">
    <img src="data:<?=$data['post']->thumbnail_type?>;base64,<?=base64_encode($data['post']->thumbnail)?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$data['post']->title?></h5>
      <p class="card-text"><?=$data['post']->text?></p>
      <p class="card-text"><small class="text-muted">Escrito por: <strong><?=$data['user']->name?></strong> em <?= Date::formatDate($data['post']->created_in) ?></small></p>
    </div>
  </div>
</div>