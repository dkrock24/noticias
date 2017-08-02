<style type="text/css">
  .encabezado{
    color: white;
  }
  #guardar{
    float: right;
  }
</style>

<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $("li#menu_li").click(function(){        
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {     
              $(".includ").load("backend/usuarios/Cusuarios/index");             
            }
        });
  });





    $(".detalle_pais").click(function(){
       $(".sk-three-bounce").show();
    var id_pais = $(this).attr("id");
        $.ajax({
            url: "../admin/Cpais/editar",
            type:"post",
            success: function(){     
              $(".pages").load("../admin/Cpais/editar/"+id_pais);   
              setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);      
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });  
   });

   $("#btn-crear").click(function()
    {
        $(".sk-three-bounce").show();
        var url = $(this).attr('id');      
        $(".pages").load("../admin/Cpais/crear");  
        setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);      
    });


</script>
<style type="text/css">
    .global_text{
        color: white;
    
    }
</style>


<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row global_text">
                                          <div class="col-md-8 ">Lista de Paises</div>
                                          <div class="col-md-2"><a href="#" id="btn-crear" class='btn btn-secondary-outline btn-edit'>Nuevo</a>
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
                  <table class="table table-striped table-hover table-condensed" id="myTable2">
                    <thead class='titulos'>
                      <tr>
                        <th>#</th>
                        <th>Pais</th>                    
                        <th>Numero Registro</th>
                        <th>Creado</th>                        
                        <th>Estado</th>
                        <th>Detalle</th>                        
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
                                <td><?php if($pais->estado == 1){ echo "Activo";}else{echo "Inactivo";}  ?></td>
                                <td>
                                    <a  class="detalle_pais" id="<?php echo $pais->id_pais; ?>" name='<?php echo $pais->nombre_pais; ?>' href="#">
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
              <ul class="pagination " id="myPager">
                  
              </ul>
          </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

<script src="../../../js/tableGlobal.js"></script>


