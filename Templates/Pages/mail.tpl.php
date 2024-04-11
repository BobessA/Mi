<div class="wrapper style1">
	<article id="main" class="container special">
		<a href="#" class="image featured"></a>
        <?php if(isset($message)) { ?>
            <header>
            <?php if($sent = 1) { ?>
                <h3>Köszönjük, hamarosan válaszolunk levelére.</h3>
            <?php } else { ?>
                <h3>Problémába ütköztünk az üzenet elküldése közben.</h3>
            <?php } ?>
            </header>
            <p>
                <?php if($sent = 1) { ?>
                    <?php echo "Üzenetének azonosítója: {$message}";?><br><br>
                    <?php
                        $conn = new mysqli($dbConnection['host'],$dbConnection['user'],$dbConnection['passw'],$dbConnection['dbName']);
                        if ($conn->connect_error) {
                            die("Adatbázis kapcsolati hiba!" . $conn->connect_error);
                        }
                        $sql = "select Subject, MessageText, Timestamp, UserMail from messages where MessageId= $message";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <strong>Üzenet tárgya: </strong><?php echo $row['Subject'] ?><br>
                                <strong>E-mail: </strong>
                                <p class="mailText">
                                    <?php echo $row['MessageText'] ?>
                                </p>
                                <strong>Feladó: </strong><?php echo $row['UserMail'] ?><br>
                                <strong>Küldés időpontja: </strong><?php echo $row['Timestamp'] ?>
                            <?php }
                        } 
                        $conn->close(); 
                    ?>
                <?php } else { ?>
                    <?php echo $message ?><br>
                    <a href="?page=contact" >Próbálja újra!</a>             
                <?php } ?>
            </p>
        <?php } ?>
	</article>
</div>