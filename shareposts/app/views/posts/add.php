<?php require_once(APPROOT."/views/inc/header.php"); ?>


        <a href="<?php echo URLROOT ?>/posts" class="mt-2 btn btn-light"><i class="fa fa-backward"></i> Back</a>
        <div class="card card-body bg-light mt-5 ">
           <?php    flash('post_message', 'Post Updated Successfully'); ?>
            <h2 class="d-flex justify-content-center">Add Post</h2>
             <p>Create what is in your mind</p>
                <form action="<?php echo URLROOT?>/posts/add" class="form" method="POST">
                  
                <div class="form-group mb-3">
                        <label for="title" class="title pb-2">Title :<sup>*</sup></label>
                        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err']))
                         ? 'is-invalid' : '' ; ?>" value="<?php echo $data['title']; ?>">
                         <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="body" class=" pb-2">Body :<sup>*</sup></label>
                            <textarea  name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err']))
                                ? 'is-invalid' : '' ; ?>"><?php echo $data['body']; ?> </textarea>
                                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                    </div>
                    <input type="submit" value="submit"  class="btn btn-success ">
                 
                </form>
        </div>
  

<?php require_once(APPROOT."/views/inc/footer.php"); ?>

