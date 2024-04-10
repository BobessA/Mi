<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-4 col-12-mobile" id="sidebar">
				<hr class="first" />
				<section>
					<header>
						<h3><a href="#">Accumsan sed penatibus</a></h3>
					</header>
					<p>
						Dolor sed fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
						porttitor phasellus tempus cubilia ultrices tempor sagittis  tellus ante diam nec penatibus dolor cras
						magna tempus feugiat veroeros.
					</p>
					<footer>
						<a href="#" class="button">Learn More</a>
					</footer>
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
							<input class="mail" type="text" name="subject" placeholder="Tárgy" required><br>
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