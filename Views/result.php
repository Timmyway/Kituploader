<?php include(ROOT.'/Views/header.php'); ?>

<div class="container">
    <h2>Your KIT<h2>
    <textarea 
        class="form-control result-area" 
        rows="15" cols="50"
    > 
        <?= $built_kit ?>
    </textarea>
</div>

<?php include(ROOT.'/Views/footer.php'); ?>