

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





   $(".detalle_departamento").click(function(){
    $(".sk-three-bounce").show();
    var id_departamento = $(this).attr("id");
        $.ajax({
            url: "../admin/Cdepartamentos/editar",
            type:"post",
            data: $("#usuario").serialize(),
            success: function(){     
              $(".pages").load("../admin/Cdepartamentos/editar/"+id_departamento);   
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
        var url = $(this).attr('name');      
        $(".pages").load(url);      
    });
</script>

<style>
  .table-dynamic{width: 100%;}
  .form-inline .form-control {
    width:85%;
    font-weight: 10px;
    padding: 4px;
  }

  .input__label-content{
    margin-top: -20px;
  }
  .line{
    
  }
  #anio{
    width: 100%;
  }
  .avatar{
    padding: 10px;
    display: inline-block;
  }

  .titulos{
    font-size: 12px;
  }
  .btn-crear{
    text-align: right;
    float: right;
    display: inline-block;
    position: relative;
    margin-right: 3%;
  }

<style type="text/css">
    .global_text{
        color: white;
    
    }
</style>

</style>

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row global_text">
                                          <div class="col-md-8">Lista de Departamentos</div>
                                          <div class="col-md-2 "><a href="#" id="btn-crear" name="../admin/Cdepartamentos/crear" class='btn btn-secondary-outline btn-edit global_text'>Nuevo</a>
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
                        <th>Departamento</th>                    
                        <th>Creado</th>                        
                        <th>Estado</th>   
                        <th>Detalle</th>                        
                      </tr>
                    </thead>
                    <tbody>
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
                                
                                <td><?php if($departamento->estado_departamento == 1){ echo "Activo";}else{echo "Inactivo";}  ?></td>
                                <td>
                                    <a class="detalle_departamento" id="<?php echo $departamento->id_departamento; ?>" name='<?php echo $departamento->nombre_departamento; ?>' href="#">
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


