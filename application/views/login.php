<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Login Admin </title>

	<!-- Bootstrap -->
	<link href="<?= config_item('base_theme')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= config_item('base_theme')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= config_item('base_theme')?>vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- Animate.css -->
	<link href="<?= config_item('base_theme')?>vendors/animate.css/animate.min.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= config_item('base_theme')?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="" method="post" name="fl" id="f_login" onsubmit="return login();">
						<h1>Login Form</h1>
						<div>
							<input type="text" class="form-control" name="username" placeholder="Username" required="" />
						</div>
						<div>
							<input type="password" class="form-control" name="password" placeholder="Password" required="" />
						</div>
						<div>
							<button type="submit" class="btn btn-default">Log in</button>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<div id="konfirmasi"></div>
							<div>
								<h1><i class="fa fa-at"></i> Maps Student</h1>
								<p>©2020 All Rights Reserved. Student UUI!</p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>

	<script src="<?= config_item('base_theme')?>vendors/jquery/dist/jquery.min.js"></script>

	<script type="text/javascript">
		var base_url = "<?= config_item('config_base_url')?>";

		function login(e) {
			e = e || window.event;
			var data 	= $('#f_login').serialize();
			$("#konfirmasi").html("<div class='alert alert-info'><i class='fa fa-refresh'></i> Checking...</div>")
			$.ajax({
				type: "POST",
				data: data,
				dataType: "json",
				cache: false,
				url: base_url+"logins/cek_login",
				success: function(response){
					if(response.status == 0){
						$("#konfirmasi").html(response.keterangan);
					} else {
						$("#konfirmasi").html(response.keterangan);
						window.location.assign(base_url); 
					}
				}
			});
			return false;
		}

	</script>

</body>
</html>
