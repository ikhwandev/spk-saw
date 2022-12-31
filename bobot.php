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
          <h3>Bobot Kriteria</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Tabel Bobot Kriteria Saham LQ45</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">Pengambil keputusan memberi bobot preferensi dari setiap kriteria dengan
                      masing-masing jenisnya (keuntungan/benefit atau biaya/cost):</p>
                                     <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                        Tambah Bobot
                                    </button>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <caption>
    Tabel Kriteria C<sub>i</sub>
  </caption>
  <tr>
    <th>No</th>
    <th>Simbol</th>
    <th>Kriteria</th>
    <th>Bobot</th>
    <th colspan="2">Atribut</th>
  </tr>
          <?php
          $sql = 'SELECT id_kriteria, nama_kriteria, bobot, jenis FROM kriteria_saw';
          $result = $db->query($sql);
          if ($result->num_rows > 0) {
              $no = 1;
              while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                  echo 
                      "<tr>
                      <td class='right'>$no</td>
                      <td class='center'>C$no</td>
                      <td>$data[nama_kriteria]</td>
                      <td>$data[bobot]</td>
                      <td>$data[jenis]</td>
                      <td>
                      <div class='btn-group mb-1'>
                      <div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle me-1 btn-sm' type='button'
                              id='dropdownMenuButton' data-bs-toggle='dropdown'
                              aria-haspopup='true' aria-expanded='false'>
                              Aksi
                          </button>
                          <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                              <a class='dropdown-item' href='bobot-edit.php?id=".$data['id_kriteria']."'>Edit</a>
                              <a class='dropdown-item' href='bobot-hapus.php?id=".$data['id_kriteria']."'>Hapus</a>
                          </div>
                      </div>
                  </div>
                      </td>
                  </tr>\n";
                  $no++;
              }
          }
          $result->free();
          ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!-- modal tambah bobot -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Bobot</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="bobot-simpan.php" method="POST">
                        <div class="modal-body">
                            <label for="kriteria">Kriteria :</label>
                            <div class="form-group"> 
                                <input type="text" name="kriteria" placeholder="" class="form-control" id="kriteria"
                                    required>
                            </div>
                            <label for="bobot">Bobot :</label>
                            <div class="form-group"> 
                                <input type="text" name="bobot" placeholder="" class="form-control" id="bobot"
                                    required>
                            </div>
                            <label for="atribut">Atribut :</label>
                            <div class="form-group"> 
                                          <select class="form-control form-select" name="atribut">
                                            <option value="benefit">Benefit</option>
                                            <option value="cost">Cost</option>
                                          </select>
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
        <?php require "layout/footer.php";?>
      </div>
    </div>
    <?php require "layout/js.php";?>
  </body>

</html>