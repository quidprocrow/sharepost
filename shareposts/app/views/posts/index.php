<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
        <i class="fa fa-pencil-alt"></i>
        Add Post
      </a>
    </div>
  </div>

  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
      </div>
    </div>


  <?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
