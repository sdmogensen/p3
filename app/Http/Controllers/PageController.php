<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use joshtronic\LoremIpsum;
use Nubs\RandomNameGenerator\Alliteration;

class PageController extends Controller
{

    public function getLoremIpsum()
    {
        return view('loremIpsum');
    }

    public function postLoremIpsum(Request $request)
    {
        $this->validate($request, [
            'numberOfParagraphs' => 'required|numeric|min:1|max:99',
        ]);
        $numberOfParagraphs = $request->input('numberOfParagraphs');
        $loremIpsum = new LoremIpsum;
        $text = $loremIpsum->paragraphs($numberOfParagraphs,'p');
        return view('loremIpsum', compact('text', 'numberOfParagraphs'));
    }

    public function getUserGenerator()
    {
        return view('userGenerator');
    }

    public function postUserGenerator(Request $request)
    {
        $this->validate($request, [
            'numberOfUsers' => 'required|numeric|min:1|max:99',
        ]);

        $numberOfUsers = $request->input('numberOfUsers');
        $birthdate = $request->input('birthdate', false);
        $profile = $request->input('profile', false);
        $nameGenerator = new Alliteration;
        $loremIpsum = new LoremIpsum;
        $datestart = strtotime('1920-1-1');
        $dateend = strtotime('2000-12-31');
        $text = '';

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $text .= '<div class=\'name\'>'.$nameGenerator->getName().'</div>';
            if ($birthdate) {
                $text .= '<div class=\'date\'>'.date('Y-m-d', mt_rand($datestart, $dateend)).'</div>';
            }
            if ($profile) {
            $text .= '<div class=\'profile\'>'.$loremIpsum->sentence().'</div>';
            }
        }
        //return redirect('/user-generator')->withInput();
        return view('userGenerator', compact('text', 'numberOfUsers', 'birthdate', 'profile'));
    }


    //echo $generator->getName();
}
