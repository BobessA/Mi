<?php session_start(); ?>
<?php if(file_exists('./Logicals/'.$find['file'].'.php')) { include("./Logicals/{$find['file']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title['title'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="./Styles/css/main.css" />
	<noscript><link rel="stylesheet" href="./Styles/css/noscript.css" /></noscript>
	<?php if(file_exists('./Styles/'.$find['file'].'.css')) { ?><link rel="stylesheet" href="./Styles/<?= $find['file']?>.css" type="text/css"><?php } ?>
</head>
<body class="right-sidebar is-preload">
	<div id="page-wrapper">
		<header id="main-header">
			<div class="header-content">
				<h1 class="header-title"><?= $header['title'] ?></h1>
				<?php if(isset($_SESSION['login'])) { ?>
					<div class="user-info">Bejlentkezve: <strong><?= $_SESSION['ln']." ".$_SESSION['fn']." (".$_SESSION['login'].")" ?></strong>
					</div>
				<?php } ?>
			</div>		
		</header>
		<div id="header">
        	<aside id="menu">
            		<nav id="nav">
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
		</div>

        <div id="content">
            <?php include("./Templates/Pages/{$find['file']}.tpl.php"); ?>
        </div>

		<!-- Footer -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<section class="col-4 col-12-mobile">
						<header>
							<h2 class="icon solid fa-users circled"><span class="label">Posts</span></h2>
						</header>
						<ul class="divided">
							<li>
								<article class="post stub">
									<header>
										<h3>Sándor Adrián</a></h3>
									</header>
									<span>GMGCIY</span>
								</article>
							</li>
							<li>
								<article class="post stub">
									<header>
										<h3>Kaszás Viktor</a></h3>
									</header>
									<span>W8A1QH</span>
								</article>
							</li>
							<li>
								<article class="post stub">
									<header>
										<h3>Magyarosi Andor Máté</a></h3>
									</header>
									<span>ZYCMC6</span>
								</article>
							</li>
						</ul>
					</section>
				<!-- Photos -->
					<section class="col-4 col-12-mobile">
						<header>
							<h2 class="icon solid fa-camera circled"><span class="label">Photos</span></h2>
						</header>
						<div class="row gtr-25">
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/dubaj.jpg" alt="" /></a>
							</div>
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/japan.jpg" alt="" /></a>
							</div>
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/mallorca.jpg" alt="" /></a>
							</div>
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/malta.jpg" alt="" /></a>
							</div>
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/newyork.jpg" alt="" /></a>
							</div>
							<div class="col-6">
								<a href="/?page=gallery" class="image fit"><img src="../../Images/parizs.jpg" alt="" /></a>
							</div>
						</div>
					</section>
					<section class="col-4 col-12-mobile">
						<header>
							<h2 class="icon solid fa-comment circled"><span class="label">Tweets</span></h2>
						</header>
						<header>
					<p>
						info@mi.hu<br>
						+3690/404-000<br>
						Városligeti-tó, Budapest, 1146
					</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1309.0027099510164!2d19.080792446877204!3d47.514866990292056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1712783276534!5m2!1shu!2shu" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							<h3>Közösségi felületeink</h3>
							<p>Az alábbi oldalakon is megtalálhatnak.</p>
						</header>
						
						<ul class="icons">
							<li><a href="https://www.facebook.com/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://hu.linkedin.com/" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li>
							<li><a href="https://github.com/BobessA/Mi/tree/main" class="icon brands fa-github"><span class="label">Github</span></a></li>
						</ul>
					</section>
				</div>
				<hr />
				<div class="row">
				<div class="col-12">
					<!-- Copyright -->
					<div class="copyright">
						<ul class="menu">
							<li>&copy; Mi projekt. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
		<!-- Scripts -->
		<script src="Logicals/js/jquery.min.js"></script>
		<script src="Logicals/js/jquery.dropotron.min.js"></script>
		<script src="Logicals/js/jquery.scrolly.min.js"></script>
		<script src="Logicals/js/jquery.scrollex.min.js"></script>
		<script src="Logicals/js/browser.min.js"></script>
		<script src="Logicals/js/breakpoints.min.js"></script>
		<script src="Logicals/js/util.js"></script>
		<script src="Logicals/js/main.js"></script>
		<script src="Logicals/js/ownLogics.js" type="module" ></script>
</body>
</html>
