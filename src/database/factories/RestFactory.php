<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use App\Models\Rest;

class RestFactory extends Factory
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
            'start'=>$dummyDate->format('Y-m-d H:i:s'),
            'end'=>$dummyDate->modify('+1hour')->format('Y-m-d H:i:s'),
            'Attendance_id'=>function() {
                return Attendance::factory()->create()->id;
            },
        ];
    }
}
