<?php

namespace App\Http\Controllers;

use App\Models\agen;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class PdfController extends Controller
{
    public function generate(Request $request)
    {   $dompdf = new Dompdf();
        $agens =agen::all();
        $html = view('agens.pdf', ['agens'=>$agens])->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('document.pdf');


    }
}
