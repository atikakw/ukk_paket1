<div class="card">
    <div class="card-header">
        <a href="user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form action="simpan_catatan.php" method="post">
            <div class="form-group">
                <label>Pilih Tanggal</label>
                <select name="tanggal" class="form-control">
                    <?php $skrg = time(); ?>
                    <option value="<?= date('d-m-y') ?>">sekarang (<?= date('d F Y')  ?>)</option>
                    <option value="<?= date("d F Y", strtotime("-1 days", $skrg)); ?>">kemarin (<?= date("d F Y", strtotime("-1 days", $skrg));  ?>)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Jam</label>
                <input type="time" name="jam" required class="form-control" placeholder="Masukan Jam">
            </div>
            <div class="form-group">
                <label>Pilih Lokasi</label>
                <input type="text" name="lokasi" required class="form-control" placeholder="Masukan Lokasi">
            </div>
            <div class="form-group">
                <label>Suhu Tubuh</label>
                <input type="number" name="suhu" required class="form-control" placeholder="Masukan Suhu Tubuh">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> KOSONGKAN</button>
            </div>
        </form>
    </div>
</div>