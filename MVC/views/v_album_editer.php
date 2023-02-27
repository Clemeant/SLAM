<?php include("inc/header.php"); ?>

<form action="<?= $action ?>" method="post">
<?php $value= isset($album) ? $album['nomAlb'] : ""; ?>
    <input type="text" name="nomAlb" value="<?= $value ?>">
    <input type="submit" value="<?= $titre ?>">
</form>


<?php include("inc/footer.php"); ?>