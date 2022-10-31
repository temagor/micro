<?php

namespace Tests\Feature\Guest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Application guest has no info about hisself.
     *
     * @return void
     */
    public function test_has_no_info()
    {
        $response = $this->get('/api/user');

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't see user list.
     *
     * @return void
     */
    public function test_can_not_see_user_list()
    {
        $response = $this->get('/api/users');

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't store user.
     *
     * @return void
     */
    public function test_can_not_store_user()
    {
        $response = $this->get('/api/users');

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't update user.
     *
     * @return void
     */
    public function test_can_not_update_user()
    {
        /** @var User $randomUser */
        $randomUser = User::all()->random(1)->first();
        $response = $this->put('/api/users/' . $randomUser->id);

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't delete user.
     *
     * @return void
     */
    public function test_can_not_delete_user()
    {
        /** @var User $randomUser */
        $randomUser = User::all()->random(1)->first();
        $response = $this->delete('/api/users/' . $randomUser->id);

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't add car to user reserve.
     *
     * @return void
     */
    public function test_can_not_add_car_to_user_reserve()
    {
        /** @var User $randomUser */
        $randomUser = User::all()->random(1)->first();
        /** @var Car $randomCar */
        $randomCar = Car::all()->random(1)->first();
        $response = $this->put('/api/users/' . $randomUser->id . '/cars/' . $randomCar->id);

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't revome user reserved car.
     *
     * @return void
     */
    public function test_can_not_remove_user_reserved_car()
    {
        /** @var User $randomUser */
        $randomUser = User::all()->random(1)->first();
        /** @var Car $randomCar */
        $randomCar = Car::all()->random(1)->first();
        $response = $this->put('/api/users/' . $randomUser->id . '/cars/' . $randomCar->id);

        $response->assertUnauthorized();
    }

    /**
     * Application guest can't has reserved car.
     *
     * @return void
     */
    public function test_can_not_has_reserved_car()
    {
        /** @var User $randomUser */
        $randomUser = User::all()->random(1)->first();
        $response = $this->put('/api/users/' . $randomUser->id . '/cars');

        $response->assertUnauthorized();
    }
}
