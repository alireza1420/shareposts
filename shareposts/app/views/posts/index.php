<?php require_once(APPROOT."/views/inc/header.php"); ?>

<div class="row mt-4 ">
<?php Flash('post_message') ?>
    <div class="col-md-6">
        <h1 class="h1">posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT ?>/posts/add" class="btn btn-primary pull-right">
            <i   class=" fa fa-pencil "> Add Post</i>
        </a>
    </div>
</div>
<?php
    foreach($data['posts'] as $posts):
    ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $posts->title; ?></h4>
        <div class="bg-light p-2 mb-3">Written by : <?php echo $posts->name ?> On <?php echo $posts->postCreated; ?></div>
        <p class="card-text"><?php if(strlen($posts->body)>200){
            echo substr($posts->body,0,120).' ...';
        }else{
            echo $posts->body;
        } ?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $posts->postId; ?>" class="btn btn-dark">More</a>
    </div>

    <?php endforeach; ?>
<?php require_once(APPROOT."/views/inc/footer.php"); ?>