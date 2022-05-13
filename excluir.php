<?php 

//Chamando o arquivo autoload
require __DIR__.'/vendor/autoload.php';


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

/* echo "<pre>";
echo print_R($obVaga);
echo "</pre>";
exit; */

//Validação do POST PHP
//Se os dados abaixo forem preenchidos no formulário, se for verdade execute os comandos abaixo.
if(isset($_POST['excluir'])){

    $obVaga->excluir();

    echo "<script>
        alert('Exclusão realizada com sucesso!');
        window.location.href='index.php?status=sucess';
    </script> ";
}



//Chamando os arquivos com o INCLUDES
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';