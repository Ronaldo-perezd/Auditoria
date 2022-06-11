<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ingresar Persona</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a><b>Registro De Datos</b></a>
      </div>
      <form action="<?php echo base_url(); ?>IngresarDatos/RegistrarUser" method="post">
        <div class="login-box-body">
          <p class="login-box-msg">Ingresa Los Datos De Tu Carnet</p>
          <div class='form-group has-feedback <?php echo !empty(form_error('username'))? 'has-error':''; ?>'>
            <input type='text' placeholder="Nombre Y Apellido" class='form-control' id='username' name='username' value='<?php echo set_value('username') ?>'>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('username', '<span class="help-block">', '</span>'); ?>
          </div>
          <div class='form-group has-feedback <?php echo !empty(form_error('cedula'))? 'has-error':''; ?>'>
            <input type='text'  placeholder="Documento De Identidad" class='form-control' id='cedula' name='cedula' value='<?php echo set_value('cedula') ?>'>
            <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
            <?php echo form_error('cedula', '<span class="help-block">', '</span>'); ?>
          </div>
           <tr>Fecha De Nacimiento</tr>
          <div class='form-group has-feedback <?php echo !empty(form_error('fecha_Nac'))? 'has-error':''; ?>'>           
            <input type='date'  placeholder="Fecha De Nacimiento" class='form-control' id='fecha_Nac' name='fecha_Nac' value='<?php echo set_value('fecha_Nac') ?>'>
           <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            <?php echo form_error('fecha_Nac', '<span class="help-block">', '</span>'); ?>
          </div>
          
            <tr>Sede De Residencia Uptc</tr>
          
          <div class='form-group has-feedback <?php echo !empty(form_error('ciudad_Usu'))? 'has-error':''; ?>'>
            <select class="form-control" placeholder="Sede De Residencia Uptc" class='form-control' id='ciudad_Usu' name='ciudad_Usu' value='<?php echo set_value('ciudad_Usu') ?>' >
              <option></option>  
              <option>Duitama</option>
              <option>Sogamoso</option>
              <option>Tunja</option>
              <option>Chiquinquira</option>
              <option>Aguazul</option>
            </select>
            
            <?php echo form_error('ciudad_Usu', '<span class="help-block">', '</span>'); ?>
          </div>
          <tr>Seleccione Cargo</tr>
          <div class='form-group has-feedback <?php echo !empty(form_error('cargo'))? 'has-error':''; ?>'>
            <select class="form-control" id='cargo' name='cargo' value='<?php echo set_value('cargo') ?>' >
              <option></option>  
              <option>Estudiante</option>
              <option>Docente</option>
              <option>Administrativo</option>
              <option>Graduado</option>
            </select>
            <?php echo form_error('cargo', '<span class="help-block">', '</span>'); ?>
          </div>
          <div>
          </div>
          <div class='form-group has-feedback <?php echo !empty(form_error('ips_Usu'))? 'has-error':''; ?>'>
            <input type='text'  placeholder="IPS" class='form-control' id='ips_Usu' name='ips_Usu' value='<?php echo set_value('ips_Usu') ?>'>
            <span class="glyphicon glyphicon-tint form-control-feedback"></span>
            <?php echo form_error('ips_Usu', '<span class="help-block">', '</span>'); ?>
          </div>
          <div class='form-group has-feedback <?php echo !empty(form_error('ciudad_vacu'))? 'has-error':''; ?>'>
            <input type='text'  placeholder="Lugar De Vacunacion" class='form-control' id='ciudad_vacu' name='ciudad_vacu' value='<?php echo set_value('ciudad_vacu') ?>'>
            <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            <?php echo form_error('ciudad_vacu', '<span class="help-block">', '</span>'); ?>
          </div>
          <tr>Fabricante Vacuna</tr>
          <div class='form-group has-feedback <?php echo !empty(form_error('fabricante_Vacu'))? 'has-error':''; ?>'>
            <select class="form-control" placeholder="Fabricante Vacuna" class='form-control' id='fabricante_Vacu' name='fabricante_Vacu' value='<?php echo set_value('fabricante_Vacu') ?>'>
              <option></option> 
              <option>Pfizer</option>
              <option>AstraZeneca</option>
              <option>Janssen</option>
              <option>Moderna</option>
              <option>Sinovac</option>
            </select>
            <?php echo form_error('fabricante_Vacu', '<span class="help-block">', '</span>'); ?>
          </div>
          
          <div class='form-group has-feedback <?php echo !empty(form_error('nombre_Vacu'))? 'has-error':''; ?>'>
            <input type='text'  placeholder="Nombre Del Vacunador" class='form-control' id='nombre_Vacu' name='nombre_Vacu' value='<?php echo set_value('nombre_Vacu') ?>'>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo form_error('nombre_Vacu', '<span class="help-block">', '</span>'); ?>
          </div>
          <div class="row">
            <div class="col-xs-12 text-center">
              <button type="submit" id ="Guardar" class="btn btn-info btn-flat">Guardar</button>
              <a href="<?php echo base_url();?>/IngresarDatos/GetInformation" class='btn btn-success btn-flat'>Ver Reporte</a>
              <a href="<?php echo base_url();?>/home" class='btn btn-danger btn-flat'> Regresar</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>