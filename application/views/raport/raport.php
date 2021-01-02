<div class="container">
  <div class="row mt-2">
    <div class="col-12">
      <div class="container-fluid">
        <div class="alert alert-success">
          <i class="fas fa-university"></i> Halaman Raport
        </div>
        <?= @$this->session->flashdata('msg') ?>
        <form action="<?= base_url('penilaian/raport/raport_aksi') ?>" method="post">
          <div class="form-group">
            <label for="">NIS : </label>
            <?php if ($this->session->userdata('akses') == 'siswa') {
              $nis = $this->session->userdata('ses_nis');
              echo $nis; ?>
              <input type="hidden" name="nis" class="form-control" placeholder="" value="<?= $nis ?>">
            <?php } else { ?>
              <input type="text" name="nis" class="form-control" value="<?= set_value('nis'); ?>" placeholder="Masukkan NIS Siswa">
            <?php } ?>
            <?= form_error('nis', '<div class="text-danger small">', '</div>'); ?>
            <br>
            <label for="">Semester</label>
            <select name="semester" id="" class="form-control">
              <option value="">--Pilih Semester--</option>
              <option value="1">Ganjil</option>
              <option value="2">Genap</option>
            </select>
            <?= form_error('semester', '<div class="text-danger small">', '</div>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">
            <li class="fa fa-graduation-cap"></li> Proses
          </button>
        </form>
      </div>
    </div>
  </div>
</div>