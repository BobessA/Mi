<?php
    //szerver oldali ellenőrzés 
    $re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    if (!isset($_POST['email']) || !preg_match($re, $_POST['email'])) {
        echo "<script>alert('Érvénytelen formátumú e-mail cím.');"; 
        echo "window.location = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }
    if (!isset($_POST['subject']) || strlen($_POST['subject']) < 3) {
        echo "<script>alert('Hibás e-mail cím.');"; 
        echo "window.location = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }
    if (!isset($_POST['mailText']) || empty($_POST['mailText'])) {
        echo "<script>alert('Üzenet nélkül nem küldhető e-mail.');"; 
        echo "window.location = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }
?>

<?php
    if (isset($_POST['email']) && isset($_POST['mailText'])) {

        $dbh = new PDO('mysql:host=localhost;dbname=Mi', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        if ($dbh) {
            print ("<script>console.log('A kapcsolat létrejött');</script>");
        } else {
            print ("<script>console.log('A kapcsolat nem jött létre');</script>");
        }

        // beszúrás
        $sqlInsert = "insert into messages(UserId, Subject, MessageText, UserMail, UserPhone)
                        values(:id, :subject, :mailText, :email, :phone )";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->execute(array(
            ':id' => isset($_SESSION["id"]) ? $_SESSION["id"] : 0,
            ':subject' => $_POST['subject'],
            ':mailText' => $_POST['mailText'],
            ':email' => $_POST['email'],
            ':phone' => isset($_POST['phone']) ? $_POST['phone'] : null
        )); 
        if ($count = $stmt->rowCount()) {
            $newid = $dbh->lastInsertId();
            $message = "{$newid}";
            $sent = 1;
        } else {
            $message = "Az üzenet elküldése sikertelen, Kérjük próbálja meg újra!";
            $sent = 0;
        }
    } 
?>