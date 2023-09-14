<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FakerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function faker_is_failing(): void
    {
        $count = 90;

        for ($i = 0; $i < $count; $i++) {
            // Ошибку выдает из-за одинаковых сгенерированных слов,
            // тк на уже имеющийся индекс массива значение перезаписывается
            // таким образом кол-во элементов в нем не увеличивается
            // и выходит, что кол-во итерации было больше, чем элементов в массиве
            $data[$this->faker->unique()->word()] = User::factory()->make();
        }

        // и, соответственно тут вернет ошибку, тк значения не совпадут
        $this->assertCount($count, $data);
    }
}
