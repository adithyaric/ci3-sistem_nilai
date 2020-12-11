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
                    <input type="text" name="nip" class="form-control" value="<?= $gr->nip; ?>">
                    <?= form_error('nip', '<div class="text-danger small">', '</div>'); ?>
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
                        <img src="<?= base_url('assets/uploads/') . $gr->photo; ?>" style="width:20%;">
                    <?php endforeach; ?><br><br>
                    <label for="">Foto</label><br>
                    <input type="file" name="userfile" value="<?= $gr->photo; ?>">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </div>
        </div>

        <?= anchor('administrator/guru', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
        <?php form_close(); ?>
    <?php endforeach; ?>
</div>