
<div class="homepage is-preload">
<?php
// Kapcsolódás az adatbázishoz
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'Mi';
 
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
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
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<a href='#' class='image featured'><img src='images/{".$row['TripId']."}' alt='' /></a>";
        echo "<header>";
        echo "<h3><a href='#'>{".$row['Country']." ".$row['City']." ".$row['Address']."}</a></h3>";
        echo "</header>";
        echo "<p>{".$row['Content']."}</p>";
        echo "</article>";
    }
} else {
    echo "Nincs találat az adatbázisban.";
}
// Bezárjuk az adatbázis kapcsolatot
$conn->close();
?>

</div>
