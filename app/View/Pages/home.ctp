<head>
<?php echo $this->Html->script(array('slider.js'), array('inline' => false)); ?>

<style type="text/css">

</style>
</head>


<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  

		

	</TR> 
	<td align="center"> <h1><em><strong><u><?php echo __('INICIO '); ?> </u></strong></em></h1></td> 
	</TR> 
	 <TR align="center">
		<!--<td >   <?php echo $this->Html->image('mrq.png', array('alt' => 'CakePHP', 'class' => 'img-rounded'))?>-->

		</td> 
	</TR> 
	</table>
  

	<div class="row">
	<div class="col col-sm-2"><H3>ACCIONES DISPONIBLES</H3></div>
	
</div>


	    
		<div class="col col-sm-2" class="success">
		1)<button type="button" class="btn btn-link "> <?php echo $this->Html->link(__(' BUSCAR ARTICULO'),array('controller' => 'bodegapeds', 'action' => 'search2')); ?> <li class="glyphicon glyphicon-search"> </li></button> 
        <br>
		2)<button type="button" class="btn btn-link ">  <?php echo $this->Html->link(__(' CATOLOGO'), array('controller' => 'articulos', 'action' => 'view2')); ?> <li class="glyphicon glyphicon-picture"> </li></button>
		<br>
        3)<button type="button" class="btn btn-link ">  <?php echo $this->Html->link(__(' CARGAR PEDIDO'), array('controller' => 'bodegapeds', 'action' => 'search')); ?> <li class="glyphicon glyphicon-shopping-cart"> </li></button>
        <br>
         4)<button type="button" class="btn btn-link ">  <?php echo $this->Html->link(__(' CARGAR RECIBO'), array('controller' => 'recibopeds', 'action' => 'add')); ?> <li class="glyphicon glyphicon-usd"> </li></button>
        
			</div>
           
                          
                            

		</div>

		<br>
	




	

<br>
<br>
<table align="center">
		<td>
			
		</td>

		<td>
			 <?php echo $this->Html->image('mq.gif', array('alt' => 'CakePHP', 'class' => 'img-rounded'))?>
           

	</table>



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
