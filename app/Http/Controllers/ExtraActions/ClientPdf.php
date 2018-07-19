<?php

namespace App\Http\Controllers\ExtraActions;

use App\Http\Controllers\Controller;

class ClientPdf extends Controller
{

  public function __invoke()
    { 
      return "estou no pdf";
    }

}