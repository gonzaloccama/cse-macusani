<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Persona</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'cse-macusani/admin/'?>">Panel de Administración</a>

         </li>

         <li class="active">

            <strong>Persona</strong>

         </li>

      </ol>

   </div>

   <div class="col-sm-8">

      <div class="title-action">

      </div>

   </div>

</div>

<!--  EO :heading -->

<div class="row">

   <div class="col-lg-12 row wrapper ">

      <div class="ibox ">

         <div class="ibox-title" >

            <h5>Ver persona <small></small></h5>

            <div class="ibox-tools">                           

            </div>

         </div>

         <!-- ............................................................. -->

         <!-- BO : content  -->

         <div class="col-sm-12 white-bg ">

            <div class="box box-info">

               <div class="box-header with-border">

                  <h3 class="box-title">  </h3>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                  <div class="box-body">

                     <?php if($this->session->flashdata('message')): ?>

                     <div class="alert alert-success">

                        <button type="button" class="close" data-close="alert"></button>

                        <?php echo $this->session->flashdata('message'); ?>

                     </div>

                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>

    <tr>

     <td>

       <label for="dni" class="col-sm-3 control-label"> DNI </label>

     </td>

     <td> 

       <?php echo set_value("dni",html_entity_decode($persona->dni)); ?>

     </td>

    </tr>

    

    <tr>

     <td>

       <label for="nombres" class="col-sm-3 control-label"> Nombres </label>

     </td>

     <td> 

       <?php echo set_value("nombres",html_entity_decode($persona->nombres)); ?>

     </td>

    </tr>

    

    <tr>

     <td>

       <label for="ape_pat" class="col-sm-3 control-label"> Apellido paterno </label>

     </td>

     <td> 

       <?php echo set_value("ape_pat",html_entity_decode($persona->ape_pat)); ?>

     </td>

    </tr>

    

    <tr>

     <td>

       <label for="ape_mat" class="col-sm-3 control-label"> Apellido materno </label>

     </td>

     <td> 

       <?php echo set_value("ape_mat",html_entity_decode($persona->ape_mat)); ?>

     </td>

    </tr>

    



    <!-- Fech_naci Start -->

    <tr>

     <td>

      <label for="fech_naci" class="col-sm-3 control-label"> Fecha de nacimiento </label>

     </td>

     <td> 

       <?php echo set_value("fech_naci", html_entity_decode($persona->fech_naci)); ?>

     </td>

    </tr>

    <!-- Fech_naci End -->



    



    <!-- Sexo Start -->

    <tr>

     <td>

      <label class="control-label col-md-3"> Sexo </label>

     </td>

     <td> 

       <?php 

          if(isset($sexo) && !empty($sexo)):



          foreach($sexo as $key => $value): 

           if($value->id_sexo==$persona->sexo)

                 echo $value->sexo;



           endforeach; 

           endif; ?>

     </td>

    </tr>

    <!-- Sexo End -->



    



    <!-- Nucleo_fam Start -->

    <tr>

     <td>

      <label class="control-label col-md-3"> Nucleo familiar </label>

     </td>

     <td> 

       <?php 

          if(isset($nucleo_fam) && !empty($nucleo_fam)):



          foreach($nucleo_fam as $key => $value): 

           if($value->id_nucleofam==$persona->nucleo_fam)

                 echo $value->nucleo_fam;



           endforeach; 

           endif; ?>

     </td>

    </tr>

    <!-- Nucleo_fam End -->



    

    <tr>

     <td>

       <label for="celular" class="col-sm-3 control-label"> Celular </label>

     </td>

     <td> 

       <?php echo set_value("celular",html_entity_decode($persona->celular)); ?>

     </td>

    </tr>

    



    <!-- Observations Start -->

    <tr>

     <td>

      <label for="observations" class="col-sm-3 control-label"> Observaciones </label>

     </td>

     <td> 

       <?php echo set_value("observations",  html_entity_decode($persona->observations)); ?>

     </td>

    </tr>

    <!-- Observations End -->



    



    <!-- Fecha_registro Start -->

    <tr>

     <td>

      <label for="fecha_registro" class="col-sm-3 control-label"> Fecha de registro </label>

     </td>

     <td> 

       <?php echo set_value("fecha_registro", html_entity_decode($persona->fecha_registro)); ?>

     </td>

    </tr>

    <!-- Fecha_registro End -->



    

    <tr>

     <td>

       <label for="no_ficha" class="col-sm-3 control-label"> Nro de ficha </label>

     </td>

     <td> 

       <?php echo set_value("no_ficha",html_entity_decode($persona->no_ficha)); ?>

     </td>

    </tr>

    <tr><td colspan="2"><a type="reset" class="btn btn-success pull-right" onclick="history.back()">Regresar</a></td></tr></table>

                     <div class="form-group">

                        <div class="col-sm-3" >                       

                        </div>

                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-3" >                       

                        </div>

                     </div>

                  </div>

                  <!-- /.box-body -->

                  <div class="box-footer">

                  </div>

                  <!-- /.box-footer -->

               </form>

            </div>

            <!-- /.box -->

            <br><br><br><br>

         </div>

         <!-- EO : content  -->

         <!-- ...................................................................... -->

      </div>

   </div>

</div>

<?php $this->load->view('footer'); ?>
