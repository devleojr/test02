
<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h1>Lista de Clientes</h1>
<button class="btn btn-primary mb-3" id="btn-add-client">Adicionar Cliente</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="client-table-body">
        <?php if (!empty($clients)) : ?>
            <?php foreach ($clients as $client) : ?>
                <tr data-id="<?php echo $client['id']; ?>">
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['phone']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-info btn-edit" data-id="<?php echo $client['id']; ?>">Editar</button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="<?php echo $client['id']; ?>">Deletar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<!-- Modal para Adicionar/Editar -->
<div class="modal fade" id="modal-client" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-client">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-client-title">Adicionar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="client-id">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" id="client-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" id="client-email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="phone" id="client-phone" class="form-control" placeholder="99-9999-9999">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-client">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
