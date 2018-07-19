<?php
namespace App\Repositories\Implementations;

use App\Repositories\Base\QueryBuilderRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use DB;

class TaskRepository extends QueryBuilderRepository implements TaskRepositoryInterface
{
  /**
   * Nome da tabela
   * @var String
   */
  protected $table = 'tasks';

  /**
   * Metodo para buscar pelo assunto da tarefa
   * @return void
   * @param String $subject
   */
  public function getBySubject($subject)
  {
    $subject = '%'. $subject . '%';

    return DB::table($this->table)
                    ->where('subject', 'like', $subject)
                    ->get();
  }
}