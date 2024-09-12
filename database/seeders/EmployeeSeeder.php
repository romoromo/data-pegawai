<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		DB::table('employees')->insert([
			['name' => 'John Doe', 'position' => 'Manager', 'salary' => 8000],
			['name' => 'Jane Smith', 'position' => 'Developer', 'salary' => 6000],
		// Tambahkan data dummy lainnya
]);

    }
}
