<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Mata Pelajaran
    </div>
    <form action="<?= base_url('administrator/mapel/tambah_mapel_aksi') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="form-control">
                    <?= form_error('nama_mapel', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </div>
        </div>
    </form>
</div>