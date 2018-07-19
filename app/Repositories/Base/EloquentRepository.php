<?php
namespace App\Repositories\Base;

abstract class EloquentRepository implements RepositoryInterface
{
  /**
   * Propriedade do model que valos executar
   */
  protected $model;
  /**
   * Retornar lista paginada
   * @return void
   * @param int $page
   */

  public function getAll(int $page = 10)
  {
      return $this->model->paginate($page);
  }

  /**
   * Pegar um item especifico
   * @return void
   * @param int $id
   */
  public function find(int $id)
  {
    return $this->model->find($id);
  }

  /**
   * Inserir um registro no banco
   * @return void
   * @param array $data
   */
  public function create(array $data)
  {
    return $this->model->insert($data);
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
    $instance = $this->model->find($id);
    
    if(!$instance){
      return false;
    }

    return $instance->update($data);
  }

  /**
   * Deletar um registro 
   * @param int $id
   * @return void
   */
  public function delete(int $id)
   {
  //   $instance = $this->model->find($id);
  //   if (!$instance) {
  //     return false;
  //   }
  //   return $instance->delete();

    return $this->model->where('id', $id)->delete();
  }

}