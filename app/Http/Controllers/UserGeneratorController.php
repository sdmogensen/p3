<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Nubs\RandomNameGenerator\Alliteration;
use joshtronic\LoremIpsum;

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
        $birthdate = $request->input('birthdate');
        $profile = $request->input('profile');
        $nameGenerator = new Alliteration;
        $loremIpsum = new LoremIpsum;
        $datestart = strtotime('1920-1-1');
        $dateend = strtotime('2000-12-31');

        $users = '';

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $users .= '<div class=\'name\'>'.$nameGenerator->getName().'</div>';
            if ($birthdate) {
                $users .= '<div class=\'date\'>'.date('Y-m-d', mt_rand($datestart, $dateend)).'</div>';
            }
            if ($profile) {
            $users .= '<div class=\'profile\'>'.$loremIpsum->sentence().'</div>';
            }
        }
        return redirect('/user-generator')->withInput()->with('users', $users);
    }

}
