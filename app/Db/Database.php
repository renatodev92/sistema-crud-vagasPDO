<?php 


//Definindo a namespace da CLASSE
namespace App\Db;

//Chamando a PDO como dependência dessa classe.

use \PDO;
use \PDOException;

//Criando a classe Database
class Database{
    
    //HOST de conexão com o banco de dados.
    const HOST = 'localhost';

    //Nome do banco de dados
    const NAME = 'vagas_io';

    //Usuário do banco de dados
    const USER = 'root';

    //Senha do banco de dados
    const PASS = '';

    //Nome da tabela no banco de dados a ser  manipulado.
    private $table;

    //Vai ser uma instancia de PDO, que é um grupo de classe que podemos acessar diversos banco de dados. Facilita muita na portabilidade.
    //@var PDO;
    private $connection;


    //Define a tabela e instância a conexão.
    //@var string;
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /* Método responsavel por criar uma conexão com o Banco de Dados.
    */

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []) {
        try{
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           return $statement;
        }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
        }
    }

    //Método responsavel por inserir os dados no banco
    public function insert($values) {

        //Dados da QUERY
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields), '?');

        //echo print_r($binds);

        //Monta a QUERY
        $query = 'INSERT INTO '.$this->table. ' ('.implode(',',$fields).') VALUES('.implode(',',$binds).')';

        //Executa o insert
        $this->execute($query,array_values($values)); 


        //Retorna o ID inserido.
        return $this->connection->lastInsertId();
        /*      
        echo $query;
        exit; */
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '    .$where : '';
        $order = strlen($order) ? 'ORDER BY ' .$order : '';
        $limit = strlen($limit) ? 'LIMIT '    .$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //Executa a QUERY
        return $this->execute($query);

    }


    //Método responsável por atualizações no banco de dados
    public function update($where,$values){
     
    //Dados da QUERY
    $fields = array_keys($values);


    //Monta QUERY    
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
  /*   echo "<pre>";
    echo $query;
    echo "<pre>";
    exit; */


    //Executar a query
    $this->execute($query,array_values($values));

    return true;
    }   

    //Metodo responsável por excluir dados do banco. 
    public function delete($where){

        //Monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //Executa a query
        $this->execute($query);

        //Return sucesso
        return true;

    }
    
}

    





?>