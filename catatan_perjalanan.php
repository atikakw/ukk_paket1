<div class="card">
    <div class="card-header">
        <div class="form-row align-items-center">
            <a href="user.php" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <?php

        if (!empty($_SESSION['TAMBAH'])) {
            echo $_SESSION['TAMBAH'];
            unset($_SESSION['TAMBAH']);
        }

        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    $data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik'] . "|" . $_SESSION['nama_lengkap'];
                    foreach ($data as $value) {
                        $pecah = explode("|", $value);
                        @$key = $pecah['1'] . "|" . $pecah['2'];
                        if ($key == $user) {
                    ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $pecah['3'];  ?></td>
                                <td><?= $pecah['4'];  ?></td>
                                <td><?= $pecah['5'];  ?></td>
                                <td><?= $pecah['6'];  ?> Celcius</td>
                                <td>
                                    <a href="?url=edit_catatan&id_catatan=<?= $pecah['0'] ?> " class="btn btn-warning">
                                        <i class="fa fa-pen"></i> Edit
                                    </a>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus...?')" href="hapus_catatan.php?id_catatan=<?= $pecah['0'] ?> " class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>