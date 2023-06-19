<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "koneksi.php";
require "W.php";
require "R.php";
?>

<style>
      @media print {
        .float-start, .float-end, .bi, .btn, .card-title, .card-text, .cap {
        display : none;
         }
      }
</style>

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
          <h3 class="h3">Hasil Nilai Preferensi (P)</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Tabel Nilai Preferensi (P)</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">
                    Nilai preferensi (P) merupakan penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot W.</p>
                  </div>
                  <a href="print.php">
                  <button type="button" class="btn btn-outline-primary btn-sm m-2" data-bs-toggle="modal" target="_blank">
                                        Export PDF
                                    </button>
                                    </a>
                  <div class="table-responsive">
                    <table id="data-table" class="table table-striped mb-0">
                    <caption class="cap">
    Nilai Preferensi (P)
  </caption>
  <thead>
  <tr>
    <th>No</th>
    <th>Alternatif</th>
    <th>Hasil</th>
  </tr>
  </thead>
  <tbody>
  <?php

$P = array();
$m = count($W);
$no = 0;
foreach ($R as $i => $r) {
    for ($j = 0; $j < $m; $j++) {
      $P[$i] = (isset ($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
    }
    echo "<tr class='center'>
            <td>" . (++$no) . "</td>
            <td>A{$i}</td>
            <td>{$P[$i]}</td>
          </tr>";
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
    <?php require "layout/js.php";?>
    <!-- <script src="assets/js/app.js"></script>
    <script src="assets/js/Chart.js"></script> -->
  </body>

</html>
