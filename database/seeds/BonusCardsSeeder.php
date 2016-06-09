<?php

use Illuminate\Database\Seeder;

class BonusCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BonusCard::class, 60)->create()->each(function (App\BonusCard $bonusCard) {
            $bonusCard->purchases()->saveMany(factory(App\Purchase::class, 5)->make());
        });
    }
}
