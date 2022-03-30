<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Computer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ComputerSeeder::class]);

        $table = 'computers';
        $file = public_path("/seeders/$table" . ".csv");

        $records = import_CSV($file);

        // add each record to the posts table in DB       
        foreach ($records as $key => $record) {
            Computer::create([
                'name' => $record['name'],
                'cpu' => $record['cpu'],
                'ram' => $record['ram'],
                'gpu' => $record['gpu'],
                'storage' => $record['storage'],
                'price' => $record['price'],
            ]);
        }
    }
}
