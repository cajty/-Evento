<?php

namespace Database\Factories;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;
    public function definition(): array
    {
        $user = User::where('role_id', 2)->inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date,
            'location' => $this->faker->address,
            'places' => $this->faker->randomNumber(2),
            'active_status' => $this->faker->boolean,
            'automatic' => $this->faker->boolean,
            'orga_id' => $user->id,
            'catg_id' => $category->id,
        ];
    }
}
