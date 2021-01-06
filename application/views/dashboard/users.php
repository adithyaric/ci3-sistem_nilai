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
                </table>
            </div>
        </div>
    </div>
</div>