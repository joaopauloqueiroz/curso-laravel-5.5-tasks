<?php
namespace App\Repositories\Base;
use DB;
abstract class QueryBuilderRepository implements RepositoryInterface
{
  /**
   * Nome da tabela
   * @var String
   */
  protected $table;

  /**
   * Retornar lista paginada
   * @return void
   * @param int $page
   */
  public function getAll(int $page = 10)
  {
    return DB::table($this->table)->paginate($page);
  }

  /**
   * Pegar um item especifico
   * @return void
   * @param int $id
   */
  public function find(int $id)
  {
    return DB::table($this->table)->where('id', $id)->first();
  }

  /**
   * Inserir um registro no banco
   * @return void
   * @param array $data
   */
  public function create(array $data)
  {
    return DB::table($this->table)->insert($data);
  }

  /**
   * Atualizar um registro
   * @param int $id
   * @param array $data
   * @return void
   *
   */
  public function update(int $id, array $data)
  {
    return DB::table($this->table)->where('id', $id)->update($data);
  }

  /**
   * Deletar um registro 
   * @param int $id
   * @return void
   */
  public function delete(int $id)
  {
    return DB::table($this->table)->where('id', $id)->delete();
  }

}