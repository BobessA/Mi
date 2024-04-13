<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-4 col-12-mobile" id="sidebar">
				<hr class="first" />
				<section>
					<div class="iframe-resp col-12">
						<video width="450" controls>
  							<source src="../../Images/commerical.mp4" type="video/mp4">
						</video>
					</div>
					<header>
						<h3><a href="#">További elérhetőségeink</a></h3>
					</header>
					<p>
						info@mi.hu
					</p>
					<p>
						+3690/404-000
					</p>
					<p>
						Városligeti-tó, Budapest, 1146
					</p>
					<div class="iframe-resp">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1309.0027099510164!2d19.080792446877204!3d47.514866990292056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1712783276534!5m2!1shu!2shu" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</section>
				<hr />
			</div>
			<div class="col-8 col-12-mobile" id="content">
				<article id="main">
					<header>
						<h2><a href="#">Kapcsolat</a></h2>
						<p>
							Tegye fel nekünk kérdését, vagy érdeklődjön utazásainkról.
						</p>
					</header>
					<form action = "?page=mail" method = "post">
						<fieldset>
							<br>
							<label>E-mail cím*<label>
							<input class="mail" type="text" name="email" placeholder="E-mail cím" required><br>
							<label>Telefonszám</label>
							<input class="mail" type="text" name="phone" placeholder="Telefonszám"><br>
                            <label>Tárgy*</label>
							<input class="mail" type="text" name="subject" placeholder="Tárgy" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ''; ?>" required><br>
                            <label>Üzenet*</label>
							<textarea class="mail" name="mailText" cols="40" rows="10" required></textarea><br>
							<input id="sendMailButton" type="submit" name="send" value="Küldés">
							<br>&nbsp;
						</fieldset>
					</form>
				</article>
			</div>
		</div>
		<hr />
	</div>
</div>
