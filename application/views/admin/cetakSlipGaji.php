<!DOCTYPE html>
<html>

<head>

    <title><?= $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>PT. INDONESIA BANGKIT</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width:5px; color:black">
    </center>



    <?php foreach ($potongan as $p) {
        $potongan = $p->jml_potongan;
    } ?>

    <?php $no = 1;
    foreach ($print_slip as $ps) : ?>

        <?php $potongan_gaji = $ps->alpha * $potongan ?>

        <table style="width: 100%">
            <tr>
                <td width='20%'>Nama Pegawai</td>
                <td width="2%">:</td>
                <td><?= $ps->nama_pegawai ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $ps->nik ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $ps->nama_jabatan ?></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 0, 2) ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 2, 4) ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped mt-3">
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td>Rp. <?= number_format($ps->gaji_pokok, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tunjangan Transportasi</td>
                <td>Rp. <?= number_format($ps->tj_transport, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td>Rp. <?= number_format($ps->uang_makan, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Potongan</td>
                <td>Rp. <?= number_format($potongan_gaji, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Total Gaji</th>
                <th>Rp. <?= number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $potongan_gaji, 0, ',', '.') ?></th>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td></td>
                <td>
                    <p>Pegawai</p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $ps->nama_pegawai ?></p>
                </td>

                <td width="200px">
                    <p>Pekanbaru, <?= date("d M Y") ?> <br> Finance </p>
                    <br>
                    <br>
                    <p>_____________________________</p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>