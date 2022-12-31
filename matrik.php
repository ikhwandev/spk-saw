<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "koneksi.php";
?>

  <body>
    <div id="app">
      <?php require "layout/sidebar.php";?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
          <h3>Matrik</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Matriks Keputusan (X) &amp; Ternormalisasi (R)</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">Melakukan perhitungan normalisasi untuk mendapatkan matriks nilai ternormalisasi (R), dengan ketentuan :
Untuk normalisai nilai, jika faktor/jenis kriteria bertipe cost maka digunakan rumusan:
Rij = ( min{Xij} / Xij)
sedangkan jika faktor/jenis kriteria bertipe benefit maka digunakan rumusan:
Rij = ( Xij/max{Xij} )</p>
                  </div>
                  <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                        Isi Nilai Alternatif
                                    </button>
                  <div class="table-responsive">
                  <table id="data-table" class="table table-striped mb-0">
    <caption>
        Matrik Keputusan(X)
    </caption>
    <thead>
    <tr>
        <th rowspan='2'>Alternatif Saham</th>
        <th colspan='5'>Kriteria</th>
    </tr>
    <tr>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th>OPSI</th>
    </tr>
    </thead>
    <tbody>
    <?php
$sql = "SELECT
          a.id_saham,
          b.nama_saham,
          SUM(IF(a.id_kriteria=1,a.nilai,0)) AS C1,
          SUM(IF(a.id_kriteria=2,a.nilai,0)) AS C2,
          SUM(IF(a.id_kriteria=3,a.nilai,0)) AS C3,
          SUM(IF(a.id_kriteria=4,a.nilai,0)) AS C4
        FROM
          nilai_saw a
          JOIN saham_saw b USING(id_saham)
        GROUP BY a.id_saham
        ORDER BY a.id_saham";
$result = $db->query($sql);
$X = array(1 => array(), 2 => array(), 3 => array(), 4 => array());
while ($row = $result->fetch_object()) {
  array_push($X[1], $row->C1,2);
  array_push($X[2], $row->C2,2);
  array_push($X[3], $row->C3,2);
  array_push($X[4], $row->C4,2);
    echo "<tr class='center'>
            <th>A<sub>{$row->id_saham}</sub> {$row->nama_saham}</th>
            <td>" . round($row->C1, 2) . "</td>
            <td>" . round($row->C2, 2) . "</td>
            <td>" . round($row->C3, 2) . "</td>
            <td>" . round($row->C4, 2) . "</td>
            <td>
            <a href='matrik-edit.php?id={$row->id_saham}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='matrik-hapus.php?id={$row->id_saham}' class='btn btn-danger btn-sm'>Hapus</a>
            </td>
          </tr>\n";
}
$result->free();


?>
</tbody>
</table>

<table id="matrik" class="table table-striped mb-0">
    <caption>
        Matrik Ternormalisasi (R)
    </caption>
    <thead>
    <tr>
        <th rowspan='2'>Alternatif Saham</th>
        <th colspan='4'>Kriteria</th>
    </tr>
    <tr>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
    </tr>
    </thead>
    <tbody>
    <?php
$sql = "SELECT
          a.id_saham,
          SUM(
            IF(
              a.id_kriteria=1,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[1]) . ",
                " . min($X[1]) . "/a.nilai)
              ,0)
              ) AS C1,
          SUM(
            IF(
              a.id_kriteria=2,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[2]) . ",
                " . min($X[2]) . "/a.nilai)
               ,0)
             ) AS C2,
          SUM(
            IF(
              a.id_kriteria=3,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[3]) . ",
                " . min($X[3]) . "/a.nilai)
               ,0)
             ) AS C3,
          SUM(
            IF(
              a.id_kriteria=4,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[4]) . ",
                " . min($X[4]) . "/a.nilai)
               ,0)
             ) AS C4
        FROM
          nilai_saw a
          JOIN kriteria_saw b USING(id_kriteria)
        GROUP BY a.id_saham
        ORDER BY a.id_saham
       ";
$result = $db->query($sql);
$R = array();
while ($row = $result->fetch_object()) {
    $R[$row->id_saham] = array($row->C1, $row->C2, $row->C3, $row->C4);
    echo "<tr class='center'>
            <th>A{$row->id_saham}</th>
            <td>" . round($row->C1, 2) . "</td>
            <td>" . round($row->C2, 2) . "</td>
            <td>" . round($row->C3, 2) . "</td>
            <td>" . round($row->C4, 2) . "</td>
          </tr>\n";
}
?>
</tbody>
</table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php";?>
      </div>
    </div>

       <!-- modal tambah matriks -->
       <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Isi Nilai Alternatif</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="matrik-simpan.php" method="POST">
                        <div class="modal-body">
                            <label>Nama Saham: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="id_saham">
                            <?php
$sql = 'SELECT id_saham,nama_saham FROM saham_saw';
$result = $db->query($sql);
$i = 0;
while ($row = $result->fetch_object()) {
    echo '<option value="' . $row->id_saham . '">' . $row->nama_saham . '</option>';
}
$result->free();
?>
                                          </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label>Kriteria: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="id_kriteria">
                            <?php
$sql = 'SELECT * FROM kriteria_saw';
$result = $db->query($sql);
$i = 0;
while ($row = $result->fetch_object()) {
    echo '<option value="' . $row->id_kriteria . '">' . $row->nama_kriteria . '</option>';
}
$result->free();
?>
                                          </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label>Nilai: </label>
                            <div class="form-group">
                                <input type="text" name="nilai" placeholder="nilai..." class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <?php require "layout/js.php";?>
    <script>
      $(document).ready(function () {
      $('#matrik').DataTable();
    });
    </script>
    <script src="assets/js/app.js"></script>
  </body>

</html>