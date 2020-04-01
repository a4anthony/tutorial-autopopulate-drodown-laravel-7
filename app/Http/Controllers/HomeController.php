<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;

class HomeController extends Controller
{
    /**
     * Display page with all countries
     *
     * @return Illuminate\View\View
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function index()
    {
        $countries = Country::all();
        return view('welcome', ['countries' => $countries]);
    }
    /**
     * Retrieves state details from database
     *
     * @param int $countryId 
     *
     * @return Illuminate\Http\Response
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function getState($countryId)
    {
        if (!$countryId) {
            $html = '<option value="">' . trans('global.pleaseSelect') . '</option>';
        } else {
            $html = '<option value="' . '">' . '--- Select Sub Category ---' . '</option>';
            $states = State::where('country_id', $countryId)->get();

            foreach ($states as $state) {
                $html .= '<option value="' . $state->id . '">' . $state->name . '</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
