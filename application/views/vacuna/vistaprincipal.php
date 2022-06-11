<!DOCTYPE html>
<html lang="en"> 
	<head>
		<title>Mi Vacuna UPTC</title>
                <meta charset="UTF-8">
                <meta name="viwport" content="width=device=width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">         
                <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
				<link rel="stylesheet" href="<?php echo base_url();?>/css/main.css">
	</head>	
	<body>
		<div class="container panel-heading text-center">
			<div class="cabecera">
				<img src="assets/dist/img/cabecera.png">
			</div>
			<div>
				<h2  align="center">Bienvenidos Al Registro <br> De Mi Vacuna UPTC<br>
						<!--//A continuación podrás registrar datos de tu carnet--> 
				</h2>
			</div>
		</div>

        <div class="container">
         	<div class="video">
				<!--<video src="<?php echo base_url();?>/Videos&img/chu.mp4" autoplay loop 
	    		</video>--> 	
			</div>
			<div class="text-center">
				<table style="width: 30%" border="2" align="center" class="table table-hover" style="color:#000000">		
					<tr>
						<td><a style="color:#000000" href="<?php echo base_url();?>/home/formulario"> Ingresar Datos</a>
						</td>
					</tr>
					<tr>
						<td><a style="color:#000000" href="<?php echo base_url();?>/IngresarDatos/GetInformation">Ver Reporte</a>
						</td>
					</tr>
					<tr>
						<td><a style="color:#000000" href="<?php echo base_url();?>/crearUsuario/GetUsers">Usuarios</a>
						</td>
					</tr>
						<caption align="bottom" style="color:#000000">¡VACUNATE SI QUIERES VOLVER A LA U!</caption>	
				</table>
			</div>
        </div>
        <div class="container panel-heading text-center">
				<button style="background-color:#7E4A4A; border-color:#641309" class="btn btn-warning" class="text-center"> 
					<a style="color:#FFFFFF"  href="<?php echo base_url();?>Login/Logout">Cerrar Sesion</a>
				</button>
		</div>
	</body>
</html>