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
      <p class="card-footer text-center"><small class="text-muted">Escrito por: <strong><?=$data['user']->name?></strong> em <?= Date::formatDate($data['post']->created_in) ?></small></p>
    </div>

    <?php if($data['post']->user_id == $_SESSION['user_id']): ?>
      <ul class="list-inline text-center">
        <li class="list-inline-item">
          <a href="<?= URL.'/posts/edit/'.$data['post']->id?>" class="btn btn-sm btn-secondary">Editar</a>
        </li>
        <li class="list-inline-item">
          <form action="<?= URL.'/posts/delete/'.$data['post']->id?>" method="POST">
            <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
          </form>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</div>