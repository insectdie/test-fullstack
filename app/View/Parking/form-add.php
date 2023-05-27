<div class="row">
    <div class="col-md-12">
      <div class="page-header">
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="/parking_rates/add">

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal & Jam Masuk</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tanggal_keluar" name="tanggal_masuk" autocomplete="off" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
              <div class="form-group col-md-1">
                  <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="00" maxlength="2">
                  <!-- <label for="inputPassword4">:</label> -->
              </div>
              <div class="form-group col-md-1">
                  <input type="text" class="form-control" id="menit_masuk" name="menit_masuk" placeholder="00" maxlength="2">
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal & Jam Keluar</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tanggal_keluar" name="tanggal_keluar" autocomplete="off" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
              <div class="form-group col-md-1">
                  <input type="text" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="00" maxlength="2">
                  <!-- <label for="inputPassword4">:</label> -->
              </div>
              <div class="form-group col-md-1">
                  <input type="text" class="form-control" id="menit_keluar" name="menit_keluar" placeholder="00" maxlength="2">
              </div>
            </div>
            
            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <!-- <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan"> -->
                <button class="btn btn-info btn-submit" type="submit">Simpan</button>
                <a href="/parking_rates" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->