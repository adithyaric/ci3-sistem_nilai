<div class="container-fluid">
  <div class="alert alert-success">
    <i class="fas fa-university"></i> Halaman Raport
  </div>
  <?= @$this->session->flashdata('msg') ?>
  <form action="<?= base_url('penilaian/raport/raport_aksi') ?>" method="post">
    <div class="form-group">
      <label for="">NIS</label>
      <?php if ($this->session->userdata('akses') == 'siswa') {
        $nis = $this->session->userdata('ses_nis');
        echo $nis;
      ?>
        <input type="hidden" name="nis" class="form-control" placeholder="" value="<?= $nis ?>">
      <?php } else { ?>
        <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS Siswa">
        <?= form_error('nis', '<div class="text-danger small">', '</div>'); ?>
      <?php } ?>
    </div>

    <button type="submit" class="btn btn-primary">Proses</button>
  </form>
</div>