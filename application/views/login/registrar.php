<?php  if($this->session->flashdata('error')):?>
<div class="alert alert-danger">
  <p><?php echo $this->session->flashdata('error') ?></p>
</div>
<?php  endif;?>

<p class="login-box-msg">Registro de Usuario</p>

<form action="<?php echo base_url(); ?>Login/Registrar" method="post">

  <div class='form-group has-feedback <?php echo !empty(form_error('user'))? 'has-error':''; ?>'>
    <input type='email' placeholder="Correo electrónico" class='form-control' id='user' name='user' value='<?php echo set_value('user') ?>'>
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
    <?php echo form_error('user', '<span class="help-block">', '</span>'); ?>
  </div>

  <div class='form-group has-feedback <?php echo !empty(form_error('pass'))? 'has-error':''; ?>'>
    <input type='text'  placeholder="contraseña" class='form-control' id='pass' name='pass' value='<?php echo set_value('pass') ?>'>
    <span class="glyphicon glyphicon-check form-control-feedback"></span>
    <?php echo form_error('pass', '<span class="help-block">', '</span>'); ?>
  </div>
  
  <div class="row <?php echo !empty(form_error('politica'))? 'has-error':''; ?>">
    <div class="col-xs-12">
      <button type="submit" id ="registrar" class="btn btn-primary btn-block btn-flat">Registrar</button>
      <a href="<?php echo base_url();?>" class='btn btn-success btn-block btn-flat'> Regresar</a>
    </div>
  </div>
</form>
