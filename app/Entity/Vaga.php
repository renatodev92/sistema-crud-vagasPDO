<?php 

//Definindo um nome para classe VAGA
namespace App\Entity;

//Chamando a dependência
use \App\Db\Database;

//Chamando a dependência de PDO
use \PDO;



class Vaga {

    /*
    * Identificador uníco da vaga
    * @var integer
    */
    public $id;

    /*
    * Titulo da vaga
    * @var string
    */
    public $titulo;


    /*
    * Descrição da vaga
    * @var string
    */
    public $descricao;

    /*
    * Define se a vaga está ativa
    * @var string('s'/'n')
    */
    public $ativo;

      /*
    * Data da publicação
    * @var string('s'/'n')
    */
    public $data;


      /*
    * Metodo responsavel por cadastrar a nova vaga no banco de dados.
    * @return boolean
    */
    

    public function cadastrar(){

        $this->data = date('Y-m-d H:i:s');
        $obDatabase = new Database('vagas');
        $this->id   = $obDatabase->insert([
                                'titulo'    => $this->titulo,
                                'descricao' => $this->descricao,
                                'ativo'     => $this->ativo, 
                                'data'      => $this->data  
        ]);

        return true;
    }

      //Método para atualizar uma vaga. UPDATE
      public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id, [
                                    'titulo'    => $this->titulo,
                                    'descricao' => $this->descricao,
                                    'ativo'     => $this->ativo, 
                                    'data'      => $this->data 
        ]);

    }

    //Método responsavel por excluir a vaga do banco de dados.
    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }




    //Metodo responsavel por obter as vagas em que constam no banco de dados.
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    }


    //Método responsavel por buscar uma vaga com base em seu ID.
    public static function getVaga($id){
        return (new Database('vagas'))->select('id ='.$id)
                                      ->fetchObject(self::class);                    
        

                                      
    }

  
    
}







