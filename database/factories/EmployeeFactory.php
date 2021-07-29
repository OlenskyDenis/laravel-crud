<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender_types = collect(['male','female']);
        $gender = $gender_types->random();

        $name = $this->faker->firstName($gender);
        $surname = $this->faker->lastName($gender);
        
        $salary = $this->faker->numberBetween(500, 1000);

        $department_list = 
        [
            'Operations',
            'Finance',
            'Sales',
            'Human Resource',
            'Purchase',
        ];

        $departments = collect([]);
        $department_cout = random_int(1,3);
        for($i = 0; $i < $department_cout; $i++){
            $departments->push($department_list[array_rand($department_list)]);
        }
        
        return [
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $name,
            'gender' => $gender,
            'salary' => $salary,
            'departments' => json_encode($departments),
            'created_at' => now(),
        ];
    }
}
