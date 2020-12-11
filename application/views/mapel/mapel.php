<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Mata Pelajaran
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/mapel/tambah_mapel', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>') ?>

    <table class="table tabel-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>Nama Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($mapel as $mp) : ?>
            <tr>
                <td width="20px;"><?= $no++; ?></td>
                <td><?= $mp->nama_mapel; ?></td>
                <td><?= $mp->nama_guru; ?></td>
                <td width="20px"><?= anchor('administrator/mapel/update/' . $mp->id_mapel, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/mapel/delete/' . $mp->id_mapel, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>