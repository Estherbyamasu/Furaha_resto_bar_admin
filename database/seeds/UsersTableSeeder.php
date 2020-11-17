<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::truncate();
        // DB::table('role_user')->truncate();

        
       $admin = User::firstOrCreate([
            'id' => 1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('password')
            ]);
 
        $gerant = User::firstOrCreate([
            'id'=>2,
           'name'=>'Gerant',
           'email'=>'gerant@gmail.com',
           'password'=> Hash::make('password')
           ]);


           
           $caissier =  User::firstOrCreate([
               'id'=>3,
                'name'=>'Caissier',
                'email'=>'caissier@gmail.com',
                'password'=> Hash::make('password')
        ]);

        $adminRole= Role::where('name','admin')->first();
        $gerantRole= Role::where('name','Gerant')->first();
        $caissierRole= Role::where('name','Caissier')->first();

        $admin->roles()->sync($adminRole);
        $gerant->roles()->sync($gerantRole);
        $caissier->roles()->sync($caissierRole);
    }
}
