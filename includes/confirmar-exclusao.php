

<main>

    <h2 class="mt-3">Excluir Vaga</h2>

    <form method="POST">

        <div class="form-group">
            <p>Você deseja realmente excluir a vaga ?<br> <strong><?=$obVaga->titulo?></strong> ?</p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button class="btn btn-secondary" type="button" >Não</button>
            </a>  

            <button class="btn btn-success" type="submit" name="excluir" >Sim</button>
        </div>
    </form>



</main>
