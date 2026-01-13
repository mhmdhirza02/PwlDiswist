<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Kuliner;
use App\Models\Package;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (config('database.default') === 'sqlite') {
            \Illuminate\Support\Facades\DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        // 0. Seed Users
        \App\Models\User::truncate();
        \App\Models\User::create([
            'name' => 'Admin Diswist',
            'email' => 'diswist@gmail.com',
            'password' => bcrypt('admin123'), // Updated default password
            'role' => 'admin'
        ]);
        \App\Models\User::create([
            'name' => 'User Test',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        // 1. Seed Wisata
        Wisata::truncate();
        $wisataData = [
            ['nama' => 'Pantai Parangtritis', 'foto' => 'parangtritis.jpg', 'lokasi' => 'Bantul, Yogyakarta', 'deskripsi' => 'Pantai populer dengan pemandangan sunset yang memukau dan legenda Nyi Roro Kidul.'],
            ['nama' => 'Malioboro', 'foto' => 'malioboro.jpg', 'lokasi' => 'Kota Yogyakarta', 'deskripsi' => 'Jantung kota Yogyakarta, pusat belanja oleh-oleh, dan kuliner malam hari.'],
            ['nama' => 'Candi Prambanan', 'foto' => 'prambanan.jpg', 'lokasi' => 'Sleman, Yogyakarta', 'deskripsi' => 'Candi Hindu terbesar di Indonesia yang mempesona dengan arsitekturnya.'],
            ['nama' => 'HeHa Sky View', 'foto' => 'heha.jpg', 'lokasi' => 'Gunungkidul', 'deskripsi' => 'Restoran dan spot foto instagramable dengan pemandangan kota Jogja dari ketinggian.'],
            ['nama' => 'Obelix Hills', 'foto' => 'obelix.jpg', 'lokasi' => 'Sleman', 'deskripsi' => 'Tempat nongkrong kekinian di atas bukit dengan view sunset terbaik.'],
            ['nama' => 'Tebing Breksi', 'foto' => 'breksi.jpg', 'lokasi' => 'Sleman', 'deskripsi' => 'Bekas tambang batu kapur yang disulap menjadi destinasi wisata artistik.'],
        ];
        foreach ($wisataData as $data) {
            Wisata::create($data);
        }

        // 2. Seed Hotels
        Hotel::truncate();
        $hotelsData = [
            ['name' => 'Royal Ambarrukmo', 'price' => 'Rp 1.200.000', 'rating' => 4.9, 'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Sleman', 'description' => 'Hotel bintang 5 dengan nuansa kerajaan Jawa yang kental.'],
            ['name' => 'Marriott Yogyakarta', 'price' => 'Rp 1.500.000', 'rating' => 4.8, 'image' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Depok', 'description' => 'Kemewahan modern dengan akses langsung ke Hartono Mall.'],
            ['name' => 'Hyatt Regency', 'price' => 'Rp 1.100.000', 'rating' => 4.7, 'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Ngaglik', 'description' => 'Resort mewah dengan lapangan golf dan taman tropis yang luas.'],
            ['name' => 'Sheraton Mustika', 'price' => 'Rp 950.000', 'rating' => 4.6, 'image' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Maguwoharjo', 'description' => 'Hotel bergaya resor dekat bandara dengan kolam renang laguna.'],
            ['name' => 'Harper Malioboro', 'price' => 'Rp 850.000', 'rating' => 4.7, 'image' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Malioboro', 'description' => 'Hotel modern strategis hanya beberapa langkah dari Jalan Malioboro.'],
            ['name' => 'The Phoenix Hotel', 'price' => 'Rp 1.350.000', 'rating' => 4.8, 'image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'location' => 'Jetis', 'description' => 'Hotel heritage butik yang memadukan budaya Jawa dan Eropa.'],
        ];
        foreach ($hotelsData as $data) {
            Hotel::create($data);
        }

        // 3. Seed Kuliners
        Kuliner::truncate();
        $kulinersData = [
            ['name' => 'Gudeg Yu Djum', 'address' => 'Jl. Wijilan No. 167, Panembahan, Kraton', 'category' => 'Tradisional', 'rating' => 4.9, 'image' => 'https://images.unsplash.com/photo-1628406786967-02450ba866b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 25.000', 'description' => 'Gudeg kering legendaris dengan cita rasa manis gurih yang khas.'],
            ['name' => 'Sate Klathak Pak Pong', 'address' => 'Jl. Sultan Agung No. 18, Jejeran II, Bantul', 'category' => 'Sate', 'rating' => 4.8, 'image' => 'https://images.unsplash.com/photo-1598514983318-2f64f8f4796c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 30.000', 'description' => 'Sate kambing muda dengan bumbu minimalis yang sangat empuk.'],
            ['name' => 'Bakmi Jowo Mbah Gito', 'address' => 'Jl. Nyi Ageng Nis No. 9, Rejowinangun', 'category' => 'Bakmi', 'rating' => 4.7, 'image' => 'https://images.unsplash.com/photo-1618449840665-9ed506d73a34?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 22.000', 'description' => 'Bakmi godog jawa dengan suasana tempat makan yang unik dan antik.'],
            ['name' => 'Kopi Joss Lik Man', 'address' => 'Kawasan Stasiun Tugu, Yogyakarta', 'category' => 'Angkringan', 'rating' => 4.6, 'image' => 'https://images.unsplash.com/photo-1517260739337-6799d2ff1fce?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 5.000', 'description' => 'Kopi hitam panas yang dicelup arang membara, sensasi unik khas Jogja.'],
            ['name' => 'House of Raminten', 'address' => 'Jl. Faridan M. Noto No. 7, Kotabaru', 'category' => 'Resto Unik', 'rating' => 4.7, 'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 40.000', 'description' => 'Restoran dengan nuansa Jawa yang kental dan menu-menu nyeleneh.'],
            ['name' => 'Gelato Tempo', 'address' => 'Jl. Prawirotaman No. 43, Yogyakarta', 'category' => 'Dessert', 'rating' => 4.8, 'image' => 'https://images.unsplash.com/photo-1557142046-c704a3adf364?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'price_range' => 'Rp 25.000', 'description' => 'Gelato homemade dengan varian rasa lokal seperti kemangi dan jahe.'],
        ];
        foreach ($kulinersData as $data) {
            Kuliner::create($data);
        }

        // 4. Seed Packages
        Package::truncate();
        $packagesData = [
            [
                'name' => 'One Day Trip Essentials',
                'price' => 'Rp 350.000',
                'duration' => '1 Hari',
                'features' => ['Transportasi AC', 'Makan Siang', 'Tiket Masuk Wisata', 'Guide Lokal', 'Air Mineral'],
                'is_popular' => false
            ],
            [
                'name' => 'Adventure 2D1N',
                'price' => 'Rp 850.000',
                'duration' => '2 Hari 1 Malam',
                'features' => ['Hotel Bintang 3', 'Transportasi AC', 'Makan 3x', 'Tiket Wisata + Jeep', 'Dokumentasi', 'Guide Profesional'],
                'is_popular' => true
            ],
            [
                'name' => 'Family Fun 3D2N',
                'price' => 'Rp 1.500.000',
                'duration' => '3 Hari 2 Malam',
                'features' => ['Hotel Bintang 4', 'Private Car', 'Makan 6x', 'Tiket Semua Wahana', 'Oleh-oleh Khas', 'Dokumentasi Premium'],
                'is_popular' => false
            ],
        ];
        foreach ($packagesData as $data) {
            Package::create($data);
        }

        // 5. Seed Artikels
        \App\Models\Artikel::truncate();
        $artikelsData = [
            ['judul' => '5 Destinasi Hidden Gem di Jogja', 'konten' => 'Berisi konten tentang destinasi tersembunyi...', 'thumbnail' => 'hiddengem.jpg'],
            ['judul' => 'Tips Hemat Liburan ke Yogyakarta', 'konten' => 'Cara liburan murah meriah tapi tetap asik...', 'thumbnail' => 'tipshemat.jpg'],
            ['judul' => 'Sejarah Malioboro yang Belum Banyak Diketahui', 'konten' => 'Mengulik sejarah jalan paling ikonik di Jogja...', 'thumbnail' => 'sejarahmalioboro.jpg'],
        ];
        foreach ($artikelsData as $data) {
            \App\Models\Artikel::create($data);
        }

        if (config('database.default') === 'sqlite') {
            \Illuminate\Support\Facades\DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
