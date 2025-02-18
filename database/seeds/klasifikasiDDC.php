<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class klasifikasiDDC extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['id_class' => '000', 'ket' => 'Karya umum'],
            ['id_class' => '010', 'ket' => 'Bibliografi'],
            ['id_class' => '020', 'ket' => 'Ilmu perpustakaan, informasi, dan ilmu umum'],
            ['id_class' => '030', 'ket' => 'Ensiklopedia dan buku yang sangat berharga'],
            ['id_class' => '040', 'ket' => 'Kumpulan esai'],
            ['id_class' => '050', 'ket' => 'Terbitan berkala'],
            ['id_class' => '060', 'ket' => 'Organisasi dan manajemen'],
            ['id_class' => '070', 'ket' => 'Jurnalisme, penerbitan, dan berita'],
            ['id_class' => '080', 'ket' => 'Kumpulan karya dalam berbagai bentuk sastra'],
            ['id_class' => '090', 'ket' => 'Manuskrip dan buku langka'],
            ['id_class' => '100', 'ket' => 'Filsafat'],
            ['id_class' => '110', 'ket' => 'Metafisika'],
            ['id_class' => '120', 'ket' => 'Epistemologi, kausalitas, dan manusia'],
            ['id_class' => '130', 'ket' => 'Fenomena paranormal'],
            ['id_class' => '140', 'ket' => 'Sekolah filsafat tertentu'],
            ['id_class' => '150', 'ket' => 'Psikologi'],
            ['id_class' => '160', 'ket' => 'Logika'],
            ['id_class' => '170', 'ket' => 'Etika'],
            ['id_class' => '180', 'ket' => 'Filsafat kuno, abad pertengahan, dan timur'],
            ['id_class' => '190', 'ket' => 'Filsafat barat modern'],
            ['id_class' => '200', 'ket' => 'Agama'],
            ['id_class' => '210', 'ket' => 'Filsafat dan teori agama'],
            ['id_class' => '220', 'ket' => 'Alkitab'],
            ['id_class' => '230', 'ket' => 'Teologi Kristen'],
            ['id_class' => '240', 'ket' => 'Teologi moral dan devosi Kristen'],
            ['id_class' => '250', 'ket' => 'Praktek Kristen dan gereja lokal'],
            ['id_class' => '260', 'ket' => 'Sosial dan kelompok Kristen'],
            ['id_class' => '270', 'ket' => 'Sejarah Kekristenan'],
            ['id_class' => '280', 'ket' => 'Sekte dan denominasi Kristen'],
            ['id_class' => '290', 'ket' => 'Agama lain'],
            ['id_class' => '300', 'ket' => 'Ilmu Sosial'],
            ['id_class' => '310', 'ket' => 'Statistik'],
            ['id_class' => '320', 'ket' => 'Ilmu politik'],
            ['id_class' => '330', 'ket' => 'Ekonomi'],
            ['id_class' => '340', 'ket' => 'Hukum'],
            ['id_class' => '350', 'ket' => 'Administrasi publik dan ilmu militer'],
            ['id_class' => '360', 'ket' => 'Masalah sosial dan layanan sosial; asosiasi'],
            ['id_class' => '370', 'ket' => 'Pendidikan'],
            ['id_class' => '380', 'ket' => 'Perdagangan, komunikasi, dan transportasi'],
            ['id_class' => '390', 'ket' => 'Kebiasaan, etiket, dan folklor'],
            ['id_class' => '400', 'ket' => 'Bahasa'],
            ['id_class' => '410', 'ket' => 'Linguistik'],
            ['id_class' => '420', 'ket' => 'Bahasa Inggris dan Inggris Kuno (Anglo-Saxon)'],
            ['id_class' => '430', 'ket' => 'Bahasa Jerman'],
            ['id_class' => '440', 'ket' => 'Bahasa Perancis dan bahasa terkait'],
            ['id_class' => '450', 'ket' => 'Bahasa Italia, Rumania, dan bahasa terkait'],
            ['id_class' => '460', 'ket' => 'Bahasa Spanyol, Portugis, dan Galisia'],
            ['id_class' => '470', 'ket' => 'Bahasa Latin dan Italik'],
            ['id_class' => '480', 'ket' => 'Bahasa Yunani dan Helenik'],
            ['id_class' => '490', 'ket' => 'Bahasa lainnya'],
            ['id_class' => '500', 'ket' => 'Ilmu Alam dan Matematika'],
            ['id_class' => '510', 'ket' => 'Matematika'],
            ['id_class' => '520', 'ket' => 'Astronomi'],
            ['id_class' => '530', 'ket' => 'Fisika'],
            ['id_class' => '540', 'ket' => 'Kimia'],
            ['id_class' => '550', 'ket' => 'Ilmu Bumi'],
            ['id_class' => '560', 'ket' => 'Paleontologi; Paleozoologi'],
            ['id_class' => '570', 'ket' => 'Ilmu kehidupan; Biologi'],
            ['id_class' => '580', 'ket' => 'Ilmu tanaman (Botani)'],
            ['id_class' => '590', 'ket' => 'Ilmu hewan (Zoologi)'],
            ['id_class' => '600', 'ket' => 'Teknologi (Ilmu terapan)'],
            ['id_class' => '610', 'ket' => 'Kedokteran dan kesehatan'],
            ['id_class' => '620', 'ket' => 'Rekayasa dan operasi terkait'],
            ['id_class' => '630', 'ket' => 'Pertanian dan teknologi terkait'],
            ['id_class' => '640', 'ket' => 'Manajemen rumah tangga dan keluarga'],
            ['id_class' => '650', 'ket' => 'Manajemen dan hubungan publik'],
            ['id_class' => '660', 'ket' => 'Teknologi kimia'],
            ['id_class' => '670', 'ket' => 'Manufaktur'],
            ['id_class' => '680', 'ket' => 'Produk manufaktur untuk penggunaan tertentu'],
            ['id_class' => '690', 'ket' => 'Bangunan'],
            ['id_class' => '700', 'ket' => 'Kesenian'],
            ['id_class' => '710', 'ket' => 'Perencanaan dan arsitektur lansekap'],
            ['id_class' => '720', 'ket' => 'Arsitektur'],
            ['id_class' => '730', 'ket' => 'Seni patung, keramik, dan logam'],
            ['id_class' => '740', 'ket' => 'Menggambar dan seni dekoratif'],
            ['id_class' => '750', 'ket' => 'Melukis'],
            ['id_class' => '760', 'ket' => 'Seni grafis'],
            ['id_class' => '770', 'ket' => 'Fotografi dan foto komputer'],
            ['id_class' => '780', 'ket' => 'Musik'],
            ['id_class' => '790', 'ket' => 'Olahraga, permainan, dan hiburan'],
            ['id_class' => '800', 'ket' => 'Sastra'],
            ['id_class' => '810', 'ket' => 'Sastra Amerika dalam bahasa Inggris'],
            ['id_class' => '820', 'ket' => 'Sastra Inggris dan Inggris lama'],
            ['id_class' => '830', 'ket' => 'Sastra Jerman'],
            ['id_class' => '840', 'ket' => 'Sastra Perancis'],
            ['id_class' => '850', 'ket' => 'Sastra Italia, Rumania, dan Latin'],
            ['id_class' => '860', 'ket' => 'Sastra Spanyol, Portugis, dan Galisia'],
            ['id_class' => '870', 'ket' => 'Sastra Latin'],
            ['id_class' => '880', 'ket' => 'Sastra Yunani klasik'],
            ['id_class' => '890', 'ket' => 'Sastra dalam bahasa lain'],
            ['id_class' => '900', 'ket' => 'Sejarah'],
            ['id_class' => '910', 'ket' => 'Geografi dan perjalanan'],
            ['id_class' => '920', 'ket' => 'Biografi, silsilah, dan insignia'],
            ['id_class' => '930', 'ket' => 'Sejarah dunia kuno (hingga sekitar 499 M)'],
            ['id_class' => '940', 'ket' => 'Sejarah Eropa'],
            ['id_class' => '950', 'ket' => 'Sejarah Asia'],
            ['id_class' => '960', 'ket' => 'Sejarah Afrika'],
            ['id_class' => '970', 'ket' => 'Sejarah Amerika Utara'],
            ['id_class' => '980', 'ket' => 'Sejarah Amerika Selatan'],
            ['id_class' => '990', 'ket' => 'Sejarah daerah lain'],
        ];

        foreach ($data as $item) {
            DB::table('tb_ddc')->insert([
                'id_class' => $item['id_class'],
                'ket' => $item['ket'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
