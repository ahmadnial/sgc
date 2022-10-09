<?php include 'template/header.php'; ?>
<?php include 'add-groupper.php'; ?>

<!-- Theme style -->
<link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
<link rel="stylesheet" href="dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="css/sweetalert2.min.css">
<link rel="stylesheet" href="css/sweetalert2.css">
<script src="js/ajax.jquery.min"></script>
<!-- dropzonejs -->
<link rel="stylesheet" href="dashboard/plugins/dropzone/min/dropzone.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="dashboard/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="dashboard/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<style>
  .bg-head {
    background-color: blueviolet;
  }
</style>

<?php
$resource = "http://localhost:6789/api-econtrol/GetAll.php";
$getKonten = file_get_contents($resource);
$result = json_decode($getKonten, true);
// var_dump($result);
// die();
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">

        <!-- /.card-header -->
        <div class="card">
          <div class="card-header text-white bg-head">
            <h3 class="card-title">List Register Pasien All

            </h3>
          </div>
          <!-- /.card-header -->

          <!-- <div class="container-fluid">
            <form action="" method="post">
              <div class="form-gruop mb-3 mt-3">
                <div class="form-inline">
                  <input type="date" class="form-control  mr-1" name="start" value="" />
                  <a>s/d</a>
                  <input type="date" class="form-control ml-1" name="end" value="" /> -->
          <!-- <button type="submit" name="cari" class="btn btn-primary ml-3">Search</button> -->

          <div class="form-gruop  col-5">
            <!-- <label for="" class="form-label">Pilih Layanan/Unit/Instalasi</label> -->
            <!-- <div class="form-inline"> -->
            <!-- <select class="custom-select" name="keterangan" required>
                              <option selected>--Choose--</option>
                              <option value="1">Belum Terisi</option>
                              <option value="">Sudah Terisi</option>
                            </select> -->
            <!-- <button type="submit" name="cari" class="btn btn-primary ml-3">Search</button> -->
          </div>
        </div>
      </div>
    </div>
    </form>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pasien</th>
          <th>No.RM</th>
          <th>Bed</th>
          <th>Kelas</th>
          <th>Tanggal Pakai Bed</th>
          <th>Tarif RS</th>
          <th>Estimasi Tarif Grouper</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($result['data'] as $item) {
          $tarif = number_format($item['fn_count_all'], 0, ',', '.');
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $item['fs_nm_pasien'] ?></td>
            <td><?= $item['fs_mr'] ?></td>
            <td><?= $item['fs_nm_bed'] ?></td>
            <td><?= $item['fs_nm_kelas'] ?></td>
            <td><?= $item['fd_tgl_in'] ?></td>
            <td><?= "Rp." . $tarif ?></td>
            <td></td>
            <td>
              <div class="btn-group" role="group" aria-label="">
                <form action="" method="post">
                  <button type="button" name="getTindakan" class="btn btn-xs btn-success" data-toggle="modal" data-target="#detailTindakan<?= $item['fs_mr']; ?>">Detail</button>
                  <button type="button" class="btn btn-xs btn-danger ml-1" data-toggle="modal" data-target="#gr<?= $item['fs_mr']; ?>">Groupper</button>
              </div>
            </td>
          </tr>
          <div class="modal fade" id="detailTindakan<?= $item['fs_mr'] ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Label">View</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <body>
                    <div class="container">

                    </div>
                  </body>
                </div>
                </form>
              </div>
              <!-- <button type="button" class="btn btn-danger mt-3 float-right" data-dismiss="modal">Close</button> -->
              <div class="modal-footer">
              </div>
            </div>
          </div>

          <div class="modal fade" id="gr<?= $item['fs_mr']; ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Label">Add Groupper</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <body>
                    <!-- <div class="container"> -->
                    <form action="" method="post">
                      <label for="">Perkiraan Groupper a.n : <?= $item['fs_nm_pasien'] ?> </label>
                      <input type="text" name="form-groupper" class="form-control " placeholder="Tulisakn Perkiraan Groupper!">
                      <input type="hidden" name="mr" class="form-control" value="<?= $item['fs_mr'] ?>">
                      <button type="submit" name="add-groupper" class="btn btn-success mt-3 float-right">Submit</button>
                      <!-- </div> -->
                    </form>
                  </body>
                </div>
                <!-- </form> -->
              </div>
              <!-- <button type="button" class="btn btn-danger mt-3 float-right" data-dismiss="modal">Close</button> -->
              <!-- <div class="modal-footer">
              </div>
            </div>
          </div> -->
              </tfoot>
            <?php } ?>

    </table>
  </div>
  </div>
</section>
<br>


<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-left mb-2 d-none d-sm-inline">
    <strong>Copyright &copy; 2022 <a href="">IT-RSNR</a></strong> | Anything you want.
</footer>


<!-- jQuery -->
<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="dashboard/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="dashboard/plugins/moment/moment.min.js"></script>
<script src="dashboard/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="dashboard/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="dashboard/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="dashboard/plugins/jszip/jszip.min.js"></script>
<script src="dashboard/plugins/pdfmake/pdfmake.min.js"></script>
<script src="dashboard/plugins/pdfmake/vfs_fonts.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- BS-Stepper -->
<script src="dashboard/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="dashboard/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/sweetalert2.all.js"></script>
<script src="js/autoDate.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>