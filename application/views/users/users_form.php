<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Tambah Users
  </div>

  <form action="<?= base_url('administrator/users/tambah_users_aksi') ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="Masukkan username" class="form-control">
          <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Masukkan password" class="form-control">
          <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" placeholder="Masukkan email" class="form-control">
          <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Level</label>
          <select name="level" id="" class="form-control">
            <option value="admin" selected>Admin</option>
            <option value="wali_kelas">Wali Kelas</option>
          </select>
          <?= form_error('level', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <div class="form-group">
          <label for="">Blokir</label>
          <select name="blokir" id="" class="form-control">
            <option value="Y" selected>Ya</option>
            <option value="N">Tidak</option>
          </select>
          <?= form_error('blokir', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kelas</label>
          <select name="id_kelas" id="" class="form-control">
            <option value="">--Pilih kelas--</option>
            <?php foreach ($kelas as $gr) : ?>
              <option value="<?= $gr->id_kelas; ?>"><?= $gr->nama_kelas; ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('nama_kelas', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>