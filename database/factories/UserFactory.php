<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Address;
use Faker\Provider\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Api\Constants\UserStatus;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'address' => $this->faker->address,
            'phone' => $this->faker->numberBetween(373448969,399888999),
            'email' => Str::random(14) . '@test.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now()
        ];
    }
}
