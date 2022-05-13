<?php 

//Chamando o arquivo autoload
require __DIR__.'/vendor/autoload.php';


//Definindo uma constante chamada editar vaga;
define('TITULO', 'Editar vaga');



use \App\Entity\Vaga;


//Validação de GET
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consulta a vaga
$obVaga = Vaga::getVaga($_GET['id']);

//Validação da vaga
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}

//Validação do POST PHP
//Se os dados abaixo forem preenchidos no formulário, se for verdade execute os comandos abaixo.
if(isset($_POST['titulo'], $_POST['descricao'],$_POST['ativo'])){

    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->atualizar();

    echo "<script>
        alert('Dados atualizados com sucesso!');
        window.location.href='index.php?status=sucess';
    </script> ";
}



//Chamando os arquivos com o INCLUDES
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioedit.php';
include __DIR__.'/includes/footer.php';