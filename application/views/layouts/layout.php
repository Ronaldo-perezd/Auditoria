<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INFORME - <?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
    <style>
      tr.group,
      tr.group:hover {
          background-color: #3c8dbc !important;
          text-align: center;
          color: #fff;
      }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.css" integrity="sha256-kalgQ55Pfy9YBkT+4yYYd5N8Iobe+iWeBuzP7LjVO0o=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.js" integrity="sha256-fDwvQrKJpfuKYDyKNMrj/lpWEreN4N7ziGeZMPbZBkw=" crossorigin="anonymous"></script>


  </head>
  <body> <!-- se adiciona  la clase sidebar-collapse-->
  


      

      <!-- Main content -->
      <section class="content" id='contenido'>
        <!-- PAGE CONTENT BEGINS -->
        <?php  if($this->session->flashdata('error')):?>
          <div class="alert alert-danger">
            <p><?php echo $this->session->flashdata('error') ?></p>
          </div>
        <?php  endif;?>
          <?php echo $contents;?> <!-- ESTA ES LA VARIABLE QUE MUESTRA LA VISTA - EYSM-->
        <!-- PAGE CONTENT ENDS -->
      </section>
      <!-- /.content -->
    





  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    var base_url = "<?php echo base_url(); ?>";

    $(".btn-view").on("click", function(){
      var id = $(this).val();
      $.ajax({
        url: base_url + "<?php echo $subtitle; ?>/ver/" + id,
        type: "POST",
        success: function(resp)
        {
          $("#modal-default .modal-body").html();
          $("#modal-default .modal-body").html(resp);
        }
      });
    });
      $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(document).ready(function(){
    $('.datatable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    })
      });
  </script>
  <script>
      $(document).ready(function() {
        var groupColumn = 1;
        var table = $('#group-table').DataTable({
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "order": [[ groupColumn, 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
    
                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="7"><b>'+group+'</b></td></tr>'
                        );
    
                        last = group;
                    }
                } );
            }
        } );
  
        // Order by the grouping
        $('#group-table tbody').on( 'click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                table.order( [ groupColumn, 'desc' ] ).draw();
            }
            else {
                table.order( [ groupColumn, 'asc' ] ).draw();
            }
        } );
    } );
  </script>
  <script>
      $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [
                { "visible": false, "targets": 1 }
            ],
            "order": [[ 1, 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                var subTotal = new Array();
                var groupID = -1;
                var aData = new Array();
                var index = 0;
                
                api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                  
                  // console.log(group+">>>"+i);
                
                  var vals = api.row(api.row($(rows).eq(i)).index()).data();
                  var cantidad = vals[2] ? parseFloat(vals[2]) : 0;
                  var pesoNeto = vals[3] ? parseFloat(vals[3]) : 0;
                  var pesoBruto = vals[4] ? parseFloat(vals[4]) : 0;

                  if (typeof aData[group] == 'undefined') {
                    aData[group] = new Array();
                    aData[group].rows = [];
                    aData[group].cantidad = [];
                    aData[group].pesoNeto = [];
                    aData[group].pesoBruto = [];
                  }
              
                  aData[group].rows.push(i); 
                  aData[group].cantidad.push(cantidad); 
                  aData[group].pesoNeto.push(pesoNeto);
                  aData[group].pesoBruto.push(pesoBruto); 
                } );
        

                var idx= 0;

          
                for(var nombre in aData){
          
                      idx =  Math.max.apply(Math,aData[nombre].rows);
          
                      var sum = 0; 
                      var sum2 = 0;
                      var sum3 = 0; 
                      $.each(aData[nombre].cantidad,function(k,v){
                            sum = sum + v;
                      });

                      $.each(aData[nombre].pesoNeto,function(k,v){
                            sum2 = sum2 + v;
                      });

                      $.each(aData[nombre].pesoBruto,function(k,v){
                            sum3 = sum3 + v;
                      });
                        console.log(aData[nombre].cantidad);
                      $(rows).eq( idx ).after(
                            '<tr class="group"><td>'+nombre+'</td>'+
                            '<td>'+Math.round((sum / aData[nombre].cantidad.length)*100)/100+'</td>'+
                            '<td>'+Math.round((sum2 / aData[nombre].pesoNeto.length)*100)/100+'</td>'+
                            '<td>'+Math.round((sum3 / aData[nombre].pesoBruto.length)*100)/100+'</td>'+
                            '<td><b> Promedio </b></td></tr>'
                        );
                        
                };

            }
        } );

    } );
  </script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>

  <script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>

  <!--

   <?php if($valform == true):?>
      <script>
        $('#EditarInfoEmp').modal('show')
      </script>

    <?php endif; ?>
  -->


  <script> 
    $(document).ready(function(){

      //Select2 By Class
      $(".form-control-new").select2();
    });
  </script>
</body>
</html>
