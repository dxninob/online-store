<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Interfaces\DownloadPDF;
use App\Models\Order;
use PDF;

class PDFController extends Controller
{

    public function download($id)
    {
        $downloadPDF = app(DownloadPDF::class);
        return $downloadPDF->downloadPDF($id);
    }
}
