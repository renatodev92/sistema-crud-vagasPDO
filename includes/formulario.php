

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>   
    </section>

    <h2 class="mt-3"><?=TITULO?></h2>

    <form method="POST">

        <div class="form-group">
            <label class="mb-2" for="titulo">Titúlo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="form-group">
            <label class="mb-2" for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="5" required\></textarea>
        </div>

        <div class="form-group">
            <label class="mt-2 mb-2">Status</label>

            <div>
                <div class="form-check form-check-inline">
                   <label class="form-control">
                       <input type="radio" name="ativo" id="ativo" value="s" checked> Ativo </input>
                   </label> 
                </div>

                <div class="form-check form-check-inline">
                   <label class="form-control">
                       <input type="radio" name="ativo" id="inativa" value="n">   Inativa</input>
                   </label> 
                </div>
            </div>
            
        </div>

        <div class="form-group">
            <button class="btn btn-success mt-4" type="submit" >Cadastrar</button>
        </div>
    </form>



</main>
