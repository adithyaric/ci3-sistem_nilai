<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> Detail Guru
    </div>

    <table class="table table-bordered table-hover table-striped">

        <?php foreach ($detail as $dt) : ?>
            <img class="mb-2" src="<?= base_url('assets/uploads/') . $dt->photo; ?>" alt="" style="width:20%;">
            <tr>
                <th>NIP</th>
                <td><?= $dt->username; ?></td>
            </tr>
            <tr>
                <th>NAMA GURU</th>
                <td><?= $dt->nama_guru; ?></td>
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
                <th>EMAIL</th>
                <td><?= $dt->email; ?></td>
            </tr>
            <tr>
                <th>NO TELEPON</th>
                <td><?= $dt->telp; ?></td>
            </tr>
            <tr>
                <th>LEVEL</th>
                <td><?php if ($dt->level == 'guru') {
                        echo "Guru";
                    } else {
                        echo "Wali Kelas";
                    } ?> : <?= $dt->nama_kelas; ?></td>
            </tr>
            <tr>
                <th>MATA PELAJARAN</th>
                <td><?= $dt->nama_mapel; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= anchor('administrator/guru', '<div class="btn btn-info btn-sm mb-5">Kembali</div>') ?>

</div>