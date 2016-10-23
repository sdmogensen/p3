<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use joshtronic\LoremIpsum;

class LoremIpsumController extends Controller
{

    public function getText()
    {
        return view('loremIpsum')->with('text', session('text'));
    }

    public function showText(Request $request)
    {
        $this->validate($request, [
            'numberOfParagraphs' => 'required|numeric|min:1|max:99',
        ]);
        $numberOfParagraphs = $request->input('numberOfParagraphs');
        $loremIpsum = new LoremIpsum;
        $text = $loremIpsum->paragraphs($numberOfParagraphs,'p');
        return redirect('/lorem-ipsum')->withInput()->with('text', $text);
    }

}
