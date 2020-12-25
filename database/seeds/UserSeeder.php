<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
          'name' => 'Admin',
          'gender' => 'Laki-laki',
          'no_hp' => '085746689890',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('admin12345'),
          'confirm' => 'admin12345',
          'jenis' => 'admin',
          'organisasi' => 'admin',
          'posisi' => 'admin'
        ]);
        $admin->assignRole('admin');

        $penyedia_event = User::create([
          'name' => 'Penyedia Event',
          'gender' => 'Laki-laki',
          'no_hp' => '085908890900',
          'email' => 'penyedia@gmail.com',
          'password' => bcrypt('penyedia12345'),
          'confirm' => 'penyedia12345',
          'jenis' => 'penyedia event',
          'organisasi' => 'event',
          'posisi' => 'penyedia'
        ]);
        $penyedia_event->assignRole('penyedia_event');

        $user_event = User::create([
          'name' => 'User Event',
          'gender' => 'Laki-laki',
          'no_hp' => '085123456679',
          'email' => 'user@gmail.com',
          'password' => bcrypt('user12345'),
          'confirm' => 'user12345',
          'jenis' => 'user event',
          'organisasi' => 'event',
          'posisi' => 'user'
        ]);
        $user_event->assignRole('user_event');
    }
}
