<?php  if($this->session->flashdata('error')):?>
<div class="alert alert-danger">
  <p><?php echo $this->session->flashdata('error') ?></p>
</div>
<?php  endif;?>


  <p class="login-box-msg">Autenticate para iniciar Sesión</p>
<form action="<?php echo base_url(); ?>Login/Auth" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo electrónico" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
      </div>
</form>
<br><label> No posee una cuenta?</label>
    <a href="<?php echo base_url(); ?>Login/Register" class="text-center">Registrarse</a> 
</br>    
    