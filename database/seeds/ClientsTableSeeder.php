<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Client::insert([
            'name'  => str_random(15),
            'email' => str_random(11)."@".str_random(7). "." . str_random(3),
            'age'   => rand(0,100),
            'photo' => str_random(100),
            'user_id' => 1
        ]); */
        //usando a class factory e o metodo faker ele vai criar 3 registros cada vez que rodar o comando 
        //php artisan make:seed - Rodar composer dump-autoload antes
        factory(Client::class, 3 )->create();
    }
}
