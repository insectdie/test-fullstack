<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Input Gaji Karyawan
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="/gaji/add">
           
            <div class="form-group">
              <label class="col-sm-2 control-label">Golongan</label>
              <div class="col-sm-4">
                <label class="radio-inline">
                  <input type="radio" id="golongan" name="golongan" value="A"> A
                </label>

                <label class="radio-inline">
                  <input type="radio" id="golongan" name="golongan" value="B"> B
                </label>

                <label class="radio-inline">
                  <input type="radio" id="golongan" name="golongan" value="C"> C
                </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Kehadiran </label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_kehadiran" name="jml_kehadiran" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Cuti </label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="jml_cuti" name="jml_cuti" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jam Lembur </label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="jam_lembur" name="jam_lembur" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>
            
            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-info btn-submit" type="submit">Simpan</button>
                <a href="/gaji" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->