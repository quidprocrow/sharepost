<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
        <i class="fa fa-pencil-alt"></i>
        Add Post
      </a>
    </div>
    <?php flash('post_message'); ?>
  </div>

  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
      </div>
      <p class-"card-text"><?php echo $post->body; ?></p>

      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId;?>" class="btn btn-warning">More</a>

    </div>


  <?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
