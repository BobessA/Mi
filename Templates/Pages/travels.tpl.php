
<div class="homepage is-preload">
<?php

//$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$conn = new mysqli($dbConnection['host'],$dbConnection['user'],$dbConnection['passw'],$dbConnection['dbName']); 
// Ellenőrizzük a kapcsolatot
if ($conn->connect_error) {
    die("Hiba az adatbázishoz való kapcsolódás során: " . $conn->connect_error);
}
 
// Példa lekérdezés
$sql = "SELECT * FROM trips where TripId=1";
$result = $conn->query($sql);
 
// Ellenőrizzük, hogy vannak-e eredmények
if ($result->num_rows > 0) {
    // Kiírjuk az adatokat
    echo "<div class=\"wrapper style1\">
	<div class=\"container\">
		<div class=\"row gtr-200\">
            <div class=\"col-8 col-12-mobile\" id=\"content\">";
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<a href='#' class='image featured'><img src='images/{".$row['TripId']."}' alt='' /></a>";
        echo "<header>";
        echo "<h3><a href='#'>{".$row['Country']." ".$row['City']." ".$row['Address']."}</a></h3>";
        echo "</header>";
        echo "<p>{".$row['Content']."}</p>";
        echo "</article>";
    }
    echo "
    </div>
    <div class=\"col-4 col-12-mobile\" id=\"content\">
        <a href=\"/?page=contact\" class=\"button\"><i class=\"fas fa-plane-departure\"></i></i> Ajánlatkérés</a>
    </div>
	</div>
    </div>
    </div>";
} else {
    echo "Nincs találat az adatbázisban.";
}
// Bezárjuk az adatbázis kapcsolatot
$conn->close();
?>

</div>
