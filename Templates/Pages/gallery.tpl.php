<?php
    $messages="";
    if (!isset($_SESSION['login']))
    {
        $messages = 'Nincs bejelentkezve';
        print ("<script>console.log('".$messages."');</script>");
    }  elseif (isset($_POST['kuld'])) {
        print ("<script>console.log('jó helyen');</script>");
        if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
            if ($_FILES["fileToUpload"]['error'] == 4) {
                $messages = " Nem választott ki feltöltendő fájlt: ";
            } elseif (!in_array($_FILES["fileToUpload"]['type'], $MediaTypes)) {
                $messages = " Nem megfelelő típus: " . $_FILES["fileToUpload"]['name'];
            } elseif (
                $_FILES["fileToUpload"]['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                or $_FILES["fileToUpload"]['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                or $_FILES["fileToUpload"]['size'] > $MaxSize
                ) {
                    $messages = " Túl nagy állomány: " . $_FILES["fileToUpload"]['name'];
            } else {
                $vegsohely = $Folder . strtolower($_FILES["fileToUpload"]['name']);
                if (file_exists($vegsohely))
                    $messages = " Már létezik: " . $_FILES["fileToUpload"]['name'];
                else {
                    move_uploaded_file($_FILES["fileToUpload"]['tmp_name'], $vegsohely);
                    $messages = ' Ok: ' . $_FILES["fileToUpload"]['name'];
                    $success = 1;
                }
            }
        }
        if (!isset($success)) {
            exit("A képfeltöltés sikertelen " . $messages);
        }
    } else {
        print ("<script>console.log('else ágon vagyunk');</script>");
        print ("<script>console.log('".$messages."');</script>");    
    }

    $olvaso = opendir($Folder);
    while (($file = readdir($olvaso)) !== false)
        if (is_file($Folder . $file)) {
            $vege = strtolower(substr($file, strlen($file) - 4));
            if (in_array($vege, $FileExtension))
                $images[$file] = filemtime($Folder . $file);
        }
    closedir($olvaso);
?>

<style type="text/css">
    div#galeria {
        margin: 0 auto;
    }

    div.kep {
        display: inline-block;
    }

    div.kep img {
        width: 200px;
    }
</style>

<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-4 col-12-mobile" id="sidebar">
				<hr class="first" />
				<section>
					<header>
                        <?php print ("<script>console.log('".$messages."');</script>");  ?>
                        <h3><?php if (!empty($messages)) { ?>
                                <?php if ($messages="Nincs bejelentkezve") { ?>
                                            <a href="?page=signInUp">A képfefeltöltéshez előbb jelentkezzen be.</a>
                                        <?php } else { ?>
                                            <?php echo $messages ?>
                                        <?php }
                                } else { ?>
                                Töltse fel a megosztani kívánt képeket.
                            <?php } ?>
                        <h3><br>
					</header>
                    <form action="?page=gallery" method="post" enctype="multipart/form-data">
                        Kép:<br>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fas fa-cloud-upload-alt"></i> Fájl kiválasztása
                        </label>
                        <input id="file-upload" type="file" name="fileToUpload" style="display: none;" />
                        <br><br>
                        <input type="submit" name="kuld">
                    </form>
				</section>
				<hr />
			</div>
			<div class="col-8 col-12-mobile" id="content">
				<article id="main">
					<header>
						<h2><a href="#">Galéria</a></h2>
						<p>
							Elégedett ügyfeleink nyaralásukról készített képei
						</p>
					</header>
					<div id="galeria">
                        <h1>Galéria</h1>
                        <?php
                        arsort($images);
                        foreach ($images as $file => $datum) {
                        ?>
                        <div class="kep">
                            <a href="<?php echo $Folder . $file ?>">
                                <img src="<?php echo $Folder . $file ?>">
                            </a>
                            <p>Név: <?php echo $file; ?></p>
                            <p><?php echo date($Date, $datum); ?></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
				</article>
			</div>
		</div>
		<hr />
	</div>
</div>