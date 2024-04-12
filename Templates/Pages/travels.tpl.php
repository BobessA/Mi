
<div class="homepage is-preload">
<?php

//$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$conn = new mysqli($dbConnection['host'],$dbConnection['user'],$dbConnection['passw'],$dbConnection['dbName']); 
// Ellenőrizzük a kapcsolatot
if ($conn->connect_error) {
    die("Hiba az adatbázishoz való kapcsolódás során: " . $conn->connect_error);
}
 
// Példa lekérdezés
$sql = "SELECT * FROM `trips` LEFT JOIN images ON images.TripId=trips.TripId";
$result = $conn->query($sql);
 
// Ellenőrizzük, hogy vannak-e eredmények
echo "<div class=\"wrapper style1\">
	<div class=\"container\">";
echo "<h1 class=\"trip-title\">Jelenleg elérhető all inclusive utazásaink.</h1>";
if ($result->num_rows > 0) {
    // Kiírjuk az adatokat
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"row gtr-200\">
                <div class=\"col-12 col-12-mobile\" id=\"content\">";
        echo "<article>";
        if (!empty($row["Path"])) {
            echo "<a href='#' class='image featured'><img src='".$row['Path']."' alt='.$row[Country].' /></a>";
        }
        echo "<header>";
        echo "<h3><a href='#'>".$row['Country']." ".$row['City']." ".$row['Address']."</a></h3>";
        echo "</header>";
        echo "<p>".$row['Content']."</p>";
        echo "<div class=\"iframe-resp\"><p>".$row['Map']."</p></div>";
        echo "<div class=\"row\">
        <div class=\"col-flex-4 col-12-mobile\"><h3><strong>".$row['Price']." Ft/Fő</strong></h3></div>
        <div class=\"col-4 col-12-mobile\" id=\"content\">
                <form class=\"travel_form\" action = \"/?page=contact&title=".$row['Country']." ".$row['City']."\" method = \"post\">
                    <button class=\"button\" type=\"submit\"><i class=\"fas fa-plane-departure\"></i></i> Ajánlatkérés</button>
                </form>
            </div>
	    </div>
        </div>";
        echo "</article>";
        echo "
            </div>
            <hr/>";
    }
    echo "</div>
    </div>";
} else {
    echo "Nincs találat az adatbázisban.";
}
// Bezárjuk az adatbázis kapcsolatot <a href=\"/?page=contact\" class=\"button\"><i class=\"fas fa-plane-departure\"></i></i> Ajánlatkérés</a>
$conn->close();
?>

</div>
