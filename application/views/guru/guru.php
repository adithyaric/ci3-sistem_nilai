<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Guru
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/guru/tambah_guru', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah guru</button>') ?>

    <table class="table table-striped table-hover table-borderd">
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA GURU</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($guru as $gr) : ?>
            <tr>
                <td width="20px;"><?= $no++; ?></td>
                <td><?= $gr->nip; ?></td>
                <td><?= $gr->nama_guru; ?></td>
                <td><?= $gr->alamat; ?></td>
                <td><?= $gr->email; ?></td>
                <td width="20px"><?= anchor('administrator/guru/detail/' . $gr->nip, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/guru/update/' . $gr->nip, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/guru/delete/' . $gr->nip, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>