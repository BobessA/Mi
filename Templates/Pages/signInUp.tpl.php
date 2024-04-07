<div class="wrapper style1">
	<div class="container">
		<div class="row gtr-200">
			<div class="col-8 col-12-mobile" id="content">
				<article id="main">
					<header>
						<h2>Bejelentkezés</h2>
						<p>
							Már regisztrált felhasználóként, jelentkezzen be. 
						</p>
					</header>
					<form action = "?page=login" method = "post">
						<fieldset>
							<legend>Bejelentkezés</legend>
							<br>
							<label>Felhasználónév</label>
							<input class="signIn" id="signInUserInput" type="text" name="user" placeholder="felhasználó" required><br>
							<label>Jelszó</label>
							<input class="signIn" id="signInPasswInput" type="password" name="passw" placeholder="jelszó" required><br>
							<input id="loginButton" type="submit" name="login" value="Belépés">
							<br>&nbsp;
						</fieldset>
					</form>
				</article>
			</div>
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
						<h2>Regisztráció</h2>
						<p>
							Regisztrációhoz a következő adatok kitöltése szükséges.
						</p>
					</header>
					<form action = "?page=registration" method = "post">
						<fieldset>
						<legend>Regisztráció</legend>
							<br>
								<label>Vezetéknév</label>
								<input class="signUp" type="text" name="lastName" placeholder="vezetéknév" required><br>
								<label>Keresztnév</label>
								<input class="signUp" type="text" name="firstName" placeholder="keresztnév" required><br>
								<label>Felhasználónév</label>
								<input class="signUp" id="signUpUserInput" type="text" name="user" placeholder="felhasználónév" required><br>
								<label>Jelszó</label>
								<input class="signUp" id="signUpPasswInput" type="password" name="passw" placeholder="jelszó" required><br>
								<input id="registrationButton"  type="submit" name="registration" value="Regisztráció">
							<br>&nbsp;
						</fieldset>
					</form>
					<section>
						<a href="#" class="image featured"><img src="images/pic06.jpg" alt="" /></a>
					</section>
				</article>
			</div>
		</div>
		<hr />
	</div>
</div>