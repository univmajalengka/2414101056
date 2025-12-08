<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="proses-pendaftaran-2.php" method="POST">
        <fieldset>
            <p><label>Nama:</label>
                <input type="text" name="nama" required>
            </p>

            <p><label>Alamat:</label>
                <textarea name="alamat" required></textarea>
            </p>

            <p><label>Jenis Kelamin:</label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan</label>
            </p>

            <p><label>Agama:</label>
                <select name="agama" required>
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Atheis</option>
                </select>
            </p>

            <p><label>Sekolah Asal:</label>
                <input type="text" name="sekolah_asal" required>
            </p>

            <p><input type="submit" value="Daftar" name="daftar"></p>
        </fieldset>
    </form>

</body>

</html>