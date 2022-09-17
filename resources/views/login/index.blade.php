<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login & Register Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset("style/loginstyle.css") }}" />
    </head>
	<body>
		<div class="container" id="container">
			<div class="form-container sign-up-container">
				<form action="" method="post">
					<h1>Sign Up</h1>
					<div class="social-container">
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-facebook"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-google"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-linkedin"></em></a>
					</div>
					<span>Form Registration</span>
					<input type="text" name="username" placeholder="Username" required/>
					<input type="email" name="email" placeholder="Email" required/>
					<input type="password" name="password" placeholder="Password" required/>
					@if (session()->has("loginError")) 
						<p class="message-error">{{ session("loginError") }}</p>
					@endif
					<button type="submit">SignUp</button>
				</form>
			</div>
			<div class="form-container sign-in-container">
				<form action="{{ route("login.store") }}" method="post">
					@csrf
					<h1>Sign In</h1>
					<div class="social-container">
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-facebook"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-google"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-linkedin"></em></a>
					</div>
					<span>Form Login</span>
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					@if (session()->has("loginError")) 
						<p class="message-error">{{ session("loginError") }}</p>
					@endif
					<a style="cursor: pointer;" onclick="alert('Test')">Forgot Your Password</a>
					<button type="submit">Sign In</button>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Tips</h1>
						<p>Gunakan lah email yang valid, agar bisa digunakan pada fitur forget password. Buatlah username yang mudah diingat dan tanpa menggunakan spasi, buatlah password dengan kombinasi angka dan huruf agar sulit ditebak</p>
						<button class="ghost" id="signIn">Sign In</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Tips</h1>
						<p>Jangan beritahukan data pribadi anda, termasuk username dan password saat menggunakan semua sistem informasi</p>
						<button class="ghost" id="signUp">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="{{ asset("script/loginscript.js") }}"></script>
	</body>
</html>