<?php  if($this->session->flashdata('error')):?>
<div class="alert alert-danger">
  <p><?php echo $this->session->flashdata('error') ?></p>
</div>
<?php  endif;?>


  <p class="login-box-msg">Cambiar Contraseña</p>
<form action="<?php echo base_url(); ?>crearUsuario/CambiarContrasena" method="post">
      <!-- <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo electrónico" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>-->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Contraseña Actual" name="passwordAnt">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nueva Contraseña" name="passwordNew">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Confirmar Contraseña" name="passwordConf">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">CAMBIAR CONTRASEÑA</button>
        </div>
      </div>
</form> 
    