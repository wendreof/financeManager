<?php

use Faker\Provider\Base;
use Phinx\Seed\AbstractSeed;

class CategoryCostSeeder extends AbstractSeed
{
    const NAMES = [
        'Telefone',
        'Água',
        'Escola',
        'Cartão',
        'LUZ',
        'IPVA',
        'Imposto de Renda',
        'Gasolina',
        'Vestuário',
        'Entretenimento',
        'Reparos'
    ];

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $faker->addProvider($this);
        $categoryCosts = $this->table('category_costs');
        $data = [];
        foreach (range(1,20) as $value)
        {
            $data[] = [

                    'name' => $faker->categoryName(),
                    'user_id' => rand(1,4),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $categoryCosts->insert($data)->save();

    }

    public function categoryName()
    {
        return Base::randomElement(self::NAMES);
    }
}
