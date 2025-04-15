<?php include '../backend/Consultas.php'; ?>
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">تسجيل التقارير</h3>
  </div>
  <div class="box-body">
    <div class="col">
      <!-- form start -->
      <form class="form-horizontal" action="backend/R_Reportes.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="Daño" class="col-sm-2 control-label">مستوى الضرر</label>
            <div class="col-xs-4">
              <select class="form-control" name="dano" id="Daño">
                <option value="leve">منخفض</option>
                <option value="moderado">متوسط</option>
                <option value="perdida total">كامل</option>
              </select>
            </div>
            <label for="Folio" class="col-sm-2 control-label">رقم بوليصة التأمين</label>
            <div class="col-xs-4">
              <select class="form-control" id="Folio" name="folio">
                <?php foreach (Folios_Seguro() as $Folio): ?>
                  <option value="<?php print $Folio->Folio ?>"><?php echo $Folio->Folio ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="Detalles" class="col-sm-2 control-label">التفاصيل</label>
            <div class="col-xs-4">
              <textarea class="form-control" name="detalles" rows="8" cols="50" required></textarea>
            </div>
            <label for="Fecha" class="col-sm-2 control-label">التاريخ</label>
            <div class="col-xs-4">
              <input type="date" class="form-control" value="2017-06-01" name="fecha" required />
            </div>
          </div>
          <div class="form-group">
            <label for="Hora" class="col-sm-2 control-label">الوقت</label>
            <div class="col-xs-4">
              <input type="text" class="form-control" value="<?php echo date('h:i:s'); ?>" name="hora" disabled />
            </div>
            <label for="Ubicacion" class="col-sm-2 control-label">الموقع</label>
            <div class="col-xs-4">
              <select class="form-control" id="Ubicacion" name="ubicacion">
                <?php foreach (Ubicacion() as $city): ?>
                  <option value="<?php print $city->Ubicacion ?>"><?php echo $city->Ubicacion ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-danger pull-right">تسجيل</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>رقم البوليصة</th>
          <th>مستوى الضرر</th>
          <th>رقم بوليصة التأمين</th>
          <th>التفاصيل</th>
          <th>التاريخ</th>
          <th>الوقت</th>
          <th>الموقع</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>رقم البوليصة</th>
          <th>مستوى الضرر</th>
          <th>رقم بوليصة التأمين</th>
          <th>التفاصيل</th>
          <th>التاريخ</th>
          <th>الوقت</th>
          <th>الموقع</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-footer-->
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true,
      "serverSide": true,
      "ajax": {
        "url": "config/server_side_reportes.php",
        "type": "POST"
      },
      "columns": [{
          "data": "Folio"
        },
        {
          "data": "Nivel_Dano"
        },
        {
          "data": "Folio_Seguro"
        },
        {
          "data": "Detalles"
        },
        {
          "data": "Fecha"
        },
        {
          "data": "Hora"
        },
        {
          "data": "Ubicacion"
        }
      ]
    });
  });
</script>
