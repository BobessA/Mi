

<div class="wrapper style1">
    <article id="main" class="container special">
        <hr class="first" />
            <section>
                <?php if(isset($message)) { ?>
                    <h1><?= $message ?></h1>
                    <?php if($again) { ?>
                        <header>
                            <h3>Sikertelen regisztráció.</h3>
                        </header>
                        <p>
                            <a href="?page=signUp">Próbálja újra!</a>            
                        </p>
                    <?php } ?>
                <?php } ?>
            </section>
        <hr />
    </article>
</div>