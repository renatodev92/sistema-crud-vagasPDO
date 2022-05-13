<?php 

//Chamando o arquivo autoload
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;

//Definindo uma constante chamada editar vaga;
define('TITULO', 'Cadastrar vaga');


//Validação do POST PHP
//Se os dados abaixo forem preenchidos no formulário, se for verdade execute os comandos abaixo.
if(isset($_POST['titulo'], $_POST['descricao'],$_POST['ativo'])){
    $obVaga = new Vaga;
    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->cadastrar();

    echo "<script>
        alert('Vaga cadastrada com Sucesso!');
        window.location.href='index.php?status=sucess';
    </script> ";
   /*  header('location: index.php?status=success');
    exit; */

   
}



//Chamando os arquivos com o INCLUDES
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';