<?php require_once(APPROOT."/views/inc/header.php"); ?>
<div class="row">
    <div class="col-md-6 mx-auto" >
        <div class="card card-body bg-light mt-5 ">
            <h2 class="d-flex justify-content-center">Create an account</h2>
             <p>Please fillout this form to register with us</p>
                <form action="<?php echo URLROOT?>/users/register" class="form" method="POST">
                    <div class="form-group mb-3">
                        <label for="" class="name pb-2">Name :<sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err']))
                             ? 'is-invalid' :'' ; ?>" value="<?php echo $data['name']; ?>">
                             <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="email pb-2">Email :<sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']))
                         ? 'is-invalid' : '' ; ?>" value="<?php echo $data['email']; ?>">
                         <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="password pb-2">password :<sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))
                             ? 'is-invalid' : '' ; ?>" value="<?php echo $data['password']; ?>">
                             <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="confirm_password pb-2">confirm password :<sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err']))
                             ? 'is-invalid' : '' ; ?>" value="<?php echo $data['confirm_password']; ?>">
                             <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                    <div class="row ">
                        <div class="col ">
                            <input type="submit" value="Register" class="btn btn-success btn-block  ">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light btm-block">Alreay have an accoutn ? Login</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php require_once(APPROOT."/views/inc/footer.php"); ?>
