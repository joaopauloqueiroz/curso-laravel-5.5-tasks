<?php

namespace App\Http\Controllers\ExtraActions;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class ClientSearch extends Controller
{

  public function __invoke(TaskRepositoryInterface $taskRepository, $subject)
    { 
      return $taskRepository->getBySubject($subject);
    }

}