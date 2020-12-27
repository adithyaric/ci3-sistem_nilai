<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input siswa
    </div>

    <?= form_open_multipart('administrator/siswa/tambah_siswa_aksi'); ?>

    <div class="row">
        <div class="col-md-6">
            <?= @$this->session->flashdata('msg') ?>
            <div class="form-group">
                <label for="">NIS</label>
                <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control">
                <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama siswa</label>
                <input type="text" name="nama_siswa" value="<?= set_value('nama_siswa'); ?>" class="form-control">
                <?= form_error('nama_siswa', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" value="<?= set_value('alamat'); ?>" class="form-control">
                <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="">--Pilih jenis kelamin--</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
                <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <select name="id_kelas" id="" class="form-control">
                    <option value="">--Pilih kelas--</option>
                    <?php foreach ($kelas as $gr) : ?>
                        <option value="<?= $gr->id_kelas; ?>"><?= $gr->nama_kelas; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_kelas', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="photo">
                <?= form_error('photo', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <input type="hidden" name="password" value="siswa123">
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
            <?= anchor('administrator/siswa', '<div class="btn btn-info mb-5">Kembali</div>') ?>
        </div>
    </div>

    <?php form_close(); ?>
</div>