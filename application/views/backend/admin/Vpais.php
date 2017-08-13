

<script src="../../../js/tableGlobal.js"></script>
<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />

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


   $("#btn-crear").click(function()
    {

        var url = $(this).attr('id');      
        $(".pages").load("../admin/Cpais/crear");  
 
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
                
                
                  <table class="table table-striped table-hover table-condensed"  id="my-table">
                    <thead class='titulos'>
                      <tr>
                        <th>#</th>
                        <th>Pais</th>                    
                        <th>Numero Registro</th>
                        <th>Creado</th>                        
                        <th>Estado</th>
                        <td>Detalle </td>                        
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
            
            <ul class="pagination hidden-xs pull-right" id="myPager"></ul>
        </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id=""></div>



<script type="text/javascript">
$(document).ready(function(){



       $(".detalle_pais").click(function(){
        var id_pais = $(this).attr("id");
        $.ajax({
            url: "../admin/Cpais/editar",
            type:"post",
            success: function(){     
              $(".pages").load("../admin/Cpais/editar/"+id_pais);      
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });  
   });
     
});
</script>


<script type="text/javascript">

$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
      pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:10});
    
});

</script>
