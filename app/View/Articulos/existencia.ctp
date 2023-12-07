<head>
<?php echo $this->Html->script(array('slider.js'), array('inline' => false)); ?>

<style type="text/css">

</style>
</head>


<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  

		

	</TR> 
	<td align="center"> <h2><strong><?php echo __('CONSULTAR EXISTENCIA '); ?> </strong></h12</td> 
	</TR> 
	 <TR align="center">
		<!--<td >   <?php echo $this->Html->image('mrq.png', array('alt' => 'CakePHP', 'class' => 'img-rounded'))?>-->

		</td> 
	</TR> 
	</table>
  

	<div class="row">
	<div class="col col-sm-2"><H3>ACCIONES DISPONIBLES</H3></div>
	
</div>


	    
	

	<h5>	1)<button type="button" class="btn btn-link "> <?php echo $this->Html->link(__(' BUSCAR ARTICULO'),array('controller' => 'bodegapeds', 'action' => 'search2')); ?> <li class="glyphicon glyphicon-search"> </li></button> 
        <br>
        <br> 
        2)<button type="button" class="btn btn-link ">  <?php echo $this->Html->link(__(' CATOLOGO'), array('controller' => 'articulos', 'action' => 'view2')); ?> <li class="glyphicon glyphicon-picture"> </li></button> </h5>
       
       
		<input type="button" value="Genera una tabla" onclick="genera_tabla()" />
        <script type="text/javascript">
            
            function genera_tabla() {
  // Obtener la referencia del elemento body
  var body = document.getElementsByTagName("body")[0];

  // Crea un elemento <table> y un elemento <tbody>
  var tabla = document.createElement("table");
  var tblBody = document.createElement("tbody");

  // Crea las celdas
  for (var i = 0; i < 2; i++) {
    // Crea las hileras de la tabla
    var hilera = document.createElement("tr");

    for (var j = 0; j < 2; j++) {
      // Crea un elemento <td> y un nodo de texto, haz que el nodo de
      // texto sea el contenido de <td>, ubica el elemento <td> al final
      // de la hilera de la tabla
      var celda = document.createElement("td");
      var textoCelda = document.createTextNode(
        "celda en la hilera " + i + ", columna " + j,
      );
      celda.appendChild(textoCelda);
      hilera.appendChild(celda);
    }

    // agrega la hilera al final de la tabla (al final del elemento tblbody)
    tblBody.appendChild(hilera);
  }

  // posiciona el <tbody> debajo del elemento <table>
  tabla.appendChild(tblBody);
  // appends <table> into <body>
  body.appendChild(tabla);
  // modifica el atributo "border" de la tabla y lo fija a "2";
  tabla.setAttribute("border", "2");
}
        </script>
			
               <script type="text/javascript">
function toggle(obj) {
          var obj=document.getElementById(obj);
          if (obj.style.display == "block") obj.style.display = "none";
          else obj.style.display = "block";
}
</script>
 
<a href="javascript: void(0);" onClick="toggle('q1')">
CLICKABLE TEXT HERE
</a>
<div id="q1" style="display:none;">
TEXT WHAT U WILL SEE WHEN CLICKED HERE
</div>                   
      <br>     
<a href="index" target="popup" onClick="window.open(this.href, this.target, 'width=10,height=10'); return false;"> fffff</a>
                            
                
		</div>

		<br>
	




	

<br>
<br>




<!--
<html>
    <head>
        <title>Untitled</title>
       <script src="../public/js/jquery_min.js" type="text/javascript"></script>
    </head>
    <body>

        <form name="form1" method="post"  action=""> 
            <p> 
                Primer sumando: <input  id="precio_venta" name="precio_venta"   type="text" size="8" maxlength="100">  
            </p> 
            <p> 

              <div class="col-sm-3">
                  <div class="form-group label-floating">
                       <label class="control-label">IVA</label>
                           <select id="porcentaje" name="porcentaje" class="form-control selectpicker">
                                    <option disabled="" selected="">Seleccione ...</option>
                                     <option value="1.05">5%</option>
                                     <option value="1.19">19%</option>
                            </select>
                    </div>
                </div>

            </p> 

            Original number: <input name="original" type="text"  />  

            <p>
                Resultado es: <input id="resultado" type="text" size="10" maxlength="10"> 

                    <button class="btn btn-warning" type="button" style="color:#FFFFFF;" onclick="porcentaje_iva();"><i class="fa fa-dollar fa-1x fa-lg" style="color:#FFFFFF;"></i> Calcular IVA</button>

            </p> 
        </form>
    </body>
</html>

<script>
            function porcentaje_iva()
            {  



                if(porcentaje.value == "1.19" || porcentaje.value == "1.05" ){

                var n1 = Math.floor(precio_venta.value * 100) / 100;

               var n2 = Math.floor(porcentaje.value * 100) / 100;

               $(function() {

           document.form1.precio_venta.value=(n1 / n2);

             var n = Math.floor(precio_venta.value * 100) / 100;


             var x= precio_venta.value=(n1 / n2);

             document.form1.precio_venta.value= n.toFixed(2);

        });

                }


}


        </script> 
