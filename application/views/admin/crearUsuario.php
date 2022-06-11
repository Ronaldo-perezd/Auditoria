<?php  if($this->session->flashdata('error')):?>
<div class="alert alert-danger">
  <p><?php echo $this->session->flashdata('error') ?></p>
</div>
<?php  endif;?>
<title>Ingresar Persona</title>
<!-- ******************************************************************************************** -->
<!-- ******************************************************************************************** -->
<section class='content'>
    <div class='box box-solid'>
        <div class='box-body'>
            <div class='row'>
                <div class='col-md-12'>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' arial-hidden='true'>
                                &times;
                            </button>
                            <p><i class='icon fa fa-ban'></i><?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>


                    <form action='<?php echo base_url()?>crearUsuario/almacenarUsuario' method='POST'>

                        
                        <!-- <div class='form-group'> <label>Ingresar los datos del año <?php echo date("Y")-3;?></label></div> -->
                        <div class='form-group col-md-6 <?php echo !empty(form_error('user'))? 'has-error':''; ?>'>
                            <label for='user'>Nombre Del Usuario:</label>
                            <input type='email' placeholder="Correo Electrónico" class='form-control' id='user' name='user' value='<?php echo set_value('user') ?>'>
                            <?php echo form_error('user', '<span class="help-block">', '</span>'); ?>

                        </div>

                        <div class='form-group col-md-6 <?php echo !empty(form_error('contrasena'))? 'has-error':''; ?>'>
                            <label for='contrasena'>Contraseña:</label>
                            <input type='text' placeholder="Contraseña" class='form-control' id='contrasena' name='contrasena' value='<?php echo set_value('contrasena') ?>'>
                            <?php echo form_error('contrasena', '<span class="help-block">', '</span>'); ?>
                        </div>
                       
                        <div class='form-group  col-md-12'>
                            <button type='submit' class='btn btn-success btn-flat'>CREAR USUARIO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ******************************************************************************************** -->
<section class='content'>
    <div class='box box-primary'>
        <div class="box-header with-border">
              <h3 class="box-title">USUARIOS CREADOS</h3>
        </div>
        <div class='box-body'>
            <div class='row'>
                <div class='col-md-12'>
                    <table class='table table-bordered table-hover datatable'>
                        <thead>
                            <tr>
                                <th><p class="text-center">ID</p></th>
                                    <th><p class="text-center">Nombre Usuario</p></th>
                                <th><p class="text-center">Contraseña</p></th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php if(!empty($usuario)):?>
                                <?php foreach($usuario as $item): ?>
                                    <tr>                                        
                                        <td><?php echo $item->ID ?></td>
                                        <td><?php echo $item->documento_IT ?></td>
                                        <td><?php echo $item->contrasena ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-xs-12 text-center">
        <a href="<?php echo base_url();?>/home" class='btn btn-danger tn-flat'> Regresar</a>
    </div>
</div>