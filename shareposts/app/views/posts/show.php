<?php require_once(APPROOT."/views/inc/header.php"); ?>
<a href="<?php echo URLROOT ?>/posts" class="mt-2 btn btn-light"><i class="fa fa-backward"></i> Back</a>

            <h1><?php echo $data['post']->title; ?></h1>
            <div class="bg-secondary text-white p-2 mb-3">
                Written By : <?php echo $data['user']->name; ?> on <?php echo $data['user']->created_at ?>
            </div>
            <p><?php echo $data['post']->body; ?></p>
            <?php if($data['post']->user_id==$_SESSION['user_id']) :  ?>
                <hr>
                <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id ?> "class="btn btn-dark">Edit</a>
               
                <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
                <?php endif; ?>
    
 
<?php require_once(APPROOT."/views/inc/footer.php"); ?>

