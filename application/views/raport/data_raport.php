<div class="container-fluid">
  <center>
    <legend><strong>Raport</strong></legend>
    <table>
      <tr>
        <td>NIS</td>
        <td>: <?= $siswa->username; ?></td>
      </tr>
      <tr>
        <td>NAMA</td>
        <td>: <?= $siswa->nama_siswa; ?></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>: <?= $siswa->nama_kelas; ?></td>
      </tr>
    </table>
  </center>

  <table class="table table-bordered table-striped table-hover mt-3">
    <tr>
      <th>NO</th>
      <th>MATA Pelajaran</th>
      <th align="center">TUGAS</th>
      <th align="center">UTS</th>
      <th align="center">UAS</th>
      <th align="center">Total</th>
    </tr>

    <?php
    $no = 1;

    foreach ($nilai as $s) :
      $total = 0;
      $total = $s['tugas'] + $s['uts'] + $s['uas'];

    ?>

      <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['nama_mapel']; ?></td>
        <td align="center"><?= $s['tugas']; ?></td>
        <td align="center"><?= $s['uts']; ?></td>
        <td align="center"><?= $s['uas']; ?></td>
        <td align="center"><?= $total; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>

</div>