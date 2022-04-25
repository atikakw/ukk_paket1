<div class="container">
    <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-3">
                            <form action="">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input class="form-control form-control-user" type="number" name="nik" value="<?= $_SESSION['nik']; ?>" readonly placeholder="NIK">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input class="form-control form-control-user" type="text" name="nama" readonly value="<?= $_SESSION['nama_lengkap']; ?>" placeholder="Nama Lengkap">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>