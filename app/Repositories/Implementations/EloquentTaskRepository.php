<?php
namespace App\Repositories\Implementations;

use App\Repositories\Base\EloquentRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use DB;
use App\Task;
class EloquentTaskRepository extends EloquentRepository implements TaskRepositoryInterface
{

  public function __construct(Task $task)
  {
    $this->model = $task;
  }

  /**
   * Metodo para buscar pelo assunto da tarefa
   * @return void
   * @param String $subject
   */
  public function getBySubject($subject)
  {
    $subject = '%'. $subject . '%';

    return $this->model
                    ->where('subject', 'like', $subject)
                    ->get();
  }


  public function getByIds(array $ids)
  {
    return $this->model
                ->whereIn('id', $ids)
                ->get();
  }
}