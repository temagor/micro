<?php

namespace Tests\Feature\Guest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * Application guest can see car list.
     *
     * @return void
     */
    public function test_guest_can_see_car_list()
    {
        $response = $this->get('/api/cars');

        $response->assertStatus(200);
    }

    /**
     * Application guest can see car.
     *
     * @return void
     */
    public function test_guest_can_see_car()
    {
        $randomCarId = 1;
        $response = $this->get('/api/cars/' . $randomCarId);

        $response->assertStatus(200);
    }

    /**
     * Application guest can't store car.
     *
     * @return void
     */
    public function test_guest_can_not_store_car()
    {
        $response = $this->post('/api/cars', ['name' => 'new car model']);

        $response->assertForbidden();
    }

    /**
     * Application guest can't update car.
     *
     * @return void
     */
    public function test_guest_can_not_update_car()
    {
        $randomCarId = 1;
        $response = $this->put('/api/cars/' . $randomCarId);

        $response->assertForbidden();
    }

    /**
     * Application guest can't delete car.
     *
     * @return void
     */
    public function test_guest_can_not_delete_car()
    {
        $randomCarId = 1;
        $response = $this->delete('/api/cars/' . $randomCarId);

        $response->assertForbidden();
    }

    /**
     * Application guest can't reserve car.
     *
     * @return void
     */
    public function test_guest_can_not_reserve_car()
    {
        $randomUserId = 1;
        $randomCarId = 1;
        $response = $this->put('/api/users/' . $randomUserId . '/car');

        $response->assertForbidden();
    }
}
