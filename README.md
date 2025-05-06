# TP8DPBO2025C2

# JANJI
Saya Faiz Bayu Erlangga dengan NIM 2311231 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## TABEL RELASI
![image](https://github.com/user-attachments/assets/06a802cf-b55e-44e3-831d-8d2167223552)


## DESAIN PROGRAM
Tema dari pemograman ini adalah tentang data peminatan mahasiswa tingkat akhir yang sedang memilih penjurusan untuk kuliahnya, dalam data tersebut terdapat data mahasiswa seperti nama, nim, no telp, dan email, kemudian dosen dengan atribut nip, nama ,dan email, kemudian peminatan dengan nama_peminatan. Dalam data peminatan mahasiswa terdapat data peminatan dan dosen pengampunya.

Program ini merupakan penerapan MVC dalam pembuatan website untuk membangun aplikasi yang lebih terstruktur, modular, dan mudah dikelola. Adapun MVC dalam program ini adalah:

1. Model
  Model yang dibuat antara lain :
a. Mahasiswa : id, nama, nim, email, no_telp, id_peminatan (berelasi dengan tabel peminatan), id_dosen(berelasi dengan tabel dosen), fungsi yang tersedia antara lain:
- construct : koneksi database
- getAll : mengambil semua data mahasiswa pada database
- getAllDosen : mengambil semua data Dosen pada database
- getAllPeminatan : : mengambil semua data peminatan pada database
- create() : Menampilkan form tambah data Mahasiswa.
- update($id) : Memperbarui data Mahasiswa di database.
- delete($id) : Menghapus data Mahasiswa berdasarkan ID.
- getbyID : mengambil data mahasiswa berdasarkan ID.

b. Dosen : id, nama, nip, email, fungsi dalam class tersebut
- construct : koneksi database
- getAll : mengambil semua data Dosen pada database
- create() : Menampilkan form tambah data Dosen.
- update($id) : Memperbarui data Dosen di database.
- delete($id) : Menghapus data Dosen berdasarkan ID.
- getbyID : mengambil data Dosen berdasarkan ID.

c. Peminatan : id, nama_peminatan, fungsi yang tersedia
- construct : koneksi database
- getAll : mengambil semua data Peminatan pada database
- create() : Menampilkan form tambah data Peminatan.
- update($id) : Memperbarui data Peminatan di database.
- delete($id) : Menghapus data Peminatan berdasarkan ID.
- getbyID : mengambil data Peminatan berdasarkan ID.

3. View
   - create_mhs : page form untuk menambah data mahasiswa (nama, NIM, email, no_telp, peminatan, dosen pembimbing)
   - create_dosen : page form untuk menampilkan data dosen dan menambahkan data dosen (nama, NIP, email), juga terdapat tombol edit dan delete data.
   - create_peminatan : page form untuk menampilkan data peminatan dan menambahkan data peminatan, juga terdapat tombol edit dan delete data.
   - index.php : Halaman utama, bisa menampilkan menu navigasi ke halaman lain, dan page untuk menampilkan hasil join data mahasiswa dengan data dosen dan data peminatan, 
     
4. Controller
a. ControllerMhs, Menangani logika untukm enampilkan form input mahasiswa, Menyimpan data mahasiswa ke database, Mengedit & menghapus data mahasiswa, terdapat fungsi:
 __construct() : Inisialisasi model Mahasiswa dengan koneksi database.
- index() : Menampilkan semua data Mahasiswa dengan memanggil getAll pada model.
- create() : Menampilkan form tambah data Mahasiswa dengan memanggil create pada model.
- store() : Menyimpan data Mahasiswa baru ke database, dengan menyimpan data yang disubmit kemudian memanggil create pada model untuk dimasukkan ke database.
- edit($id) : Menampilkan form edit data Mahasiswa berdasarkan ID dengan memanggil getById pada model.
- update($id) : Memperbarui data Mahasiswa di database dengan memanggil update pada model.
- delete($id) : Menghapus data Mahasiswa berdasarkan ID dengan memanggil delete pada model.
  
b. ControllerDosen, terdapat fungsi:
- __construct() : Inisialisasi model Dosen dengan koneksi database.
- index() : Menampilkan semua data dosen dengan memanggil getAll pada model.
- create() : Menampilkan form tambah data dosen dengan memanggil create pada model.
- store() : Menyimpan data dosen baru ke database, dengan menyimpan data yang disubmit kemudian memanggil create pada model untuk dimasukkan ke database.
- edit($id) : Menampilkan form edit data dosen berdasarkan ID dengan memanggil getById pada model.
- update($id) : Memperbarui data dosen di database dengan memanggil update pada model.
- delete($id) : Menghapus data dosen berdasarkan ID dengan memanggil delete pada model.

c. ControllerPeminatan, Menangani logika untukm enampilkan form input mahasiswa, Menyimpan data mahasiswa ke database, Mengedit & menghapus data mahasiswa, terdapat fungsi:
 __construct() : Inisialisasi model Mahasiswa dengan koneksi database.
- index() : Menampilkan semua data Peminatan memanggil getAll pada model.
- create() : Menampilkan form tambah data Peminatan dengan memanggil create pada model.
- store() : Menyimpan data Peminatan baru ke database,  dengan menyimpan data yang disubmit kemudian memanggil create pada model untuk dimasukkan ke database.
- edit($id) : Menampilkan form edit data Peminatan berdasarkan ID dengan memanggil getById pada model.
- update($id) : Memperbarui data Peminatan di database dengan memanggil update pada model.
- delete($id) : Menghapus data Peminatan berdasarkan ID dengan memanggil delete pada model.

Semua tabel sudah diaplikasikan CRUD, jadi bisa untuk menambah data baru, mengedit ataupun menghapusnya. Setiap model berfungsi sebagai perantara langsung antara aplikasi dan database, dan menyediakan operasi CRUD (Create, Read, Update, Delete) untuk entitas yang bersangkutan. Fungsinya disiapkan agar controller bisa fokus hanya pada logika, tanpa harus mengakses database secara langsung.

## ALUR PROGRAM

Pengguna membuka aplikasi (index.php), melihat daftar peminatan mahasiswa atau menu.
Ketika menambah mahasiswa dengan klik add new, maka:
- View create_mhs.php ditampilkan
- Setelah submit, data dikirim ke ControllerMhs.php
- Controller memanggil Model/Mahasiswa.php untuk menyimpan data
- Redirect kembali ke halaman list atau konfirmasi
- Begitu pula dengan edit dan delete.
  
Begitu pula untuk dosen dan peminatan, di page tersebut sudah sekaligus tersedia untuk melihat data, menambah, mengedit ataupun mendelete data.

## DOKUMENTASI
https://github.com/user-attachments/assets/91809d0e-9cea-4d9b-8513-395f447bec49




