<?php

namespace App\Service;

use App\Models\CarrosModel;

class CarrosService

{
    public function create(array $dados)
    {
        $user = CarrosModel::create([
            'carro'=> $dados['carro'],
            'placa'=> $dados['placa'],
            'modelo'=> $dados['modelo'],
            'ano'=> $dados['ano'],
            'valor'=>$dados['valor'],
            'tipo'=>$dados['tipo'],
            'marca'=>$dados['marca']
        ]);

        return $user;
    }

    public function getAll()
    {
        $carros = CarrosModel::All();

        return [
            'status' =>true,
            'message' => 'Pesquisa efetuada com sucesso',
            'data' => $carros
        ];
    }

    public function update(array $dados){
        $carro = CarrosModel::find($dados['id']);

        if($carro == null){
            return[
                'status'=>false,
                'message'=>'carro nao encontrado'
            ];
        }

        if(isset($dados['placa'])){
            $carro->placa = $dados['placa'];
        }

        if(isset($dados['modelo'])){
            $carro->modelo = $dados['modelo'];
        }

        if (isset($dados['ano'])){
            $carro->ano = $dados['ano'];
        }

        $carro->save();

        return [
            'status'=> true,
            'message' => 'O veiculo foi atualizado com sucesso'
        ];
    }

    public function delete ($id){
        $carro = CarrosModel::find($id);
       
        if($carro == null){
            return [
                'status'=>false,
                'message'=>'carro nao encontrado'
            ];
        }
         
        $carro->delete();

            return [
                'status'=>true,
                'message'=>'Usuario excluido com sucesso'
            ];
        

    }

    public function findById ($id){
        $carro = CarrosModel::find($id);
        
        if ($carro == null){
            return[
            'status'=>false,
            'message'=> 'carro nao encontrado'
            ];
        }

        return [
            'status'=>true,
            'message'=> 'carro encontrado',
            'data'=> $carro
        ];

    }

    public function searchByPlaca ($placa){
        $carro = CarrosModel::where('placa', 'like', '%'. $placa . '%' )->get();

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'placa nao encontrada'
            ];
        }

        return [
            'status'=>true,
            'message'=>'placa encontrada',
            'data'=> $carro
        ];
    }

    public function searchByAno ($ano){
        $carro = CarrosModel::where('ano','=', $ano)->get();  

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'ano nao encontrado'
            ];
        }

        return [
            'status'=>true,
            'message'=>'veiculo encontrado pelo ano',
            'data'=> $carro
        ];
    }

    public function searchByTipo ($tipo){
        $carro = CarrosModel::where('tipo', 'like', '%' . $tipo . '%')->get();

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'tipo do carro nao identificado'
            ];
        }

        return [
            'status'=>true,
            'message'=>'tipo do veiculo encontrado',
            'data'=>$carro
        ];
    }

    public function searchByMarca ($marca){
        $carro = CarrosModel::where('marca', '=', $marca)->get();

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'marca do carro nao identificado'
            ];
        }
        return [
            'status'=>true,
            'message'=>'marca do veiculo encontrado',
            'data'=>$carro
        ];
    }

    public function searchByModelo ($modelo){
        $carro = CarrosModel::where('modelo', '=', $modelo)->get();

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'modelo do carro nao identificado'
            ];
        }
        return [
            'status'=>true,
            'message'=>'modelo do veiculo encontrado',
            'data'=>$carro
        ];
    }

    public function searchByValor ($valor){
        $carro = CarrosModel::where('valor', '>=', $valor)->get();

        if ($carro == null){
            return [
                'status'=>false,
                'message'=>'valor nao identificado'
            ];
        }
        
            return [
                'status'=>true,
                'message'=>'valor identificado',
                'data'=>$carro
            ];
        
    }
}