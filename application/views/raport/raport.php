<div class="container-fluid">
  <div class="alert alert-success">
    <i class="fas fa-university"></i> Halaman Raport
  </div>
  <form action="<?= base_url('penilaian/raport/raport_aksi') ?>" method="post">
    <div class="form-group">
      <label for="">NIS</label>
      <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS Siswa">
      <?= form_error('nis', '<div class="text-danger small">', '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary">Proses</button>
  </form>
</div>