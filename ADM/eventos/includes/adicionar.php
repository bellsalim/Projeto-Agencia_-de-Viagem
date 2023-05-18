<div class="modal" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar pacote</h5>
                <button class="btn btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="process.php" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" id="" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="data_ida">Data de Ida</label>
                        <input class="form-control" type="date" name="data_ida" id="">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="data_volta">Data de Volta</label>
                        <input class="form-control" type="date" name="data_volta" id="">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="duracao">Duração</label>
                        <input class="form-control" type="duracao" name="duracao" id="">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="valor">Valor do Pacote</label>
                        <input class="form-control" type="valor" name="valor" id="">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="descricao">descrição</label>
                        <input class="form-control" type="descricao" name="descricao" id="">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="disponivel">Disponível</label>
                        <input class="form-control" type="disponivel" name="disponivel" id="" required>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="adicionar">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>