<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema de Cobros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Inicio de Sesión</h3>
                    <form method="POST" action="/auth.autenticar">	
                        @csrf
	                    <div class="input-group mb-4">
	                        <input type="text" name="tx_usuario" class="form-control" placeholder="Usuario" required>
	                    </div>
	                    <div class="input-group mb-4">
	                        <input type="password" name="tx_clave" class="form-control" placeholder="Clave" required>
	                    </div>
	                    <div class="form-group text-left">
	                        <div class="checkbox checkbox-fill d-inline">
	                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
	                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
	                        </div>
	                    </div>
                    <button class="btn btn-primary mb-12">Iniciar Sesión</button>
                    <p class="mb-2 text-muted">¿Olvido su contraseña? <a href="/auth.recuperar">Clíc aquí para reestablecer</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
