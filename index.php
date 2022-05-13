<?php 

//Chamando o arquivo autoload
require __DIR__.'/vendor/autoload.php';


//Chamando a classe Vagas
use \App\Entity\Vaga;

$vagas = Vaga::getVagas();


//Chamando os arquivos com o INCLUDES

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';