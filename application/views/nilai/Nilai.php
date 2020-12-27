<body>
    <div class="container">
        <?= " id kelas " . $this->session->userdata('ses_id_kelas'); ?>
        <div class="row mt-2">
            <div class="col-12">
                <?php if (!empty($this->session->userdata('ses_id_mapel'))) : ?>
                    <div class="card">
                        <div class="card-body">
                            <?= form_open_multipart('penilaian/nilai/uploaddata'); ?>
                            <div class="form-row">
                                <div class="col-4">
                                    <?= @$this->session->flashdata('msg') ?>
                                    <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx, .xls">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                                <div class="col">
                                    <?= $mapel->nama_mapel; ?>
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                <?php endif ?>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">TUGAS</th>
                                    <th scope="col">UTS</th>
                                    <th scope="col">UAS</th>
                                    <th scope="col">MAPEL</th>
                                    <th scope="col">GURU</th>
                                    <th colspan="2">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($nilai as $n) :
                                ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $n['nis']; ?></td>
                                        <td><?= $n['tugas']; ?></td>
                                        <td><?= $n['uts']; ?></td>
                                        <td><?= $n['uas']; ?></td>
                                        <td><?= $n['id_mapel']; ?></td>
                                        <td><?= $n['id_guru']; ?></td>
                                        <td width="20px">
                                            <a onclick="deleteConfirm('<?php echo site_url('penilaian/nilai/delete/' . $n['id_nilai']) ?>')" href="#!" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>