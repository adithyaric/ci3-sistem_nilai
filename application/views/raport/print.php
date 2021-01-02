<style>
    .TimesNewRoman {
        font-family: 'Times New Roman', Times, serif;
    }

    th {
        text-align: center;
    }
</style>
<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="container-fluid">
                <br>
                <center>
                    <h3 class="TimesNewRoman">LAPORAN HASIL PENCAPAIAN KOMPETISI PESERTA DIDIK</h3>
                    <h1 class="TimesNewRoman">SMA N 1 GRABAG</h1>
                    <h5 class="TimesNewRoman">126734, Susukan, Grabag, Kec. Grabag, Magelang, Jawa Tengah 56196 - sma1grb@sma1grb.sch.id - (0293) 3148143</h5>
                    <hr>
                    <table class="table table-hover mt-3 col-md-6">
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td><b><?= $siswa->nama_siswa; ?></b></td>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $siswa->nama_kelas; ?></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?= $siswa->username; ?></td>
                            <td>Semester </td>
                            <td>:</td>
                            <td>
                                <?php if ($semester == '1') {
                                    echo "Ganjil";
                                } else {
                                    echo "Genap";
                                } ?>
                            </td>
                        </tr>
                    </table>
                    <h5 class="TimesNewRoman"><strong>CAPAIAN HASIL BELAJAR</strong></h5>
                    <hr>
                </center>
                <table class="table table-bordered table-striped table-hover mt-3">
                    <tr>
                        <th>NO</th>
                        <th>Mata Pelajaran</th>
                        <th>KKM</th>
                        <th align="center">Nilai</th>
                        <th>Predikat</th>
                    </tr>

                    <?php
                    $no = 1;
                    $x = 0;
                    $totalRata = 0;
                    $RataRata = 0;
                    foreach ($nilai as $s) :
                        $n_mapel   = array($s['tugas'], $s['uts'], $s['uas']);
                        $sum_mapel = array_sum($n_mapel);
                        $jml_mapel = count($n_mapel);
                        $rata_rata = number_format($sum_mapel / $jml_mapel);
                        $x++; ///
                        $totalRata += $rata_rata;

                        $RataRata = number_format($totalRata / $x);
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $s['nama_mapel'] . "<br>" .
                                    "<small>" . $s['nama_guru'] . "</small>"; ?>
                            </td>
                            <td align="center"><?= $s['kkm']; ?></td>
                            <td align="center"><?= $rata_rata; ?></td>
                            <td align="center">
                                <?php
                                if ($rata_rata <= 100 && $rata_rata >= 81) {
                                    echo "A";
                                } else if ($rata_rata <= 80 && $rata_rata >= 71) {
                                    echo "B";
                                } else if ($rata_rata <= 70 && $rata_rata >= 61) {
                                    echo "C";
                                } else {
                                    echo "D";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Jumlah</td>
                        <td align="center">
                            <?php if (!empty($rata_rata)) {
                                echo $totalRata;
                            }
                            ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">Rata-rata</td>
                        <td align="center">
                            <?php if (!empty($rata_rata)) {
                                echo $RataRata;
                            }
                            ?></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>