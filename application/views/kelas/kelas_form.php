<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Kelas
    </div>
    <form action="<?= base_url('administrator/kelas/tambah_kelas_aksi') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control">
                    <?= form_error('nama_kelas', '<div class="text-danger small">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </div>
        </div>
    </form>
</div>