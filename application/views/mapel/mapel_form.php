<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Mata Pelajaran
    </div>
    <form action="<?= base_url('administrator/mapel/tambah_mapel_aksi') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <?= @$this->session->flashdata('msg') ?>
                <div class="form-group">
                    <label for="">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" value="<?= set_value('nama_mapel'); ?>" class="form-control">
                    <?= form_error('nama_mapel', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">KKM</label>
                    <input type="text" name="kkm" value="<?= set_value('kkm'); ?>" class="form-control">
                    <?= form_error('kkm', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?= anchor('administrator/mapel', '<div class="btn btn-info">Kembali</div>') ?>
            </div>
        </div>
    </form>
</div>