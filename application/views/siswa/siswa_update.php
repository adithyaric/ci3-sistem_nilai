<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Siswa
    </div>

    <?php foreach ($siswa as $gr) : ?>
        <?= form_open_multipart('administrator/siswa/update_siswa_aksi'); ?>

        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="">NIS</label>
                    <input type="hidden" name="id_siswa" value="<?= $gr->id_siswa; ?>">
                    <input type="text" name="username" class="form-control" value="<?= $gr->username; ?>">
                    <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" class="form-control" value="<?= $gr->password ?>">
                    <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?= $gr->nama_siswa; ?>">
                    <?= form_error('nama_siswa', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?= $gr->tempat_lahir; ?>">
                    <?= form_error('tempat_lahir', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $gr->tanggal_lahir; ?>">
                    <?= form_error('tanggal_lahir', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $gr->alamat; ?>">
                    <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Orang tua/ Wali</label>
                    <input type="text" name="ortu" value="<?= $gr->ortu; ?>" class="form-control">
                    <?= form_error('ortu', '<div class="text-danger small">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Agama</label>
                    <select name="agama" id="" class="form-control" value="<?= $gr->agama; ?>">
                        <option value="">--Pilih Agama--</option>
                        <?php if ($gr->agama == 'Islam') { ?>
                            <option selected>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Konghuchu</option>
                        <?php } elseif ($gr->agama == 'Kristen') { ?>
                            <option>Islam</option>
                            <option selected>Kristen</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Konghuchu</option>
                        <?php } elseif ($gr->agama == 'Hindu') { ?>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option selected>Hindu</option>
                            <option>Buddha</option>
                            <option>Konghuchu</option>
                        <?php } elseif ($gr->agama == 'Buddha') { ?>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option selected>Buddha</option>
                            <option>Konghuchu</option>
                        <?php } elseif ($gr->agama == 'Konghuchu') { ?>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option selected>Konghuchu</option>
                        <?php } ?>

                    </select>
                    <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
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
                    <?php foreach ($detail as $dt) : ?>
                        <img src="<?= base_url('assets/uploads/') . $dt->photo; ?>" style="width:20%;">
                    <?php endforeach; ?><br><br>
                    <label for="">Foto</label><br>
                    <input type="file" name="userfile" value="<?= $dt->photo; ?>">
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
                <?= anchor('administrator/siswa', '<div class="btn btn-info mb-5">Kembali</div>') ?>
            </div>
        </div>
        <?php form_close(); ?>
    <?php endforeach; ?>
</div>