<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> Detail Siswa
    </div>

    <table class="table table-bordered table-hover table-striped">

        <?php foreach ($detail as $dt) : ?>
            <img class="mb-2" src="<?= base_url('assets/uploads/') . $dt->photo; ?>" alt="" style="width:20%;">
            <tr>
                <th>NIS</th>
                <td><?= $dt->username; ?></td>
            </tr>
            <tr>
                <th>NAMA siswa</th>
                <td><?= $dt->nama_siswa; ?></td>
            </tr>
            <tr>
                <th>ALAMAT</th>
                <td><?= $dt->alamat; ?></td>
            </tr>
            <tr>
                <th>JENIS KELAMIN</th>
                <td><?= $dt->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <th>KELAS</th>
                <td><?= $dt->nama_kelas; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <?= anchor('administrator/siswa', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>

</div>