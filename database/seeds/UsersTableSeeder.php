<?php
use Illuminate\Database\Seeder;
use App\model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => '$2y$10$NurmYhAwt.FW.c0uSp39kepfu9/zY7p7oKKz3XOyARxJ5vVsg5/Ii',
            ]
        );

    }
}
