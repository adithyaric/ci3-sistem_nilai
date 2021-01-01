<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-edit"></i> Form Edit Kelas
                </div>
                <?php foreach ($kelas as $mp) : ?>
                    <form action="<?= base_url('administrator/kelas/update_aksi') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Kelas</label>
                                    <input type="hidden" name="id_kelas" class="form-control" value="<?= $mp->id_kelas ?>">
                                    <input type="text" name="nama_kelas" class="form-control" value="<?= $mp->nama_kelas ?>">
                                    <?= form_error('nama_kelas', '<div class="text-danger small">', '</div>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?= anchor('administrator/kelas', '<div class="btn btn-info">Kembali</div>') ?>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>