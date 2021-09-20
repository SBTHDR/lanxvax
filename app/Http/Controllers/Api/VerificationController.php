<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\People;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        if (empty($request->category_id)) {
            return "Please select a category first";
        }

        if (empty($request->id_no)) {
            return "Please select a id first";
        }

        if (empty($request->dob)) {
            return "Please select dob first";
        }

        $people = People::where('id_no', $request->id_no)->where('dob', $request->dob)->first();

        if (empty($people)) {
            return "ID Not Found";
        } else {
            $category = Category::where('id', $request->category_id)->first();

            if (empty($category)) {
                return "Category Not Found";
            } else {
                $current_age = lanxvaxAgeDifference($people->dob);

                if ($current_age >= $category->min_age) {
                    if ($people->registered) {
                        return "You are already registered";
                    } else {
                        return $people;
                    }
                } else {
                    return "Minimum age for " . $category->name . " is " . $category->min_age;
                }
            }
        }

    }
}
