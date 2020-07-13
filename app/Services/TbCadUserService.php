<?php

namespace App\Services;

use Exception;
use App\Entities\TbCadUser;
use App\Validators\TbCadUserValidator;
use App\Repositories\TbCadUserRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use DB;
class TbCadUserService
{

      private $repository;
      private $validator;

      public function __construct(TbCadUserRepository $repository, TbCadUserValidator $validator)
      {
          $this->repository   = $repository;
          $this->validator    = $validator;

      }


      public function store($data)
      {
        try {

              $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
              $user = $this->repository->create($data);

              $name = explode(" ",$user['name']);

              return [
                'success'     => true,
                'messages'    => [$name[0]],
                'data'        => $user,
                'type'        => ["id"],
              ];


        } catch (Exception $e) {

              switch (get_class($e)) {               
                case QueryException::class      : return['success' => false, 'messages' => $e->getMessage(), 'type'  => ["id"]];
                case ValidatorException::class  : return['success' => false, 'messages' => $e->getMessageBag()->all(), 'type'  => $e->getMessageBag()->keys()];
                case Exception::class           : return['success' => false, 'messages' => $e->getMessage()->all(), 'type'  => ["id"]];
                default                         : return['success' => false, 'messages' => $e->getMessage()->all(), 'type'  => ["id"]];
              }

        }

      }



      public function update($data)
      {
        try {

              $id = $data['id'];

              $this->validator->with($data)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
              $user = $this->repository->update($data, $id);

              $name = explode(" ",$user['name']);

              return [
                'success'     => true,
                'messages'    => [$name[0]],
                'data'        => $user,
                'type'        => [""],
              ];


        } catch (Exception $e) {

              switch (get_class($e)) {               
                case QueryException::class      : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
                case ValidatorException::class  : return['success' => false, 'messages' => $e->getMessageBag()->all(), 'type'  => $e->getMessageBag()->keys()];
                case Exception::class           : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
                default                         : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
              }

        }
      }


      public function delete($id)
      {

        try {

              
              $user = $this->repository->delete($id);

              $name = explode(" ",$user['name']);

              return [
                'success'     => true,
                'messages'    => [$name[0]],
                'data'        => $user,
                'type'        => [""],
              ];


        } catch (Exception $e) {

              switch (get_class($e)) {               
                case QueryException::class      : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
                case ValidatorException::class  : return['success' => false, 'messages' => $e->getMessageBag()->all(), 'type'  => $e->getMessageBag()->keys()];
                case Exception::class           : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
                default                         : return['success' => false, 'messages' => 'Não foi possivel cadastar o usuário!', 'type'  => $e->getMessage()];
              }

        }
            
      }

      public function find_Id($id)
      {

        try {

         $user = $this->repository->find($id)->toArray();

          return [
            'success'     => true,
            'messages'    => null,
            'data'        => $user,
            'type'        => null,
          ];


        } catch (Exception $e) {

              switch (get_class($e)) {               
                case QueryException::class      : return['success' => false, 'messages' => $e->getMessage(), 'type'  => null];
                case ValidatorException::class  : return['success' => false, 'messages' => $e->getMessageBag()->all(), 'type'  => null];
                case Exception::class           : return['success' => false, 'messages' => $e->getMessage(), 'type'  => null];
                default                         : return['success' => false, 'messages' => $e->getMessage(), 'type'  => null];
              }

        }

      }

      public function find_All(){
            $data = $this->repository->with('base')->with('Profile')->get();
            return  json_encode($data);
      }

      public function find_Autocomplete($term){

        $data =  TbCadUser::where([['name', 'LIKE', '%' . $term. '%'],['status','=','1'],['deleted_at','=', null]])->get();
        
        return  $data;
  }


}
