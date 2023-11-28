<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "yusharnadi";
        $user->email = "yust.44@gmail.com";
        $user->password = Hash::make('Mimi#080810');
        $user->save();
        $user->assignRole('Administrator');

        $user = new User();
        $user->name = "administrator";
        $user->email = "admin@monev";
        $user->password = Hash::make('monev#2023#superadmin');
        $user->save();
        $user->assignRole('Administrator');

        $evaluator = new User();
        $evaluator->name = "evaluator";
        $evaluator->email = "evaluator@monev";
        $evaluator->password = Hash::make('monev#2023#evaluator');
        $evaluator->save();
        $evaluator->assignRole('Evaluator');

        $opd = new User();
        $opd->name = "pdam";
        $opd->email = "pdam@monev";
        $opd->password = Hash::make('monev#2023#pdam');
        $opd->save();
        $opd->assignRole('Operator PDAM');
    }
}

