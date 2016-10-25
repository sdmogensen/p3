<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Nubs\RandomNameGenerator\Alliteration;
use joshtronic\LoremIpsum;
use Faker\Factory as Faker;

class UserGeneratorController extends Controller
{

    public function getUsers()
    {
        return view('userGenerator')->with('users', session('users'));
    }

    public function showUsers(Request $request)
    {
        $this->validate($request, [
            'numberOfUsers' => 'required|numeric|min:1|max:99',
        ]);

        $numberOfUsers = $request->input('numberOfUsers');
        $company = $request->input('company');
        $birthdate = $request->input('birthdate');
        $address = $request->input('address');
        $phoneNumber = $request->input('phoneNumber');
        $email = $request->input('email');
        $profile = $request->input('profile');

        $nameGenerator = new Alliteration;

        if ($birthdate) {
            $datestart = strtotime('1920-1-1');
            $dateend = strtotime('2000-12-31');
        }
        if ($profile) {
            $loremIpsum = new LoremIpsum;
        }
        if ($company || $address || $phoneNumber || $email) {
            $faker = Faker::create();
        }

        $users = '';

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $name = $nameGenerator->getName();
            $users .= '<div class=\'name\'>'.$name.'</div>';
            if ($company) {
                $users .= '<div class=\'company\'>'.$faker->company.'</div>';
            }
            if ($birthdate) {
                $users .= '<div>DOB: '.date('Y-m-d', mt_rand($datestart, $dateend)).'</div>';
            }
            if ($address) {
                $users .= '<div>'.$faker->address.'</div>';
            }
            if ($phoneNumber) {
                $users .= '<div>'.$faker->numerify('###-###-####').'</div>';
            }
            if ($email) {
                $users .= '<div>'.str_replace(' ', '.', strtolower($name)).'@'.$faker->domainName.'</div>';
            }
            if ($profile) {
            $users .= '<div class=\'profile\'>'.$loremIpsum->sentence().'</div>';
            }
        }
        return redirect('/user-generator')->withInput()->with('users', $users);
    }

}
