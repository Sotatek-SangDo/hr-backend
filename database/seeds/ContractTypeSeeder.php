<?php

use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contract_typies')->truncate();

        $json = json_decode(file_get_contents(database_path('data/contractTypies.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'contract_type' => $item->contract_type
            ];
        }
        DB::table('contract_typies')->insert($data);
    }
}
