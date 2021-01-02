<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Selamat Datang <b><?= $detail->nama_guru; ?></b>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <center><img class="mb-2" src="<?= base_url('assets/uploads/') . $detail->photo; ?>" alt="" style="width:20%;"></center>
                    <tr>
                        <th>NIP</th>
                        <td><?= $detail->username; ?></td>
                    </tr>
                    <tr>
                        <th>NAMA GURU</th>
                        <td><?= $detail->nama_guru; ?></td>
                    </tr>
                    <tr>
                        <th>ALAMAT</th>
                        <td><?= $detail->alamat; ?></td>
                    </tr>
                    <tr>
                        <th>JENIS KELAMIN</th>
                        <td><?= $detail->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                        <th>EMAIL</th>
                        <td><?= $detail->email; ?></td>
                    </tr>
                    <tr>
                        <th>NO TELEPON</th>
                        <td><?= $detail->telp; ?></td>
                    </tr>
                    <tr>
                        <th>MATA PELAJARAN</th>
                        <td><?= $detail->nama_mapel; ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>