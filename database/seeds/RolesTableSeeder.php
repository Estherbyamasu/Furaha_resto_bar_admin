<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'Gerant']);
        Role::create(['name'=>'Caissier']);
    }
}
