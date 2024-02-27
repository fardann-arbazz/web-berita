<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Registrasi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Jenis Kelamin Siswa</th>
                <th>NISN</th>
                <th>Tempat Lahir Siswa</th>
                <th>Tanggal Lahir Siswa</th>
                <th>No HP Siswa</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>Jenis Kelamin Guru</th>
                <th>Tempat Lahir Guru</th>
                <th>Tanggal Lahir Guru</th>
                <th>No HP Guru</th>
                <th>File Bukti</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($registrations as $registration) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $registration->nama_siswa; ?></td>
                    <td><?php echo $registration->asal_sekolah; ?></td>
                    <td><?php echo $registration->jk_siswa; ?></td>
                    <td><?php echo $registration->nisn; ?></td>
                    <td><?php echo $registration->tempat_lahir_siswa; ?></td>
                    <td><?php echo $registration->tgl_lahir_siswa; ?></td>
                    <td><?php echo $registration->no_hp_siswa; ?></td>
                    <td><?php echo $registration->nama_guru; ?></td>
                    <td><?php echo $registration->nip; ?></td>
                    <td><?php echo $registration->jk_guru; ?></td>
                    <td><?php echo $registration->tempat_lahir_guru; ?></td>
                    <td><?php echo $registration->tgl_lahir_guru; ?></td>
                    <td><?php echo $registration->no_hp_guru; ?></td>
                    <td><img src="<?= base_url('registrasi/' . $registration->file_bukti) ?>" class="img-fluid" height="50px" alt=""></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>