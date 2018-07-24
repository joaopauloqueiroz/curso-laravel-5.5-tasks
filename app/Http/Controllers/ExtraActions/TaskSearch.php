<?php

namespace App\Http\Controllers\ExtraActions;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskSearch extends Controller
{
    public function __invoke(TaskRepositoryInterface $taskRepository, Request $request)
    {
        return $taskRepository->getBySubject($request->search);
    }
}
