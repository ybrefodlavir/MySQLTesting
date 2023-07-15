<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::insert([
            //INSERT
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama dosen.Masukkan data berikut ke dalam tabel dosen : [kode_dosen : 12345, nama : Samsul, keahlian : Database, no_telepon : 6281234567]",
                'type' => Question::$InsertSingle,
                'validation_statement' => '{"tableName":"dosen", "selectRaw":"kode_dosen,nama,keahlian,no_telepon", "whereRaw": "kode_dosen=12345"}',
                'validation_value' => '{"kode_dosen":12345,"nama": "Samsul","keahlian": "Database","no_telepon": 6281234567}',
                'difficulty' => Question::$Easy,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama mahasiswa, Masukkan data berikut ke dalam tabel mahasiswa : [nim : 192345, nama : Samsudin, jurusan : TI, no_telepon: 62812345678], [nim : 195432, nama : Burhan, jurusan : Mesin, no_telepon: 62818765432]",
                'type' => Question::$InsertMultiple,
                'validation_statement' => '{"tableName":"mahasiswa", "selectRaw":"nim,nama,jurusan,no_telepon", "whereRaw": "nim IN (192345,195432)"}',
                'validation_value' => '[{"nim":192345,"nama": "Samsudin", "jurusan":"TI","no_telepon":62812345678},{"nim":195432,"nama": "Burhan", "jurusan":"Mesin","no_telepon":62818765432}]',
                'difficulty' => Question::$Medium,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama matakuliah. Masukkan data berikut ke dalam tabel matakuliah hanya pada kolom kode_matkul, nama_matkul : [kode_matkul : 1, nama_matkul : Mobile]",
                'type' => Question::$InsertSingleSpecific,
                'validation_statement' => '{"tableName":"matakuliah", "selectRaw":"kode_matkul,nama_matkul,jumlah_sks", "whereRaw": "kode_matkul=1", "nullKey": "jumlah_sks"}',
                'validation_value' => '{"kode_matkul":1,"nama_matkul": "Mobile"}',
                'difficulty' => Question::$Hard,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama mahasiswa_matakuliah yang berelasi dengan tabel matakuliah dan tabel mahasiswa. Masukkan data berikut ke dalam tabel mahasiswa_matakuliah [nim : 1, kode_matkul:4, nilai: 90]",
                'type' => Question::$InsertSingle,
                'validation_statement' => '{"tableName":"mahasiswa_matakuliah", "selectRaw":"nim,kode_matkul,nilai", "whereRaw": "nim=1 && kode_matkul=4"}',
                'validation_value' => '{"nim":1,"kode_matkul": 4,"nilai": 90}',
                'difficulty' => Question::$Hard,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            //UPDATE
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama dosen.Ubahlah semua value yang ada pada kolom keahlian menjadi “Pemrograman Dasar” pada tabel dosen!",
                'type' => Question::$UpdateAll,
                'validation_statement' => '{"tableName":"dosen", "selectRaw":"kode_dosen,nama,keahlian,no_telepon"}',
                'validation_value' => '[{"kode_dosen":1,"nama": "Bambang", "keahlian":"Pemrograman Dasar","no_telepon":628123456},{"kode_dosen":2,"nama": "Pamungkas", "keahlian":"PemrogramanDasar","no_telepon":628123456}]',
                'difficulty' => Question::$Easy,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama matakuliah.Ubahlah value yang memiliki nilai sks kurang dari 5 pada kolom sks menjadi bernilai 8 pada tabel matakuliah!",
                'type' => Question::$UpdateSpecific,
                'validation_statement' => '{"tableName":"matakuliah", "selectRaw":"kode_matkul,nama_matkul,jumlah_sks", "whereRaw": "jumlah_sks<9"}',
                'validation_value' => '[{"kode_matkul":2,"nama_matkul": "Jaringan", "jumlah_sks":8},{"kode_matkul":3,"nama_matkul": "AI", "jumlah_sks":8},{"kode_matkul":5,"nama_matkul": "ML", "jumlah_sks":8}]',
                'difficulty' => Question::$Medium,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama mahasiswa.Ubahlah value di tabel mahasiswa pada kolom jurusan menjadi “Elektro” pada data yang memiliki nim=1!",
                'type' => Question::$UpdateSpecific,
                'validation_statement' => '{"tableName":"mahasiswa", "selectRaw":"nim,nama,jurusan,no_telepon", "whereRaw": "nim=1"}',
                'validation_value' => '[{"nim":1,"nama": "Yono", "jurusan":"Elektro","no_telepon":812345678}]',
                'difficulty' => Question::$Medium,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            //DELETE
            [
                'question' => "7.Hapus data dimana data dalam tabel memiliki nim=null",
                'type' => Question::$DeleteSpecific,
                'validation_statement' => '{"tableName":"students", "selectRaw":"id,name,nim", "whereRaw": "nim=null"}',
                'validation_value' => null,
                'difficulty' => Question::$Medium,
                'image' => '/materials/images/gambar.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "8.Hapus semua data di dalam tabel students",
                'type' => Question::$DeleteAll,
                'validation_statement' => '{"tableName":"students"}',
                'validation_value' => null,
                'difficulty' => Question::$Medium,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            //Exam
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama matakuliah. Ubah nama mata kuliah “Basis Data” menjadi “Basis Data Dasar” pada tabel matakuliah!",
                'type' => Question::$UpdateSpecific,
                'validation_statement' => '{"tableName":"matakuliah", "selectRaw":"kode_matkul,nama_matkul,jumlah_sks", "whereRaw": "kode_matkul=6"}',
                'validation_value' => '[{"kode_matkul":6,"nama_matkul": "Basis Data Dasar", "jumlah_sks":6}]',
                'difficulty' => Question::$Medium,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama mahasiswa_matakuliah. Ubah value nilai dan kode_matkul menjadi [nilai:100,kode_matkul:6] dimana data tersebut memiliki nim=2 pada tabel mahasiswa_matakuliah!",
                'type' => Question::$UpdateSpecific,
                'validation_statement' => '{"tableName":"mahasiswa_matakuliah", "selectRaw":"nim,kode_matkul,nilai", "whereRaw": "nim=2"}',
                'validation_value' => '[{"nim":2,"kode_matkul": 6, "nilai":100}]',
                'difficulty' => Question::$Medium,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama mahasiswa, Masukkan data berikut ke dalam tabel mahasiswa : [nim : 3, nama : Samsudin, jurusan : TI, no_telepon: 62812345678], [nim : 4, nama : Burhan, jurusan : Mesin, no_telepon: 62818765432]",
                'type' => Question::$InsertMultiple,
                'validation_statement' => '{"tableName":"mahasiswa", "selectRaw":"nim,nama,jurusan,no_telepon", "whereRaw": "nim IN (3,4)"}',
                'validation_value' => '[{"nim":3,"nama": "Samsudin", "jurusan":"TI","no_telepon":62812345678},{"nim":4,"nama": "Burhan", "jurusan":"Mesin","no_telepon":62818765432}]',
                'difficulty' => Question::$Medium,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Perhatikan susunan tabel diatas! Terdapat sebuah tabel yang bernama dosen. Masukkan data berikut ke dalam tabel dosen hanya pada kolom kode_dosen, nama_dosen : [kode_dosen : 3, nama : Taufik]",
                'type' => Question::$InsertMultiple,
                'validation_statement' => '{"tableName":"mahasiswa", "selectRaw":"nim,nama,jurusan,no_telepon", "whereRaw": "nim IN (3,4)"}',
                'validation_value' => '[{"nim":3,"nama": "Samsudin", "jurusan":"TI","no_telepon":62812345678},{"nim":4,"nama": "Burhan", "jurusan":"Mesin","no_telepon":62818765432}]',
                'difficulty' => Question::$Medium,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
