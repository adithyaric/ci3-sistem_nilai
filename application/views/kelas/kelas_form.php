<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university"></i> Form Input Kelas
                </div>
                <form action="<?= base_url('administrator/kelas/tambah_kelas_aksi') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <?= @$this->session->flashdata('msg') ?>
                            <div class="form-group">
                                <label for="">Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control">
                                <?= form_error('nama_kelas', '<div class="text-danger small">', '</div>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <?= anchor('administrator/kelas', '<div class="btn btn-info">Kembali</div>') ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>