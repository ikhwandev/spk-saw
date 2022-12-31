<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * FROM nilai_saw where id_nilai='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
    <?php require "layout/head.php";?>

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
                    <h3>Matriks Edit</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="matrik-edit.act.php" method="POST">
                                    <div class="form-group">
                                         <label>ID Nilai Matriks 4 x 4</label>
                                         <input type="text" class="form-control" name="id_nilai">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="nama_saham">Nama Saham</label>
                                        <select class="form-control form-select" name="id_saham" id="nama_saham">
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
                                    <div class="form-group">
                                        <label for="kriteria">Kriteria</label>
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
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="text" name="nilai" placeholder="nilai..." class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info btn-sm">
                                    </div>
                                    </form>
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
    </body>

</html>