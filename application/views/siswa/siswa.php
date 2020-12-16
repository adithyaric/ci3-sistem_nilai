<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Siswa
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/siswa/tambah_siswa', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah siswa</button>') ?>

    <table class="table table-striped table-hover table-borderd">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>ALAMAT</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($siswa as $gr) : ?>
            <tr>
                <td width="20px;"><?= $no++; ?></td>
                <td><?= $gr->username; ?></td>
                <td><?= $gr->nama_siswa; ?></td>
                <td><?= $gr->alamat; ?></td>
                <td width="20px"><?= anchor('administrator/siswa/detail/' . $gr->username, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/siswa/update/' . $gr->username, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/siswa/delete/' . $gr->username, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>