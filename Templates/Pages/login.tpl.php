<div class="wrapper style1">
    <article id="main" class="container special">
        <hr class="first" />
            <section>
            <?php if(isset($row)) { ?>
            <?php if($row) { ?>
                <?php header("Location: .") ?>
                <?php } else { ?>
                <header>
                    <h3>A bejelentkezés sikertelen!</h3>
                </header>
                <p>
                    <a href="?page=signIn" >Próbálja újra!</a>             
                </p>
                <?php } ?>
            <?php } ?>
            <?php if(isset($errormessage)) { ?>
                <header>
                    <h3><?= $errormessage ?></h3>
                </header>
                <p>
                    <a href="?page=signIn" >Próbálja újra!</a>             
                </p>
            <?php } ?>
            </section>
        <hr />
    </article>
</div>