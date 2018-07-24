<?php

namespace App\Http\Controllers\ExtraActions;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientPhotoDownload extends Controller
{
    public function __invoke(Client $client)
    {
        return response()->download(

            storage_path('app/' . $client->photo)
        );
    }
}
