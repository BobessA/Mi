<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title['title'] ?></title>
	<link rel="stylesheet" href="./Styles/style.css" type="text/css">
	<?php if(file_exists('./Styles/'.$find['file'].'.css')) { ?><link rel="stylesheet" href="./Styles/<?= $find['file']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
		<img src="./Images/<?=$header['imagePath']?>" alt="<?=$header['imageDef']?>">
		<h1><?= $header['title'] ?></h1>
	</header>
    <footer>
        <?php if(isset($footer['Mi'])) { ?><?= $footer['Mi']; ?><?php } ?>
    </footer>
</body>
</html>
