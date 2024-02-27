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
            <?php $no = 1; ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $users['nama_siswa']; ?></td>
                <td><?php echo $users['asal_sekolah']; ?></td>
                <td><?php echo $users['jk_siswa']; ?></td>
                <td><?php echo $users['nisn']; ?></td>
                <td><?php echo $users['tempat_lahir_siswa']; ?></td>
                <td><?php echo $users['tgl_lahir_siswa']; ?></td>
                <td><?php echo $users['no_hp_siswa']; ?></td>
                <td><?php echo $users['nama_guru']; ?></td>
                <td><?php echo $users['nip']; ?></td>
                <td><?php echo $users['jk_guru']; ?></td>
                <td><?php echo $users['tempat_lahir_guru']; ?></td>
                <td><?php echo $users['tgl_lahir_guru']; ?></td>
                <td><?php echo $users['no_hp_guru']; ?></td>
                <td><img src="<?= base_url('registrasi/' . $users['file_bukti']) ?>" class="img-fluid" height="50px" alt=""></td>
            </tr>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>