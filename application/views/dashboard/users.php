<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Selamat Datang <b><?= $detail->username; ?></b>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Nama Users</th>
                        <td><?= $detail->username; ?></td>
                    </tr>
                    <tr>
                        <th>EMAIL</th>
                        <td><?= $detail->email; ?></td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td><?php
                            if ($detail->level == 'wali_kelas') {
                                echo "Wali Kelas";
                            } else {
                                echo "Admin";
                            } ?></td>
                    </tr>
                    <?php
                    if ($this->session->userdata('akses') == 'wali_kelas') {
                    ?>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $detail->nama_kelas; ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>
</div>