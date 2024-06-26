<div class="blur"></div>
<div class="wrapper style1">
	<article id="main" class="container special">
		<a href="#" class="image featured"></a>
		<header>
			<h3>Üzenetek</h3>
		</header>
		<p>
		</p>
        
        <?php
                $conn = new mysqli($dbConnection['host'],$dbConnection['user'],$dbConnection['passw'],$dbConnection['dbName']);
                if ($conn->connect_error) {
                    die("Adatbázis kapcsolati hiba!" . $conn->connect_error);
                }
                $sql = "
                    SELECT 
                        case when UserId=0 then 'Vendég' 
                             else (select CONCAT(lastName,' ',FirstName) from users where id=UserId)
                             end as UserName,
                        Subject,
                        Left(MessageText,512) as message,
                        UserMail as Mail,
                        Timestamp as Date
                    FROM 
                        messages
                    Order by 
                        MessageId desc;";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table border='1' id=\"messages_table\">
                        <thead>
                            <tr>
                                <th>Felhasználó</th>
                                <th>Tárgy</th>
                                <th>Üzenet</th>
                                <th>E-mail cím</th>
                                <th>Dátum</th>
                            </tr>
                        </thead>";
                        echo "<tbody>";
                    while($row = $result->fetch_assoc()) {                        
                        echo "<tr>";
                        echo "<td>" . $row["UserName"] . "</td>";
                        echo "<td>" . $row["Subject"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>" . $row["Mail"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "</tr>";
                    } 
                    echo "</tbody>";
                    echo "</table>";
                    echo "
                        <div id=\"messages_modal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\">
                            <div class=\"content\">
                                <div class=row>
                                <span class=\"close col-12\">&times;</span>
                                    <div class=\"col-6\">
                                        <p>Felhasználó: </p>
                                        <input type=\"text\" name=\"userName\" readonly>
                                    </div>
                                    <div class=\"col-6\">
                                        <p>Tárgy: </p>
                                        <input type=\"text\" name=\"sub\" readonly>
                                    </div>
                                        <div class=\"col-12\">
                                        <p>Üzenet: </p>
                                        <textarea class=\"messageTxt\" readonly></textarea>
                                    </div>
                                    <div class=\"col-6\">
                                        <p>E-mail cím: </p>
                                        <input type=\"text\" name=\"mail\" readonly>
                                    </div>
                                    <div class=\"col-6\">
                                        <p>Dátum: </p>
                                        <input type=\"text\" name=\"date\" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>";
                } else {
                    echo "Nincs találat az adatbázisban.";
                }
                $conn->close(); 
            ?>
	</article>
</div>