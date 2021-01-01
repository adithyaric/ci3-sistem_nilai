<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Selamat Datang <b><?= $detail->nama_siswa; ?></b>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <center><img class="mb-2" src="<?= base_url('assets/uploads/') . $detail->photo; ?>" alt="" style="width:20%;"></center>
                    <tr>
                        <th>NIS</th>
                        <td><?= $detail->username; ?></td>
                    </tr>
                    <tr>
                        <th>NAMA siswa</th>
                        <td><?= $detail->nama_siswa; ?></td>
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
                        <th>Kelas</th>
                        <td><?= $detail->nama_kelas; ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>