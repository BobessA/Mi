<?php if(isset($message)) { ?>
    <h1><?= $message ?></h1>
    <?php if($again) { ?>
        <a href="?page=registration">Próbálja újra!</a>
    <?php } ?>
<?php } ?>