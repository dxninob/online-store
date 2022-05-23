<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\DownloadPDF;
use App\Util\DownloadOrder;

class PDFServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(DownloadPDF::class, function () {
            return new DownloadOrder();
        });
    }
}
