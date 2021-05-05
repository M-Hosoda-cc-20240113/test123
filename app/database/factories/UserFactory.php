<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $email = $this->faker->safeEmail;
        return [
            'sei' => $this->faker->unique()->firstName,
            'sei_kana' => $this->faker->unique()->firstName,
            'mei' => $this->faker->unique()->lastName,
            'mei_kana' => $this->faker->unique()->lastName,
            'email' => $email,
            'email_hash' => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'tel' => $this->generateCode(11),
            'birthday' => $this->generateCode(8),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_working' => 0,
            'remarks' => '特になし',
            'operation_start_month' => 20210801,
            'created_at' => $this->faker->dateTimeBetween('-2 months', '-1 months'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    // デフォルトは4桁です
    public function generateCode($length = 4): string
    {
        $max = pow(10, $length) - 1;                    // コードの最大値算出
        $rand = random_int(0, $max);                    // 乱数生成
        $code = sprintf('%0'. $length. 'd', $rand);     // 乱数の頭0埋め

        return $code;
    }
}
