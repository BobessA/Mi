<div class="wrapper style1">
    <article id="main" class="container special">
        <?php
            $data = $_SESSION;
            unset($_SESSION["ln"]);
            unset($_SESSION["fn"]);
            unset($_SESSION["login"]);
            unset($_SESSION["id"]);
        ?>
            <section>
                <header>
                    <h3>Sikeresen kijelentkezett</h3>
                </header>
                <p>
                    Az oldal hamarosan visszatér a kezdőlapra.             
                </p>
            </section>
    </article>
    <script>
        setTimeout(function() {
            window.location.href = ".";
        }, 2000);
</script>
</div>