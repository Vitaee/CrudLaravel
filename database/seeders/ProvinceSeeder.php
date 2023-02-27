<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $get_girne = City::find(1);
        $get_lefkosa = City::find(2);
        $get_gazimagusa = City::find(3);
        $get_guzelyurt = City::find(4);
        $get_iskele = City::find(5);
        $get_lefke = City::find(6);

        DB::table('provinces')->delete();
        $provinces = [
            ["name" => "Ağırdağ", "city_id" => $get_girne->id],
            ["name" => "Akçiçek", "city_id" => $get_girne->id],
            ["name" => "Akdeniz", "city_id" => $get_girne->id],
            ["name" => "Alemdağ", "city_id" => $get_girne->id],
            ["name" => "Alsancak", "city_id" => $get_girne->id],
            ["name" => "Arapköy", "city_id" => $get_girne->id],
            ["name" => "Dikmen", "city_id" => $get_girne->id],
            ["name" => "Taşkent", "city_id" => $get_girne->id],
            ["name" => "Bahçeli", "city_id" => $get_girne->id],
            ["name" => "Beşparmak", "city_id" => $get_girne->id],
            ["name" => "Beylerbeyi", "city_id" => $get_girne->id],
            ["name" => "Boğazköy", "city_id" => $get_girne->id],
            ["name" => "Çamlıbel", "city_id" => $get_girne->id],
            ["name" => "Çatalköy", "city_id" => $get_girne->id],
            ["name" => "Dağyolu", "city_id" => $get_girne->id],
            ["name" => "Doğanköy", "city_id" => $get_girne->id],
            ["name" => "Edremit", "city_id" => $get_girne->id],
            ["name" => "Esentepe", "city_id" => $get_girne->id],
            ["name" => "Merkez", "city_id" => $get_girne->id],
            ["name" => "Karşıyaka", "city_id" => $get_girne->id],
            ["name" => "Lapta", "city_id" => $get_girne->id],
            ["name" => "Tatlısu", "city_id" => $get_girne->id],

            ["name" => "Akıncılar", "city_id" => $get_lefkosa->id],
            ["name" => "Alayköy", "city_id" => $get_lefkosa->id],
            ["name" => "Balıkesir", "city_id" => $get_lefkosa->id],
            ["name" => "Beyköy", "city_id" => $get_lefkosa->id],
            ["name" => "Cihangir", "city_id" => $get_lefkosa->id],
            ["name" => "Çukurova", "city_id" => $get_lefkosa->id],
            ["name" => "Değirmenlik", "city_id" => $get_lefkosa->id],
            ["name" => "Demirhan", "city_id" => $get_lefkosa->id],
            ["name" => "Dilekkaya", "city_id" => $get_lefkosa->id],
            ["name" => "Düzova", "city_id" => $get_lefkosa->id],
            ["name" => "Erdemli", "city_id" => $get_lefkosa->id],
            ["name" => "Gayretköy", "city_id" => $get_lefkosa->id],
            ["name" => "Gaziler", "city_id" => $get_lefkosa->id],
            ["name" => "Gaziköy", "city_id" => $get_lefkosa->id],
            ["name" => "Gökhan", "city_id" => $get_lefkosa->id],
            ["name" => "Gönyeli", "city_id" => $get_lefkosa->id],
            ["name" => "Gürpınar", "city_id" => $get_lefkosa->id],
            ["name" => "Haspolat", "city_id" => $get_lefkosa->id],
            ["name" => "İkidere", "city_id" => $get_lefkosa->id],
            ["name" => "Kırıkkale", "city_id" => $get_lefkosa->id],
            ["name" => "Merkez", "city_id" => $get_lefkosa->id],
            ["name" => "Minareliköy", "city_id" => $get_lefkosa->id],
            ["name" => "Yenikent", "city_id" => $get_lefkosa->id],
            ["name" => "Yılmazköy", "city_id" => $get_lefkosa->id],
            ["name" => "Yiğitler", "city_id" => $get_lefkosa->id],

            ["name" => "Akdoğan", "city_id" => $get_gazimagusa->id],
            ["name" => "Akova", "city_id" => $get_gazimagusa->id],
            ["name" => "Alaniçi", "city_id" => $get_gazimagusa->id],
            ["name" => "Aslanköy", "city_id" => $get_gazimagusa->id],
            ["name" => "Beyarmudu", "city_id" => $get_gazimagusa->id],
            ["name" => "Çamlıca", "city_id" => $get_gazimagusa->id],
            ["name" => "Çayönü", "city_id" => $get_gazimagusa->id],
            ["name" => "Çınarlı", "city_id" => $get_gazimagusa->id],
            ["name" => "Dörtyol", "city_id" => $get_gazimagusa->id],
            ["name" => "Düzce", "city_id" => $get_gazimagusa->id],
            ["name" => "Geçitkale", "city_id" => $get_gazimagusa->id],
            ["name" => "Gönendere", "city_id" => $get_gazimagusa->id],
            ["name" => "Güvercinlik", "city_id" => $get_gazimagusa->id],
            ["name" => "Görneç", "city_id" => $get_gazimagusa->id],
            ["name" => "İncirli", "city_id" => $get_gazimagusa->id],
            ["name" => "Korkuteli", "city_id" => $get_gazimagusa->id],
            ["name" => "Mormenekşe", "city_id" => $get_gazimagusa->id],
            ["name" => "Mutluyaka", "city_id" => $get_gazimagusa->id],
            ["name" => "Paşaköy", "city_id" => $get_gazimagusa->id],
            ["name" => "Pınarlı", "city_id" => $get_gazimagusa->id],
            ["name" => "Pile", "city_id" => $get_gazimagusa->id],
            ["name" => "Pirhan", "city_id" => $get_gazimagusa->id],
            ["name" => "Turunçlu", "city_id" => $get_gazimagusa->id],
            ["name" => "Tuzla", "city_id" => $get_gazimagusa->id],
            ["name" => "Türkmenköy", "city_id" => $get_gazimagusa->id],
            ["name" => "Ulukışla", "city_id" => $get_gazimagusa->id],
            ["name" => "Vadili", "city_id" => $get_gazimagusa->id],
            ["name" => "Yeni Boğaziçi", "city_id" => $get_gazimagusa->id],
            ["name" => "Merkez", "city_id" => $get_gazimagusa->id],

            ["name" => "Merkez", "city_id" => $get_guzelyurt->id],
            ["name" => "Akçay", "city_id" => $get_guzelyurt->id],
            ["name" => "Gayretköy", "city_id" => $get_guzelyurt->id],
            ["name" => "Aydınköy", "city_id" => $get_guzelyurt->id],
            ["name" => "Güneşköy", "city_id" => $get_guzelyurt->id],
            ["name" => "Kalkanlı", "city_id" => $get_guzelyurt->id],
            ["name" => "Yuvacık", "city_id" => $get_guzelyurt->id],
            ["name" => "Zümrütköy", "city_id" => $get_guzelyurt->id],
            ["name" => "Yukarı Bostancı", "city_id" => $get_guzelyurt->id],
            ["name" => "Aşağı Bostancı", "city_id" => $get_guzelyurt->id],
            ["name" => "Şahinler", "city_id" => $get_guzelyurt->id],

            ["name" => "Merkez", "city_id" => $get_iskele->id],
            ["name" => "Ardahan", "city_id" => $get_iskele->id],
            ["name" => "Dipkarpaz", "city_id" => $get_iskele->id],
            ["name" => "Mehmetçik", "city_id" => $get_iskele->id],
            ["name" => "Yeni Erenköy", "city_id" => $get_iskele->id],
            ["name" => "Adaçay", "city_id" => $get_iskele->id],
            ["name" => "Ağıllar", "city_id" => $get_iskele->id],
            ["name" => "Altınova", "city_id" => $get_iskele->id],
            ["name" => "Avtepe", "city_id" => $get_iskele->id],
            ["name" => "Aygün", "city_id" => $get_iskele->id],
            ["name" => "Bafra", "city_id" => $get_iskele->id],
            ["name" => "Balalan", "city_id" => $get_iskele->id],
            ["name" => "Boltaşlı", "city_id" => $get_iskele->id],
            ["name" => "Boğaz", "city_id" => $get_iskele->id],
            ["name" => "Boğaziçi", "city_id" => $get_iskele->id],
            ["name" => "Boğaztepe", "city_id" => $get_iskele->id],
            ["name" => "Büyükkonuk", "city_id" => $get_iskele->id],
            ["name" => "Çayırova", "city_id" => $get_iskele->id],
            ["name" => "Derince", "city_id" => $get_iskele->id],
            ["name" => "Ergazi", "city_id" => $get_iskele->id],
            ["name" => "Esenköy", "city_id" => $get_iskele->id],
            ["name" => "Gelincik", "city_id" => $get_iskele->id],
            ["name" => "Cevizli", "city_id" => $get_iskele->id],
            ["name" => "Kaleburnu", "city_id" => $get_iskele->id],
            ["name" => "Kalecik", "city_id" => $get_iskele->id],
            ["name" => "Kantara", "city_id" => $get_iskele->id],
            ["name" => "Kaplıca", "city_id" => $get_iskele->id],
            ["name" => "Kilitkaya", "city_id" => $get_iskele->id],
            ["name" => "Kumyalı", "city_id" => $get_iskele->id],
            ["name" => "Kurtuluş", "city_id" => $get_iskele->id],
            ["name" => "Kuruova", "city_id" => $get_iskele->id],
            ["name" => "Kuzucuk", "city_id" => $get_iskele->id],
            ["name" => "Mersinlik", "city_id" => $get_iskele->id],
            ["name" => "Ötüken", "city_id" => $get_iskele->id],
            ["name" => "Sazlıköy", "city_id" => $get_iskele->id],
            ["name" => "Sınırüstü", "city_id" => $get_iskele->id],
            ["name" => "Sipahi", "city_id" => $get_iskele->id],
            ["name" => "Taşlıca", "city_id" => $get_iskele->id],
            ["name" => "Yeşilköy", "city_id" => $get_iskele->id],
            ["name" => "Yedikonuk", "city_id" => $get_iskele->id],

            ["name" => "Merkez", "city_id" => $get_lefke->id],
            ["name" => "Aplıç", "city_id" => $get_lefke->id],
            ["name" => "Bademliköy", "city_id" => $get_lefke->id],
            ["name" => "Bağlıköy", "city_id" => $get_lefke->id],
            ["name" => "Cengizköy", "city_id" => $get_lefke->id],
            ["name" => "Çamlıköy", "city_id" => $get_lefke->id],
            ["name" => "Denizli", "city_id" => $get_lefke->id],
            ["name" => "Doğancı", "city_id" => $get_lefke->id],
            ["name" => "Erenköy", "city_id" => $get_lefke->id],
            ["name" => "Gaziveren", "city_id" => $get_lefke->id],
            ["name" => "Gemikonağı", "city_id" => $get_lefke->id],
            ["name" => "Günebakan", "city_id" => $get_lefke->id],
            ["name" => "Kurutepe", "city_id" => $get_lefke->id],
            ["name" => "Madenliköy", "city_id" => $get_lefke->id],
            ["name" => "Ömerli", "city_id" => $get_lefke->id],
            ["name" => "Şirinköy", "city_id" => $get_lefke->id],
            ["name" => "Taşköy", "city_id" => $get_lefke->id],
            ["name" => "Taşpınar", "city_id" => $get_lefke->id],
            ["name" => "Yedidalga", "city_id" => $get_lefke->id],
            ["name" => "Yeşilırmak", "city_id" => $get_lefke->id],
            ["name" => "Yeşilyurt", "city_id" => $get_lefke->id],


        ];

        Province::insert($provinces);

    }
}
