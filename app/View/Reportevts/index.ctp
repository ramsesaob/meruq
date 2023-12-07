<?php
//debug($data3);
?>

     <!--   <form method="get" action="">
            <label for="periodo">Selecciona el periodo:</label>
            <select name="periodo">
                <option value="2023-10">October 2023</option>
                <option value="2023-11">November 2023</option>
                <option value="2023-12">December 2023</option>
                <!-- Agrega más opciones según los periodos que necesites -->
           <!-- </select>
            <input type="submit" value="Filtrar">
        </form> -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="reportevt view large-9 medium-8 columns content">
    <div class="text-center">
          <h4>RECORD DE VENTAS DEL MES</h4>
    </div>
    <table class="table text-center">
  <thead>
   
  </thead>
  <tbody>
   
   <tr>
       <th scope="row" colspan="2" class="table-active success ">  RECORD POSITIVO</th>
       <th scope="row" class="table-active danger"> RECORD NEGATIVO</th>
       <th scope="row" class="table-active info"> TOTAL ACUMULADO</th>
   </tr>
    <tr>
      
      <td colspan="2" class="table-active success"><i href="#" class="btn btn-success btn-circle glyphicon glyphicon-upload"></i>
        <br>
                <?php if (isset($data[0]['montod'])): ?>
            <?php echo number_format($data[0]['montod'], 2, '.', ''); ?>$
        <?php endif; ?>
    
        </td>
      <td class="table-active danger"><i href="#" class="btn btn-danger btn-circle glyphicon glyphicon-download"></i>
        <br>
             <?php echo number_format($data3, 2, '.', ''); ?>$
      </td>
      <th scope="row" class="table-active info">
          <i href="#" class="btn btn-info btn-circle glyphicon glyphicon-sort"></i> <br><?php echo $mostrar_acumulado; ?>$
      </th>
    </tr>
  </tbody>
</table>
            <div class="text-center">
                <canvas id="myChart" style="width:100%;max-width:800px" class="text-center"></canvas>
            </div>
               
          

       <script>
   // Recolecta la información de la tabla en un objeto de datos
var datos = {
    labels: ["Positivo", "Negativo", "Total "],
    datasets: [{
        label: 'Montos',
        data: [
            <?php echo isset($data[0]['montod']) ? $data[0]['montod'] : 0; ?>,
            <?php echo isset($data3) ? $data3 : 0; ?>,
            <?php echo $mostrar_acumulado; ?>
        ],
        backgroundColor: [
            'rgba(26, 199, 111, 1)',
            'rgba(215, 15, 15, 1)',
            'rgba(37, 212, 253, 1)'
        ],
        borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
    }]
};

// Crear la gráfica usando Chart.js
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: datos,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>