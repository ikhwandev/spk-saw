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
          <h3>Grafik Nilai</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Grafik Nilai Rangking Saham LQ45</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">
                    Grafik Rangking Saham LQ45</p>
                  </div>
                  
                <div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['ADRO','AMRT','ANTM','ARTO','ASII',
               'BBCA','BBNI','BBRI','BBTN','BFIN',
               'BMRI','BRIS','BRPT','BUKA','CPIN',
               'EMTK','ERAA','EXCL','GOTO','HMSP',
               'HRUM','ICBP','INCO','INDF','INDY',
               'INKP','INTP','ITMG','JPFA','KLBF',
               'MDKA','MEDC','MIKA','MNCN','PGAS',
               'PTBA','SMGR','TBIG','TINS','TLKM',
               'TOWR','TPIA','UNTR','UNVR','WIKA'],
      datasets: [{
        label: 'Data Saham LQ45',
        data: [0.09090372565159,0.096264626808864,0.033825501328307,0.25224286309744,0.04938015204139,
        0.057503957065612,0.041825492819237,0.042494126025868,0.027804316135455,0.040980747856998,
        0.05313796561038,0.036090554913135,0.037575673023843,0.078324744414223,0.050022155799371,
        0.041296000257462,0.028782255586072,0.019572313745735,-0.017111063568135,0.057069861716855,
        0.079217685107753,0.038155338568621,0.036554256013413,0.032274334363402,0.079753695163679,
        0.059714307630082,0.024082212927709,0.29369345660304,0.034492971451468,0.050834645635641,
        0.061493714716392,0.067041968215725,0.075929938120315,0.024481942510296,0.036289668575063,
        0.1020849004181,0.020406162889235,0.04669546555856,0.053564341543807,0.054032315882986,
        0.062819140835842,-0.02163120868049,0.13573914872193,0.40660004001707,-0.041313364511994],
        borderWidth: 1
      }]
    //         data:[{
    //                 <?php 
	// 				          $sql = 'SELECT hasil FROM saham_saw';
    //                           $result = $db->query($sql);
	// 				          echo mysqli_num_rows($result);
	// 				?>
    //         borderWidth: 1
    //   }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php";?>
      </div>
    </div>
    <?php require "layout/js.php";?>
    <script src="assets/js/app.js"></script>
  </body>

</html>
