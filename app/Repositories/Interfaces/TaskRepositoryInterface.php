<?php
namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface 
{
  /**
   * essa interface e para os metodos que não vão estar disponiveis para as outras classes
   * apenas para a instancia da classe TaskRepository
   * Por que o QueryBuilder vai ser para todos
   */
  public function getBySubject($subject);
  public function getByIds(array $ids);
}