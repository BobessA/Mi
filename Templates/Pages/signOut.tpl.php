<div class="wrapper style1">
    <article id="main" class="container special">
        <?php
            $data = $_SESSION;
            unset($_SESSION["ln"]);
            unset($_SESSION["fn"]);
            unset($_SESSION["login"]);
        ?>
        <hr class="first" />
            <section>
                <header>
                    <h3>Sikeresen kijelentkezett</h3>
                </header>
                <p>
                    Az oldal hamarosan visszatér a kezdőlapra.             
                </p>
            </section>
        <hr />
    </article>
    <script>
        setTimeout(function() {
            window.location.href = ".";
        }, 2000);
</script>
</div>