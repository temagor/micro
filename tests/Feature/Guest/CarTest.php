<?php

namespace Tests\Feature\Guest;

use App\Http\Resources\CarCollection;
use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Application guest can see car list.
     *
     * @return void
     */
    public function test_guest_can_see_car_list()
    {
        Car::factory(10)->create();
        $response = $this->get('/api/cars');
        $response->assertContent((new CarCollection(Car::all()))->toJson());
        $response->assertStatus(200);
    }

    /**
     * Application guest can see car.
     *
     * @return void
     */
    public function test_guest_can_see_car()
    {
        $randomCar = $this->createCarAndGetRandomFirst();
        $response = $this->get('/api/cars/' . $randomCar->id);

        $response->assertJsonStructure(
            [
                'data' => ['id', 'model']
            ],
            $response->json()
        );
        $response->assertStatus(200);
    }

    /**
     * Application guest can't store car.
     *
     * @return void
     */
    public function test_guest_can_not_store_car()
    {
        $response = $this->post(
            '/api/cars',
            ['name' => 'new car model'],
            ['accept' => 'application/json']
        );

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't update car.
     *
     * @return void
     */
    public function test_guest_can_not_update_car()
    {
        $randomCar = $this->createCarAndGetRandomFirst();
        $response = $this->put(
            '/api/cars/' . $randomCar->id,
            ['model' => 'enother model'],
            ['accept' => 'application/json']
        );

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't delete car.
     *
     * @return void
     */
    public function test_guest_can_not_delete_car()
    {
        $randomCar = $this->createCarAndGetRandomFirst();
        $response = $this->delete(
            '/api/cars/' . $randomCar->id,
            [],
            ['accept' => 'application/json']
        );

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't reserve car.
     *
     * @return void
     */
    // public function test_guest_can_not_reserve_car()
    // {
    //     $randomUserId = 1;
    //     $randomCarId = 1;
    //     $response = $this->put('/api/users/' . $randomUserId . '/car');

    //     $response->assertUnauthorized();
    // }

    /**
     * @return Car 
     * @throws InvalidArgumentException 
     */
    private function createCarAndGetRandomFirst(): Car
    {
        Car::factory(10)->create();
        /** @var Car $randomCar */
        $randomCar = Car::all()->random(1)->first();
        return $randomCar;
    }
}
