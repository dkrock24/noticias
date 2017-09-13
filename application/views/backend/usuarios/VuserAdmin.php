<script src="../../../js/tableGlobal.js"></script>

<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
<link href="../../../assets/css/custom.css" rel="stylesheet" />




<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text">Lista de Usuarios</div>
                                          
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
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Celular</th>
                      <th>DUI</th>
                      <th>Usuario</th>
                      <th>Genero</th>
                      <th>Creado</th>
                      <th>Activo</th>
                      <th>Acción</th>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    <?php
                    $count = 1;
                    foreach ($usuario as $cat)
                    {
                    ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $cat->nombres; ?></td>
                        <td><?php echo $cat->apellidos; ?></td>
                        <td><?php echo $cat->telefono; ?></td>
                        <td><?php echo $cat->celular; ?></td>
                        <td><?php echo $cat->dui; ?></td>
                        <td><?php echo $cat->usuario; ?></td>
                        <td><?php echo $cat->genero; ?></td>
                        <td><?php $abc = new DateTime($cat->fecha_creacion);    echo $abc->format('M-d-Y'); ?></td>
                        <td><?php 
                                    if($cat->estado == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?></td>
                        <td>
                          <a href="#" name="../usuarios/Cusuarios/editUsuarios/<?php echo $cat->id_usuario;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
                            <a href="#" name="../profile/Cprofile/ViewProfileAdmin/<?php echo $cat->id_usuario;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-eye"></i> Ver</a>
                          
                        </td>
                      </tr>
                    <?php
                    $count++;
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



<script type="text/javascript">
  function drawData(data){

    var jdata = jQuery.parseJSON(data);

    for (var i in jdata) {
      $("#categoria").val(jdata[i].nombre_categoria);
      $("#descripcion").val(jdata[i].descripcion_categoria);
      $("#id_categoria").val(jdata[i].id_categoria);

      }
  }
</script>

<script src="../../../js/contentModal.js"></script>


