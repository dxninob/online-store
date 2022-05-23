<?php

namespace App\Util;

use App\Interfaces\DownloadPDF;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class DownloadOrder implements DownloadPDF
{

    public function downloadPDF($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);
        return $pdf->download('Order ' . $id . '.pdf');
    }
}
