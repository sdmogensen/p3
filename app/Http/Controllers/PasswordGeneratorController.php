<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PasswordGeneratorController extends Controller
{

    public function getPassword()
    {
        return view('passwordGenerator')->with('password', session('password'));
    }

    public function showPassword(Request $request)
    {
        $this->validate($request, [
            'numberOfWords' => 'required|numeric|min:1|max:9',
        ]);

        $numberOfWords = $request->input('numberOfWords');
        $number = $request->input('number');
        $symbol = $request->input('symbol');

        # open and load the words csv file
        $file = fopen('words', 'r');
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

        return redirect('/password-generator')->withInput()->with('password', $password);
    }

}
