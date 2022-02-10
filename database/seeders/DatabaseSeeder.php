<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Menus::create([
            "nama_menu" => "Ayam Geprek",
            "slug" => "ayam-geprek",
            "harga" => "15.000",
            "deskripsi" => "Ayam geprek pedis nyot nyot",
            "kategori" => 1
        ]);

        Menus::create([
            "nama_menu" => "Thai Tea",
            "slug" => "thai-tea",
            "harga" => "15.000",
            "deskripsi" => "Thai tea biasaji, cuma karena telkom yang jual jadi mahal",
            "kategori" => 2
        ]);

        Menus::create([
            "nama_menu" => "Tahu isi",
            "slug" => "tahu-isi",
            "harga" => "1.000",
            "deskripsi" => "Tahu isi biasaji, cuma karena telkom yang jual jadi mahal",
            "kategori" => 3
        ]);
    }
}
