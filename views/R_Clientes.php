<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">تسجيل العملاء</h3>
  </div>
  <div class="box-body">
    <div class="col">
      <!-- form start -->
      <form class="form-horizontal" action="backend/R_Clientes.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="Nombre" class="col-sm-2 control-label">الاسم</label>
            <div class="col-xs-4">
              <input type="text" class="form-control" id="Nombre" placeholder="الاسم" name="nombre" required>
            </div>
            <label for="Telefono" class="col-sm-2 control-label">الهاتف</label>
            <div class="col-xs-4">
              <input type="tel" class="form-control" id="Telefono" placeholder="الهاتف" name="telefono" required>
            </div>
          </div>
          <div class="form-group">
            <label for="Correo" class="col-sm-2 control-label">البريد الإلكتروني</label>
            <div class="col-xs-4">
              <input type="email" class="form-control" id="Correo" placeholder="البريد الإلكتروني" name="correo" required>
            </div>
            <label for="Fecha" class="col-sm-2 control-label">تاريخ الميلاد</label>
            <div class="col-xs-4">
              <input type="date" class="form-control" value="2017-06-01" name="fecha" required/>
            </div>
          </div>
          <div class="form-group">
            <label for="Password" class="col-sm-2 control-label">كلمة المرور</label>
            <div class="col-xs-4">
              <input type="password" class="form-control" id="Password" placeholder="كلمة المرور" name="password" required>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-success pull-right">تسجيل</button>
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
          <th>الرقم</th>
          <th>الاسم</th>
          <th>الهاتف</th>
          <th>البريد الإلكتروني</th>
          <th>التاريخ</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>الرقم</th>
          <th>الاسم</th>
          <th>الهاتف</th>
          <th>البريد الإلكتروني</th>
          <th>التاريخ</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-footer-->
</div>
</div>
<script type="text/javascript">
  var dateControl = document.querySelector('input[type="date"]');
  dateControl.value = '2017-06-01';
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true,
      "serverSide": true,
      "ajax": {
        "url": "config/server_side_clientes.php",
        "type": "POST"
      },
      "columns": [{
          "data": "Id"
        },
        {
          "data": "Nombre"
        },
        {
          "data": "Telefono"
        },
        {
          "data": "Correo"
        },
        {
          "data": "Fecha"
        }
      ]
    });
  });
</script>
