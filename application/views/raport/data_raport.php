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
      <th>KKM</th>
      <th align="center">Nilai</th>
    </tr>

    <?php
    $no = 1;

    foreach ($nilai as $s) :
      $total = 0;
      $rata = 0;
      $total = $s['tugas'] + $s['uts'] + $s['uas'];
      $rata = $total / 3;
    ?>

      <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['nama_mapel']; ?></td>
        <td><?= $s['kkm']; ?></td>
        <td align="center"><?= $rata; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>

</div>