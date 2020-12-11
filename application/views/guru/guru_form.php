<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Guru
    </div>

    <?= form_open_multipart('administrator/guru/tambah_guru_aksi'); ?>

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label for="">NIP</label>
                <input type="text" name="nip" class="form-control">
                <?= form_error('nip', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control">
                <?= form_error('nama_guru', '<div class="text-danger small">', '</div>'); ?>
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
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
                <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">No. Telepon</label>
                <input type="text" name="telp" class="form-control">
                <?= form_error('telp', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="photo">
                <?= form_error('photo', '<div class="text-danger small">', '</div>'); ?>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Simpan</button>

        </div>
    </div>

    <?= anchor('administrator/guru', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
    <?php form_close(); ?>
</div>