1. Error pada file form-daftar
   error 1 : Tag DOCTYPE salah
   Penyebab: Penulisan DOCTYPE tidak sesuai standar HTML.
   Perbaikan :
   <!DOCTYPE html>
   error 2 : Tidak ada validasi input
   Perbaikan: tambahkan required pada setiap input:
   <input type="text" name="nama" required>
2. Error pada file proses-pendaftaran-2.php
   Error 1 : Variabel tidak memakai $
    Kode asli:
    sekolah = $_POST['sekolah_asal'];
    Penyebab: Variabel PHP wajib menggunakan $.
    Perbaikan:
    $sekolah = $_POST['sekolah_asal'];
    Error 2 : Salah penulisan sintaks SQL (VALUE → VALUES)
    Kode asli:
    VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah')
   Penyebab: Sintaks SQL insert harus menggunakan VALUES (bentuk jamak).
   Perbaikan:
   VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah')
