

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
                                          <div class="col-md-8 ">Lista de Paises</div>
                                          <div class="col-md-2"><a href="#" id="btn-crear" name="../admin/Cpais/crear" class='btn btn-secondary-outline btn-edit btn-crear'>Nuevo</a>
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
                
                
                  <table class="table table-striped table-hover table-condensed"  id="my-table">
                    <thead >
                      <tr>
                        <th>#</th>
                        <th>Pais</th>                    
                        <th>Numero Registro</th>
                        <th>Creado</th>                        
                        <th>Activo</th>
                        <th>Detalle </th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                    $count = 1;
                    if($paises !=""){
                    foreach ($paises as $pais) {
                            ?>
                             <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $pais->nombre_pais;  ?></td>
                                <td><?php echo $pais->registro_legal;  ?></td>
                                <td><?php $date = date_create($pais->fecha_creacion); echo date_format($date,"Y/m/d");  ?></td>
                                <td><?php 
                                    if($pais->estado == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?></td>
                                <td>
                                    <a  class="btn-crear" id="<?php echo $pais->id_pais; ?>" name='../admin/Cpais/editar/<?php echo $pais->id_pais; ?>' href="#">
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