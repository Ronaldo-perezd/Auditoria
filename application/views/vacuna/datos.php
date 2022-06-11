<?php  if($this->session->flashdata('error')):?>
<div class="alert alert-danger">
  <p><?php echo $this->session->flashdata('error') ?></p>
</div>
<?php  endif;?>


 <section class='content'>
     <div class='box box-primary'>
        <div class="box-header with-border">
              <h3 class="box-title">INFORME FABRICANTE VACUNAS</h3>
        </div>
         <div class='box-body'>
            <div class='row'>
                <div class='col-md-12'>
                    <table class='table table-bordered table-hover datatable'>
                        <thead>
                            <tr>
                                <th><p class="text-center">NOMBRE DEL FABRICANTE </p></th>
                                <th><p class="text-center">CANTIDAD VACUNADOS</p></th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php if(!empty($fabricante)):?>
                                <?php foreach($fabricante as $item): ?>
                                    <tr>
                                        <td><?php echo $item->FABRICANTE_VACUNA ?></td>
                                        <td><?php echo $item->CANTIDAD ?></td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
     </div>
 </section>

<section class='content'>
     <div class='box box-primary'>
        <div class="box-header with-border">
              <h3 class="box-title">INFORME TIPO DE PERSONA</h3>
        </div>
         <div class='box-body'>
            <div class='row'>
                <div class='col-md-12'>
                    <table class='table table-bordered table-hover datatable'>
                        <thead>
                            <tr>
                                <th><p class="text-center">TIPO DE PERSONA </p></th>
                                <th><p class="text-center">CANTIDAD</p></th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php if(!empty($persona)):?>
                                <?php foreach($persona as $item): ?>
                                    <tr>
                                        <td><?php echo $item->TIPO_USUARIO ?></td>
                                        <td><?php echo $item->CANTIDAD ?></td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
     </div>
</section>
<div class="text-center">
 <a href="<?php echo base_url();?>/home" class='btn btn-success btn-flat'> Regresar</a>
</div>