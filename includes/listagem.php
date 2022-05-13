<?php
$resultados = '';
    foreach($vagas as $vaga) {
        $resultados .= '<tr>
                            <td>'.$vaga->id.'</td>
                            <td>'.$vaga->titulo.'</td>
                            <td>'.$vaga->descricao.'</td>
                            <td>'.($vaga->ativo == 's' ? 'Ativo': 'Inativo').'</td>
                            <td>'.date('d/m/Y', strtotime($vaga->data)).'</td>
                            <td>
                                <a href="editar.php?id='.$vaga->id.'">
                                    <button type="button" class="btn btn-warning"> Editar </button>
                                </a>
                                <a href="excluir.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>    
                            </td>
                        </tr>';    
                    
    } 

?>

<main>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-primary">Nova vaga</button>
        </a>   
    </section>

    <section>
        <table class="table bg-dark text-light mt-3">
            <thead class="bg-light text-dark">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>STATUS</th>
                    <th>DATA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                <?=$resultados?>
            </tbody>
        </table>

    </section>

</main>
