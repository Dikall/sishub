<?php

// App/Http/Controllers/QrController.php

namespace App\Http\Controllers;

use App\Models\Qr;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QrController extends Controller
{
    // Metode untuk menampilkan QR Code
    public function show($id)
    {
        $qr = Qr::findOrFail($id);
        $qrCode = QrCode::size(250)->generate($qr->url);
    
        return view('show', compact('qrCode', 'qr'));
    }
}
