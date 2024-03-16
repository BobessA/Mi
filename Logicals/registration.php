<?php
if(isset($_POST['user']) && isset($_POST['passw']) && isset($_POST['lastName']) && isset($_POST['firstName'])) 
{
    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname=Mi', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        if ($dbh) {
            print ("<script>console.log('A kapcsolat létrejött');</script>");
        } else {
            print ("<script>console.log('A kapcsolat nem jött létre');</script>");
        }

        $comm = "select Id from users where UserName = :user";
        $sth = $dbh->prepare($comm);
        $sth->execute(array(':user' => $_POST['user']));

        if($row = $sth->fetch(PDO::FETCH_ASSOC)) 
        {
            $message = "A felhasználónév már létezik!";
            $again = "true";
        } else 
        {
            $comm = "insert into users (Id, FirstName, LastName, UserName, Passw)
                          values(0, :firstName, :lastName, :user, :passw)";
            $stmt = $dbh->prepare($comm); 
            $stmt->execute(array(':firstName' => $_POST['firstName'], ':lastName' => $_POST['lastName'],
                                 ':user' => $_POST['user'], ':passw' => password_hash($_POST['passw'], PASSWORD_DEFAULT))); 
                                 
            if($count = $stmt->rowCount()) 
            {
                $newid = $dbh->lastInsertId();
                $message = "Sikeres regisztráció.<br>";                     
                $again = false;
            } else 
            {
                $message = "A regisztráció sikertelen.";
                $again = true;
            }
        }
        print ("<script>console.log('".$message."');</script>");
    } catch (PDOException $ex) 
    {
        $uzenet = "Hiba: ".$ex->getMessage();
        print ("<script>console.log('".$uzenet."');</script>");
        $again = true;
    }      
} else 
{
    header("Location: .");
}
?>