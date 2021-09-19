<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\People;
use App\Models\Upazila;
use App\Models\User;
use App\Models\VaccinationCenter;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        People::factory(30)->create();

        $user = new User();
        $user->name = 'Snow';
        $user->email = 'snow@winterfell.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('pa$$w0rd');
        $user->remember_token = Str::random(10);
        $user->save();


        foreach(lanxvax_divisions() as $division) {
            $divisionModel = new Division();
            $divisionModel->name = $division['name'];
            $divisionModel->save();
        }


        foreach(lanxvax_districts() as $district) {
            $districtModel = new District();
            $districtModel->name = $district['name'];
            $districtModel->division_id = $district['division_id'];
            $districtModel->save();
        }


        foreach(lanxvax_upazilas() as $upazila) {
            $upazilaModel = new Upazila();
            $upazilaModel->name = $upazila['name'];
            $upazilaModel->district_id = $upazila['district_id'];
            $upazilaModel->save();
        }


        foreach(lanxvax_categories() as $category) {
            $categoryModel = new Category();
            $categoryModel->name = $category['name'];
            $categoryModel->min_age = $category['min_age'];
            $categoryModel->save();
        }


        $available_vaccines = ['Pfizer', 'Moderna', 'AstraZeneca', 'Sinopharm', 'Sputnik V'];
        foreach($available_vaccines as $available_vaccine) {
            $vaccine = new Vaccine();
            $vaccine->name = $available_vaccine;
            $vaccine->save();
        }


        VaccinationCenter::factory(30)->create();
    }
}
