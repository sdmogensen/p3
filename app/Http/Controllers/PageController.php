<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use joshtronic\LoremIpsum;

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

    public function userGenerator()
    {
        return view('userGenerator');
    }

}
