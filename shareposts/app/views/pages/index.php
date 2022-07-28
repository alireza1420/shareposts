<?php require_once(APPROOT."/views/inc/header.php"); ?>
<?php require_once(APPROOT."/views/inc/footer.php"); ?>
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      
        <span class="fs-4"><?php echo $data['postname']; ?></span>
      </a>
    </header>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?php echo $data['title']; ?></h1>
        <p class="col-md-8 fs-4"><?php echo $data['desc'] ?> , You can share thoughts , ideas and pictures and enjoy others people shared activities.</p>
         <a href="<?php echo URLROOT ?>/users/register"><button class="btn btn-primary btn-lg" type="button" >Sign-up Now</button></a>
         <a href="https://github.com/alireza1420/Alireza_MVC_Framework"><button class="btn btn-danger btn-lg" type="button" >Check out the Framework</button></a>
      </div>
    </div>

