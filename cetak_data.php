<?php
session_start();
if (empty($_SESSION['nik'])) { ?>
    <script type="text/javascript">
        alert('Maaf Anda Belum Melakukan Login');
        window.location.assign('index.php');
    </script>
<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <style>
        table {
            box-shadow: 0px 0px 5px #aaa;
            width: 100%;
        }

        /*sedikit bayangan yang soft*/
        table th {
            padding: 8px;
            font-weight: 400;
            background: #33B4E4;
            color: #fff;
            text-transform: uppercase;
        }

        table td {
            padding: 10px 5px;
            text-align: center;
        }
    </style>

    <style type="text/css">
        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow mb-4">
            <br>
            <center>
                <h2 class="text-center m-0 font-weight-bold ">
                    PEMERINTAH KABUPATEN JEMBER
                    <br>
                    DESA SEMBORO KEC.TANGGUL
                </h2>
                <h4 class="text-center m-0 font-weight-bold "> jln. PB Sudirman No. 01, Kode Pos 68157</h4>
            </center>
            <hr>
            <center>
                <h4 class="text-center m-0 font-weight-bold "> Data Perjalanan <?php echo  $_SESSION['nama_lengkap']; ?></h4>
            </center>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Lokasi</th>
                                <th>Suhu Tubuh</th>
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
                                        <td><?= $pecah['6'];  ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>