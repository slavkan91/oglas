<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $kategorije = \App\Kategorija::all();
        $korisnici = \App\User::all();
        if(count($kategorije)>0){
            foreach ($korisnici as $korisnik){
                foreach ($kategorije as $kategorija){
                    $oglas = [
                        'kategorija_id'=>$kategorija->id,
                        'user_id'=>$korisnik->id,
                        'ime'=>str_random(16),
                        'cijena'=>rand(1,10000)*100,
                        'godiste'=>rand(1990,2018),
                        'kilometraza'=>rand(0,150000),
                        'odobreno'=>rand(0,1)
                    ];
                    \App\Oglas::create($oglas);
                }
            }
        }


    }
}
