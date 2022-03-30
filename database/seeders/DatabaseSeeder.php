<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Computer;
use App\Models\User;
use App\Models\Category;
use App\Models\ComputerCategory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        function import_CSV($filename, $delimiter = ',')
        {
            if (!file_exists($filename) || !is_readable($filename))
                return false;
            $header = null;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    if (!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }

        $this->call([ComputerSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([ComputerCategorySeeder::class]);

        $computerFile = public_path("/seeders/computers" . ".csv");
        $userFile = public_path("/seeders/users" . ".csv");
        $categoryFile = public_path("/seeders/categories" . ".csv");
        $computerCategoryFile = public_path("/seeders/computer_category" . ".csv");

        $computerRecords = import_CSV($computerFile);
        $userRecords = import_CSV($userFile);
        $categoryRecords = import_CSV($categoryFile);
        $computerCategoryRecords = import_CSV($computerCategoryFile);

        // add each record to the posts table in DB       
        foreach ($computerRecords as $key => $record) {
            Computer::create([
                'name' => $record['name'],
                'cpu' => $record['cpu'],
                'ram' => $record['ram'],
                'gpu' => $record['gpu'],
                'storage' => $record['storage'],
                'image' => $record['image'],
                'price' => $record['price'],
            ]);
        }

        foreach ($userRecords as $key => $record) {
            User::create([
                'name' => $record['name'],
                'email' => $record['email'],
                'password' => bcrypt($record['password']),
                'role' => $record['role'],
                'balance' => $record['balance'],
            ]);
        }

        foreach ($categoryRecords as $key => $record) {
            Category::create([
                'name' => $record['name'],
                'description' => $record['description'],
            ]);
        }

        foreach ($computerCategoryRecords as $key => $record) {
            ComputerCategory::create([
                'category_id' => $record['category_id'],
                'computer_id' => $record['computer_id'],
            ]);
        }
    }
}
