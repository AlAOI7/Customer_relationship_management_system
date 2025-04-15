<?php include '../backend/Consultas.php'; ?>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">تسجيل الشركات</h3>
  </div>
  <div class="box-body">
    <div class="col">
      <!-- form start -->
      <form class="form-horizontal" action="backend/R_Companias.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="Nombre" class="col-sm-2 control-label">الاسم</label>
            <div class="col-xs-4">
              <input type="text" class="form-control" id="Nombre" placeholder="الاسم" name="nombre" required>
            </div>
            <label for="Ubicacion" class="col-sm-2 control-label">الموقع</label>
            <div class="col-xs-4">
              <select class="form-control" name="ubicacion" id="Ubicacion">
                <?php foreach (Ubicacion_Companias() as $company): ?>
                  <option value="<?php echo $company->Ubicacion; ?>"><?php echo $company->Ubicacion; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="Telefono" class="col-sm-2 control-label">الهاتف</label>
            <div class="col-xs-4">
              <input type="tel" class="form-control" id="Telefono" placeholder="الهاتف" name="telefono" required>
            </div>
            <label for="Correo" class="col-sm-2 control-label">البريد الإلكتروني</label>
            <div class="col-xs-4">
              <input type="email" class="form-control" id="Correo" placeholder="البريد الإلكتروني" name="correo" required>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">تسجيل</button>
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
          <th>المعرف</th>
          <th>الاسم</th>
          <th>الموقع</th>
          <th>الهاتف</th>
          <th>البريد الإلكتروني</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>المعرف</th>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true,
      "serverSide": true,
      "ajax": {
        "url": "config/server_side_companias.php",
        "type": "POST"
      },
      "columns": [{
          "data": "Id"
        },
        {
          "data": "Nombre"
        },
        {
          "data": "Ubicacion"
        },
        {
          "data": "Telefono"
        },
        {
          "data": "Correo"
        }
      ]
    });
  });
</script>
