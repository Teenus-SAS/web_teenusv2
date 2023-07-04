<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/admin/assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="/admin/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/admin/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/admin/assets/css/app.css" rel="stylesheet">
	<link href="/admin/assets/css/icons.css" rel="stylesheet">
	<title>Teenus - Olvido Contraseña</title>
	<!-- Notifications -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>

<body class="bg-forgot">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="page-content">
			<div class="authentication-forgot d-flex align-items-center justify-content-center">
				<div class="card forgot-box">
					<div class="card-body">
						<div class="p-4 rounded  border">
							<div class="text-center">
								<img src="/admin/assets/images/icons/forgot-2.png" width="120" alt="" />
							</div>
							<h4 class="mt-5 font-weight-bold">Restablecer Contraseña</h4>
							<p class="text-muted">Ingrese su dirección de email y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.</p>
							<div class="my-4">
								<label class="form-label">Email</label>
								<input type="text" id="email" class="form-control form-control-lg" placeholder="example@user.com" />
							</div>
							<div class="d-grid gap-2">
								<button type="button" id="btnForgotPass" class="btn btn-primary btn-lg">Enviar</button> <a href="/admin" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Volver al Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/admin/assets/js/jquery.min.js"></script>

	<script src="/admin/js/login/forgot-password.js"></script>

	<!-- Notifications -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>