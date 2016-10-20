<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use joshtronic\LoremIpsum;

class PracticeController extends Controller
{

    public function practice()
    {
        $lipsum = new LoremIpsum;
        echo '5 paragraphs: ' . $lipsum->paragraphs(5,'p');
        return;
    }

}
