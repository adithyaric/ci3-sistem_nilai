<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Users
  </div>

  <?php foreach ($users as $user) : ?>

    <form action="<?= base_url('administrator/users/update_aksi') ?>" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Username</label>
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <input type="text" name="username" placeholder="Masukkan username" class="form-control" value="<?= $user->username ?>">
            <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Masukkan password" class="form-control" value="<?= $user->password ?>">
            <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Masukkan email" class="form-control" value="<?= $user->email ?>">
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
              <?php
              if ($blokir == 'Y') { ?>
                <option value="Y" selected>Ya</option>
                <option value="N">Tidak</option>
              <?php
              } elseif ($blokir == 'N') { ?>

                <option value="Y">Ya</option>
                <option value="N" selected>Tidak</option>
              <?php
              } else { ?>

                <option value="Y">Ya</option>
                <option value="N" selected>Tidak</option>
              <?php } ?>

            </select>
            <?= form_error('blokir', '<div class="text-danger small">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="">Kelas</label>
            <select name="id_kelas" id="" class="form-control">
              <?php foreach ($detail as $dt) : ?>
                <option value="<?= $dt->id_kelas; ?>">--<?= $dt->nama_kelas ?>--</option>
              <?php endforeach; ?>
              <?php foreach ($kelas as $kls) : ?>
                <option value="<?= $kls->id_kelas; ?>"><?= $kls->nama_kelas; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <?= anchor('administrator/users', '<div class="btn btn-info">Kembali</div>') ?>
        </div>
      </div>
    </form>

  <?php endforeach; ?>
</div>