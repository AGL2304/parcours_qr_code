<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show()
    {
        $url = 'https://github.com/AGL2304'; // Remplace cette URL par celle que tu veux
        $qrCode = QrCode::size(300)->generate($url);

        return view('qr', compact('qrCode'));
    }
}
