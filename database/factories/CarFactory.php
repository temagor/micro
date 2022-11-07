<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    const CAR_MODELS = [
        'FE570 - HUSABERG (2012)',
        'DB7 - ASTON MARTIN (2001)',
        'SORENTO - KIA (2013)',
        'CAYMAN - PORSCHE (2008)',
        'FASTRACK FT1261 - WORKHORSE (2004)',
        'LEON - SEAT (2003)',
        'CHIEF VINTAGE FE - INDIAN (2013)',
        'Z3 - BMW (2002)',
        'SIERRA - GMC (2013)',
        'MONSTER 400 DARK - DUCATI (2002)',
        'S3 - AUDI (2002)',
        'XP DI - SEA-DOO (2003)',
        'GTI RFI - SEA-DOO (2004)',
        'SPORTSMAN 400 HO - POLARIS (2011)',
        'PICKUP - NISSAN (2003)'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => self::CAR_MODELS[array_rand(self::CAR_MODELS, 1)]
        ];
    }
}
