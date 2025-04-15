<?php
include '../backend/Consultas.php';
?>
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">الشركات</h3>
  </div>
  <div class="box-body">
    <div class="col">
      <!-- مربع صغير -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>
            <?php echo total_companias(); ?>
          </h3>
          <p>الشركات</p>
        </div>
        <div class="icon">
          <i class="fa fa-building-o"></i>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>الموقع</th>
                <th>الهاتف</th>
                <th>البريد الإلكتروني</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>الرقم</th>
              <th>الاسم</th>
              <th>الموقع</th>
              <th>الهاتف</th>
              <th>البريد الإلكتروني</th>
            </tr>
        </tfoot>
    </table>
    </div>
    <!-- /.box-footer-->
  </div>
</div>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">الشركات/العملاء</h3>
  </div>
  <div class="box-body">
    <div class="chart">
      <canvas id="cls" style="height: 200px; width: 80px;"></canvas>
      <script>
        var ctx = document.getElementById("cls");
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["الشركات", "العملاء"],
            datasets: [{
              label: '# of Votes',
              data: [<?php print total_companias();?>, <?php print total_clientes(); ?>],
              backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgb(235, 255, 0)'
              ],
              borderColor: [
                'rgba(255, 0, 54, 1)',
                'rgba(255, 222, 0, 1)'
              ],
              borderWidth: 2
            }]
          },
        });
      </script>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
       responsive: true,
       "serverSide": true,
       "ajax": {
           "url": "config/server_side_companias.php",
           "type": "POST"
       },
       "columns": [
           { "data": "Id" },
           { "data": "Nombre" },
           { "data": "Ubicacion" },
           { "data": "Telefono" },
           { "data": "Correo" }
       ]
   } );
  });
</script>
