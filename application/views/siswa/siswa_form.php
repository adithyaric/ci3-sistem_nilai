<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input siswa
    </div>

    <?= form_open_multipart('administrator/siswa/tambah_siswa_aksi'); ?>

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label for="">NIP</label>
                <input type="text" name="nis" class="form-control">
                <?= form_error('nis', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama siswa</label>
                <input type="text" name="nama_siswa" class="form-control">
                <?= form_error('nama_siswa', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control">
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
                <select name="nama_kelas" id="" class="form-control">
                    <option value="">--Pilih kelas--</option>
                    <?php foreach ($kelas as $gr) : ?>
                        <option value="<?= $gr->nama_kelas; ?>"><?= $gr->nama_kelas; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('nama_kelas', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="photo">
                <?= form_error('photo', '<div class="text-danger small">', '</div>'); ?>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Simpan</button>

        </div>
    </div>

    <?= anchor('administrator/siswa', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
    <?php form_close(); ?>
</div>