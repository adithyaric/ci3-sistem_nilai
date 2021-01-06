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
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" class="form-control" value="<?= $gr->password ?>">
                    <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>
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
                        <?php if ($gr->jenis_kelamin == 'Laki-Laki') { ?>
                            <option selected>Laki-laki</option>
                            <option>Perempuan</option>
                        <?php } elseif ($gr->jenis_kelamin == 'Perempuan') { ?>
                            <option>Laki-laki</option>
                            <option selected>Perempuan</option>
                        <?php } ?>
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
                    <label for="">Mata Pelajaran</label>
                    <select name="id_mapel" id="" class="form-control">
                        <option value="<?= $dt->id_mapel; ?>">--<?= $dt->nama_mapel ?>--</option>
                        <?php foreach ($mapel as $mp) : ?>
                            <option value="<?= $mp->id_mapel; ?>"><?= $mp->nama_mapel; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_mapel', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" id="" class="form-control">
                        <?php if ($gr->level == 'guru') { ?>
                            <option value="guru" selected>Guru</option>
                            <option value="wali_kelas">Wali Kelas</option>
                        <?php } elseif ($gr->level == 'wali_kelas') { ?>
                            <option value="guru">Guru</option>
                            <option value="wali_kelas" selected>Wali Kelas</option>
                        <?php } ?>
                    </select>
                    <?= form_error('level', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" id="" class="form-control">
                        <option value="<?= $dt->id_kelas; ?>">--<?= $dt->nama_kelas ?>--</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls->id_kelas; ?>"><?= $kls->nama_kelas; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>
                <?= anchor('administrator/guru', '<div class="btn btn-info mb-5">Kembali</div>') ?>
            </div>
        </div>
        <?php form_close(); ?>
    <?php endforeach; ?>
</div>