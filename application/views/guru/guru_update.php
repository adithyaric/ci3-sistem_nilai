<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Guru
    </div>

    <?php foreach ($guru as $gr) : ?>
        <?= form_open_multipart('administrator/guru/update_guru_aksi'); ?>

        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="hidden" name="id_guru" value="<?= $gr->id_guru; ?>">
                    <input type="text" name="username" class="form-control" value="<?= $gr->username; ?>">
                    <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama guru</label>
                    <input type="text" name="nama_guru" class="form-control" value="<?= $gr->nama_guru; ?>">
                    <?= form_error('nama_guru', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $gr->alamat; ?>">
                    <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control" value="<?= $gr->jenis_kelamin; ?>">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $gr->email; ?>">
                    <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="telp" class="form-control" value="<?= $gr->telp; ?>">
                    <?= form_error('telp', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <?php foreach ($detail as $dt) : ?>
                        <img src="<?= base_url('assets/uploads/') . $dt->photo; ?>" style="width:20%;">
                    <?php endforeach; ?><br><br>
                    <label for="">Foto</label><br>
                    <input type="file" name="userfile" value="<?= $dt->photo; ?>">
                    <?= form_error('photo', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Mata Kuliah</label>
                    <select name="id_mapel" id="" class="form-control">
                        <option value="<?= $dt->id_mapel; ?>">--<?= $dt->nama_mapel ?>--</option>
                        <?php foreach ($mapel as $mp) : ?>
                            <option value="<?= $mp->id_mapel; ?>"><?= $mp->nama_mapel; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_mapel', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>
                <?= anchor('administrator/guru', '<div class="btn btn-info btn-sm mb-5">Kembali</div>') ?>
            </div>
        </div>
        <?php form_close(); ?>
    <?php endforeach; ?>
</div>