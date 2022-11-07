<?php

namespace Tests\Feature\Guest;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // /**
    //  * Application guest has no info about hisself.
    //  *
    //  * @return void
    //  */
    // public function test_has_no_info()
    // {
    //     $response = $this->get('/api/user', ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't see user list.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_see_user_list()
    // {
    //     $response = $this->get('/api/users', ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't store user.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_store_user()
    // {
    //     $response = $this->post('/api/users', [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't update user.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_update_user()
    // {
    //     $randomUser = $this->createUsersAndGetRandomFirst();
    //     $response = $this->put('/api/users/' . $randomUser->id, [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't delete user.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_delete_user()
    // {
    //     $randomUser = $this->createUsersAndGetRandomFirst();
    //     $response = $this->delete('/api/users/' . $randomUser->id, [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't add car to user reserve.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_add_car_to_user_reserve()
    // {
    //     $randomUser = $this->createUsersAndGetRandomFirst();
    //     $randomCar = $this->createCarAndGetRandomFirst();
    //     $response = $this->put('/api/users/' . $randomUser->id . '/cars/' . $randomCar->id, [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't revome user reserved car.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_remove_user_reserved_car()
    // {
    //     $randomUser = $this->createUsersAndGetRandomFirst();
    //     $randomCar = $this->createCarAndGetRandomFirst();
    //     $response = $this->put('/api/users/' . $randomUser->id . '/cars/' . $randomCar->id, [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * Application guest can't has reserved car.
    //  *
    //  * @return void
    //  */
    // public function test_can_not_has_reserved_car()
    // {
    //     $randomUser = $this->createUsersAndGetRandomFirst();
    //     $response = $this->get('/api/users/' . $randomUser->id . '/cars', [], ['accept' => 'application/json']);

    //     $response->assertUnauthorized();
    // }

    // /**
    //  * @return User 
    //  * @throws InvalidArgumentException 
    //  */
    // private function createUsersAndGetRandomFirst(): User
    // {
    //     /** @var User $randomUser */
    //     $randomUser = User::factory(10)->create()->random(1)->first();
    //     return $randomUser;
    // }

    // /**
    //  * @return Car 
    //  * @throws InvalidArgumentException 
    //  */
    // private function createCarAndGetRandomFirst(): Car
    // {
    //     /** @var Car $randomCar */
    //     $randomCar = Car::factory(10)->create()->random(1)->first();
    //     return $randomCar;
    // }
}
