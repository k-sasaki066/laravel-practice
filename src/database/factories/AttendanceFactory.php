<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Attendance;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dummyDate = $this->faker->datetimeThisMonth;
        return [
            'date'=>$dummyDate->format('Y-m-d'),
            'start'=>$dummyDate->format('Y-m-d H:i:s'),
            'end'=>$dummyDate->modify('+8hour')->format('Y-m-d H:i:s'),
            'user_id'=>function() {
                return User::factory()->create()->id;
            },
        ];
    }
}
