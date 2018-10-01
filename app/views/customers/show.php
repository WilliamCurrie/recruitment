<?php require APP_ROOT . "/views/inc/header.php"; ?>

<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

<h1><?php echo formatNames($data["user"]->first_name,$data["user"]->last_name);?></h1>

<div class="bg-secondary text-white p-2 mb-3">
    <p> Address: <?php echo $data["user"]->address; ?></p>
    <p> Twitter: <?php echo $data["user"]->twitter_alias; ?></p>

</div>



<?php require APP_ROOT . "/views/inc/footer.php"; ?>
