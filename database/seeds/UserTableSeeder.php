<?php
use Illuminate\Database\Seeder;
use FlorDeLiz\Models\Cliente;
use FlorDeLiz\Models\User;
use FlorDeLiz\Models\Role;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user = Role::where('name', 'user')->first();
        $role_client = Role::where('name', 'client')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_delivery = Role::where('name', 'delivery')->first();


        $client = new User();
        $client->name = 'Cliente';
        $client->email = 'client@flordeliz.com';
        $client->password = bcrypt('client@123');
        $client->save();
        $client->client()->save(factory(Cliente::class)->make());
        $client->roles()->attach($role_client);

//        factory(User::class)->create(function ($client) {
//            $client->name = 'Cliente';
//            $client->email = 'client@flordeliz.com';
//            $client->password = bcrypt('client@123');
//            $client->client()->save(factory(Cliente::class)->make());
//            $client->roles()->attach(Role::where('name', 'client')->first());
//        });

        factory(User::class, 11)->create()->each(function ($u) {
        $u->client()->save(factory(Cliente::class)->make());
        $u->roles()->attach(Role::where('name', 'client')->first());
    });

//        $fake = new Factory();
//
//        $user = new User();
//        $user->name = 'User';
//        $user->email = 'user@flordeliz.com';
//        $user->password = bcrypt('user@123');
//        $user->save();
//        $user->roles()->attach($user_client);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@flordeliz.com';
        $user->password = bcrypt('admin@123');
        $user->save();
        $user->roles()->attach($role_admin);





        $user = new User();
        $user->name = 'Delivery1';
        $user->email = 'delivery1@flordeliz.com';
        $user->password = bcrypt('delivery1@123');
        $user->save();
        $user->roles()->attach($role_delivery);

        $user = new User();
        $user->name = 'Delivery2';
        $user->email = 'delivery2@flordeliz.com';
        $user->password = bcrypt('delivery2@123');
        $user->save();
        $user->roles()->attach($role_delivery);
    }
}
