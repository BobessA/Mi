<div class="wrapper style1">
	<article id="main" class="container special">
		<a href="#" class="image featured"></a>
		<header>
			<h3>Üzenetek</h3>
		</header>
		<p>
			Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
			posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
			sit arcu sociis.
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
                    echo "<table border='1'>
                        <thead>
                            <tr>
                                <th>Felhasználó</th>
                                <th>Tárgy</th>
                                <th>Üzenet</th>
                                <th>E-mail cím</th>
                                <th>Dátum</th>
                            </tr>
                        </thead>";
                
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["UserName"] . "</td>";
                        echo "<td>" . $row["Subject"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>" . $row["Mail"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "</tr>";
                    }        

                    echo "</table>";
                } else {
                    echo "Nincs találat az adatbázisban.";
                }
                $conn->close(); 
            ?>
	</article>
</div>