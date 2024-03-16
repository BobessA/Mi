<?php session_start(); ?>
<?php if(file_exists('./Logicals/'.$find['file'].'.php')) { include("./Logicals/{$find['file']}.php"); } ?>
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
		<img id="headerImage" src="./Images/<?=$header['imagePath']?>" alt="<?=$header['imageDef']?>">
		<h1><?= $header['title'] ?></h1>
	</header>
    <div id="wrapper">
        <aside id="menu">
            <nav>
                <ul>
					<?php foreach ($pages as $url => $page) { ?>
						<?php if(! isset($_SESSION['login']) && $page['menun'][0] || isset($_SESSION['login']) && $page['menun'][1]) { ?>
							<li<?= (($page == $find) ? ' class="active"' : '') ?>>
							<a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
							<?= $page['texts'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
                </ul>
            </nav>
        </aside>
        <div id="content">
            <?php include("./Templates/Pages/{$find['file']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
        <?php if(isset($footer['Mi'])) { ?><?= $footer['Mi']; ?><?php } ?>
    </footer>
</body>
</html>
