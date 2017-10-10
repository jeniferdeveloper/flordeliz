<?php

use FlorDeLiz\Models\OAuthClient;
use Illuminate\Database\Seeder;
use Faker\Factory;

class OAuthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//        $generator = factory(User::class, 1)->create([
//            'name' => 'User',
//            'email' => 'user@codedelivery.com',
//            'password' => bcrypt('user@123')
//        ])->each(function ($u){
//            $u->client()->save(factory(Cliente::class)->make());
//            $u->roles()->attach(Role::where('name', 'user')->first());
//        });

        //
//        factory(User::class, 10)->create()->each(function ($u) {
//            $u->client()->save(factory(Cliente::class)->make());
//            $u->roles()->attach(Role::where('name', 'client')->first());
//        });

        $fake = new Factory();



        $user = new OAuthClient();
        $user->id = 'fm_app_entrada';
        $user->secret = bcrypt('fmapp');
        $user->name = 'Weh App Controle de Entrada';
        $user->save();




    }
}
