<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mediabox Burundi">

	<title>TTS Burundi</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>template/css/modern.css">
	<link rel="icon" type="image/x-icon" href="<?= base_url();?>template/img/favicon.png">
<style>
body {
	color: #fff;
	background-image: url(<?= base_url();?>assets/img/vlcsnap-2015-02-13-17h13m30s39.png);
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	font-family: 'Roboto', sans-serif;
}

.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}

.form-control:focus {
	border-color: #5cb85c;
}

.form-control, .btn {
	border-radius: 3px;
}

.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}

.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}

.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}

.signup-form h2:before {
	left: 0;
}

.signup-form h2:after {
	right: 0;
}

.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}

.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	padding: 30px;
}

.signup-form .form-group {
	margin-bottom: 20px;
}

.signup-form input[type="checkbox"] {
	margin-top: 3px;
}

.signup-form .btn {
	font-size: 16px;
	font-weight: bold;
	min-width: 140px;
	outline: none !important;
}

.signup-form .row div:first-child {
	padding-right: 10px;
}

.signup-form .row div:last-child {
	padding-left: 10px;
}

.signup-form a {
	color: #fff;
	text-decoration: underline;
}

.signup-form a:hover {
	text-decoration: none;
}

.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}

.signup-form form a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
<div class="container pt-4">
	<div class="signup-form">
    <form style="box-shadow: rgba(100, 100, 111, 0.25) 0px 7px 29px 0px; background: white" action="<?=base_url()?>Login/do_login" method="post">

    	
  <div style="margin-top: -60px" class="text-center mb-2">
    	<img width="100px" src="<?= base_url();?>assets/img/logo.png">
    </div>

	<?=$message?>



        	<p class="font-weight-bold text-uppercase text-dark text-center">Connexion</p>
        <div class="form-group">
        	<input type="text" class="form-control" name="EMAIL" placeholder="Email">
        	<?php echo form_error('EMAIL', '<div class="text-danger">', '</div>'); ?> 
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="PASSWORD" placeholder="Mot de passe">

             <?php echo form_error('PASSWORD', '<div class="text-danger">', '</div>'); ?>
        </div>
	<!-- 	<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmer mot de passe" required="required">
        </div>   -->
      <!--   <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div> -->
		<div class="form-group">
            <button style="background: #153d77; color: white" type="submit" class="btn btn-btn-lg btn-block">Se connecter</button>
            <div class="text-center my-2 "><a href="<?=base_url("/Login/forgotten_pwd")?>" class="text-primary">Mot de passe oublié?</a></div>
        </div>
    </form>
</div>
</div>




<footer class="footer">
				<div class="container-fluid">
					<div class="row d-flex text-dark justify-content-center">
						<p class="mb-2 text-center">Tous droits réservés &copy; TTS Burundi <script>document.write(new Date().getFullYear());</script> - Conçu par <a style="font-weight: bold; text-decoration: none" href="mediabox.bi">TTS Burundi </a>
							</p>
						</div>
					</div>
				</div>
	</footer>


</body>
</html>
