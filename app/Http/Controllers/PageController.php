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
        return view('userGenerator', compact('users', 'numberOfUsers', 'birthdate', 'profile'));
    }

    public function getPasswordGenerator()
    {
        return view('passwordGenerator');
    }

    public function postPasswordGenerator(Request $request)
    {
        $this->validate($request, [
            'numberOfWords' => 'required|numeric|min:1|max:9',
        ]);

        $numberOfWords = $request->input('numberOfWords');
        $number = $request->input('number');
        $symbol = $request->input('symbol');
        $file = fopen("words", "r");

        $words = [];
        $i = 0;
        while (($data = fgetcsv($file)) !== false) {
            $words[$i] = $data[0];
            $i++;
        }
        fclose($file);

        $password = '<p class=\'password\'>';
        $wordCount = count($words);
        for ($i = 0; $i < $numberOfWords; $i++) {
            $password .= $words[mt_rand(0, $wordCount - 1)];
            if ($i < $numberOfWords - 1) {
                $password .= '-';
            }
        }
        if ($number) {
            $password .= mt_rand(0,9);
        }
        if ($symbol) {
            $symbols = [ '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_',
            '+', '=', ';', ':', '<', '>', '?', '/', '\\', '|' ];
            $password .= $symbols[mt_rand(0, count($symbols) - 1)];
        }
        $password .= '</p>';

        return view('passwordGenerator', compact('password', 'numberOfWords', 'number', 'symbol'));
    }

}
