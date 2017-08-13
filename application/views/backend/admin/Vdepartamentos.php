
<script src="../../../js/tableGlobal.js"></script>

<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
<link href="../../../assets/css/custom.css" rel="stylesheet" />

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row global_text">
                                          <div class="col-md-8">Lista de Departamentos</div>
                                          <div class="col-md-2 "><a href="#" id="btn-crear" name="../admin/Cdepartamentos/crear" class='btn btn-secondary-outline btn-edit global_text btn-crear'>Nuevo</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="table-flip-scroll">
  <div class="row">
      <div class="col-md-12">
          <div class="card-block">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped table-hover table-condensed" id="my-table">
                    <thead class='titulos'>
                      <tr>
                        <th>#</th>
                        <th>Pais</th> 
                        <th>Departamento</th>                    
                        <th>Creado</th>                        
                        <th>Estado</th>   
                        <th>Activo</th>                        
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                    $count = 1;
                    if($departamentos!="")
                    {
                    foreach ($departamentos as $departamento) {

                            ?>
                             <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $departamento->nombre_pais;  ?></td>
                                <td><?php echo $departamento->nombre_departamento;  ?></td>
                                <td><?php $date = date_create($departamento->fecha_creacion); echo date_format($date,"Y/m/d");  ?></td>
                                
                                <td><?php 
                                    if($departamento->estado_departamento == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?>
                                </td>
                                <td>
                                    <a class="btn-crear" id="<?php echo $departamento->id_departamento; ?>" name='../admin/Cdepartamentos/editar/<?php echo $departamento->id_departamento; ?>' href="#">
                                    <button type="button" class="btn btn-primary btn-transparent">Detalle</button>
                                     </a>                                     
                                </td>                                 
                             </tr>
                            
                            <?php
                             $count++;
                        }
                      }
                    ?>                      
                    </tbody>
    </table>
</div>

               <div class="col-md-12 text-center">
            
            <ul class="pagination hidden-xs pull-right" id="myPager"></ul>
        </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../../js/contentModal.js"></script>



