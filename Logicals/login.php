<?php
if(isset($_POST['user']) && isset($_POST['passw'])) 
{
    //print ("<script>console.log('".$_POST['user']." ".$_POST['passw']."');</script>");
    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname=Mi', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        $comm = "select Id, FirstName, LastName, Passw from users where UserName = :user";
        $sth = $dbh->prepare($comm);
        $sth->execute(array(':user' => $_POST['user']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);

        if($row) 
        {
            if(password_verify($_POST['passw'], $row['Passw'])) 
            {
                $_SESSION['fn'] = $row['FirstName']; $_SESSION['ln'] = $row['LastName']; $_SESSION['login'] = $_POST['user']; $_SESSION['id'] = $row['Id'];
            } else
                $row = false;
        }
    }
    catch (PDOException $ex) 
    {
        $errormessage = "Hiba: ".$ex->getMessage();
    }      
} else 
{
    header("Location: .");
}
?>
