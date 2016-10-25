<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PermissionsCalculatorController extends Controller
{

    public function getPermissionBits()
    {
        return view('permissionsCalculator')->with('octal', session('octal'))
                                            ->with('errors', session('errors'));
    }

    public function showOctalNotation(Request $request)
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

}
