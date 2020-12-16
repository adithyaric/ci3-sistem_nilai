<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Guru
    </div>

    <?= form_open_multipart('administrator/guru/tambah_guru_aksi'); ?>

    <div class="row">
        <div class="col-md-6">
            <?= @$this->session->flashdata('msg') ?>
            <div class="form-group">
                <label for="">NIP</label>
                <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control">
                <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama Guru</label>
                <input type="text" name="nama_guru" value="<?= set_value('nama_guru'); ?>" class="form-control">
                <?= form_error('nama_guru', '<div class="text-danger small">', '</div>'); ?>
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
                <label for="">Email</label>
                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control">
                <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">No. Telepon</label>
                <input type="text" name="telp" value="<?= set_value('telp'); ?>" class="form-control">
                <?= form_error('telp', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="photo">
                <?= form_error('photo', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Mata Kuliah</label>
                <select name="id_mapel" id="" class="form-control">
                    <option value="">--Pilih Mata Kuliah--</option>
                    <?php foreach ($mapel as $mp) : ?>
                        <option value="<?= $mp->id_mapel; ?>"><?= $mp->nama_mapel; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_mapel', '<div class="text-danger small">', '</div>'); ?>
            </div>
            <input type="hidden" name="password" value="guru123">
            <input type="hidden" name="level" value="guru">
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>

        </div>
    </div>

    <?= anchor('administrator/guru', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
    <?php form_close(); ?>
</div>