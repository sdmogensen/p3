<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PermissionsCalculatorController extends Controller
{

    public function getBits()
    {
        return view('encodeOctal')->with('octal', session('octal'))
                                  ->with('errors', session('errors'));
    }

    public function showOctal(Request $request)
    {
        # convert permissions bits to octal notation
        $binary = '';
        for ($i = 0; $i < 12; $i++) {
            $binary .= $request->input('input.'.$i) ? 1 : 0;
        }
        $octal = str_pad(base_convert($binary,2,8), 4, '0', STR_PAD_LEFT);

        # show any errors in permissions logic
        $errors = '';
        if ($request->input('input.0') && !$request->input('input.5')) {
            $errors .= '<div class=\'error\'>User must have execute rights for setuid to work</div>';
        }
        if ($request->input('input.1') && !$request->input('input.8')) {
            $errors .= '<div class=\'error\'>Group must have execute rights for setgid to work</div>';
        }
        if ($request->input('input.2') && !$request->input('input.11')) {
            $errors .= '<div class=\'error\'>Other must have execute rights for sticky bit to work</div>';
        }

        return redirect('/permissions-calculator')->withInput()->with('octal', $octal)
                                                               ->with('errors', $errors);
    }

    public function getOctal()
    {
        return view('decodeOctal')->with('bits', session('bits'))
                                  ->with('bitErrors', session('bitErrors'));
    }

    public function showBits(Request $request)
    {
        $this->validate($request, [
            'octalCode' => 'required|between:3,4|regex:/^[0-7]*$/',
        ]);

        # convert octal notation to permissions bits
        $octalCode = base_convert($request->input('octalCode'), 8, 10);
        $bits = '';
        for ($n = 0; $n < 12; $n++) {
            if($octalCode & (1 << $n)) {
                $bits[11-$n] = true;
            }
            else {
                $bits[11-$n] = false;
            }
        }

        # show any errors in permissions logic
        $bitErrors = '';
        if ($bits[0] && !$bits[5]) {
            $bitErrors .= '<div class=\'error\'>User must have execute rights for setuid to work</div>';
        }
        if ($bits[1] && !$bits[8]) {
            $bitErrors .= '<div class=\'error\'>Group must have execute rights for setgid to work</div>';
        }
        if ($bits[2] && !$bits[11]) {
            $bitErrors .= '<div class=\'error\'>Other must have execute rights for sticky bit to work</div>';
        }

        return redirect('/permissions-calculator/decode')->withInput()->with('bits', $bits)
                                                         ->with('bitErrors', $bitErrors);
    }

}
