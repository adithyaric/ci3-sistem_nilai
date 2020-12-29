<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Edit Nilai
    </div>

    <?php foreach ($nilai as $mp) : ?>
        <form action="<?= base_url('penilaian/nilai/update_aksi') ?>" method="post">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <input type="text" name="id_mapel" class="form-control" value="<?= $mp['nama_mapel']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Guru</label>
                        <input type="text" name="id_guru" class="form-control" value="<?= $mp['nama_guru']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="text" name="nis" class="form-control" value="<?= $mp['nis']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_nilai" class="form-control" value="<?= $mp['id_nilai'] ?>">
                        <label for="">TUGAS</label>
                        <input type="text" name="tugas" class="form-control" value="<?= $mp['tugas'] ?>">
                        <?= form_error('nama_mapel', '<div class="text-danger small">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">UTS</label>
                        <input type="text" name="uts" class="form-control" value="<?= $mp['uts'] ?>">
                        <?= form_error('uts', '<div class="text-danger small">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">UAS</label>
                        <input type="text" name="uas" class="form-control" value="<?= $mp['uas'] ?>">
                        <?= form_error('uas', '<div class="text-danger small">', '</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= anchor('penilaian/nilai', '<div class="btn btn-info">Kembali</div>') ?>
                </div>
            </div>

        </form>
    <?php endforeach; ?>

</div>