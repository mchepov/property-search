<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('houses')->truncate();
        $houses = $this->getCsvData();

        foreach ($houses as $house) {
            House::create($house);
        }
    }

    private function getCsvData(): array
    {
        $houseLines = explode("\n", Storage::get('property-data.csv'));
        array_shift($houseLines);

        return collect($houseLines)
            ->map(function ($line) {
                list ($title, $price, $bedrooms, $bathrooms, $storeys, $garages) = explode(',', trim($line));

                return [
                    'title' => $title,
                    'price' => (float) $price,
                    'bedrooms' => (int) $bedrooms,
                    'bathrooms' => (int) $bathrooms,
                    'storeys' => (int) $storeys,
                    'garages' => (int) $garages,
                ];
            })
            ->values()
            ->toArray();
    }
}
