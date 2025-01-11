/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

$(document).ready(function () {
    
    // Clique em "Adicionar Cliente"
    $('#btn-add-client').click(function () {
        $('#modal-client-title').text('Adicionar Cliente');
        $('#client-id').val('');
        $('#client-name').val('');
        $('#client-email').val('');
        $('#client-phone').val('');
        $('#modal-client').modal('show');
    });

    // Clique em "Editar"
    $(document).on('click', '.btn-edit', function () {
        const id = $(this).data('id');
        $.ajax({
            url: '?controller=client&action=edit&id=' + id,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#modal-client-title').text('Editar Cliente');
                $('#client-id').val(response.id);
                $('#client-name').val(response.name);
                $('#client-email').val(response.email);
                $('#client-phone').val(response.phone);
                $('#modal-client').modal('show');
            },
            error: function () {
                alert('Erro ao buscar dados do cliente.');
            }
        });
    });

    // Submeter formulário 
    $('#form-client').submit(function (e) {
        e.preventDefault();
        const id = $('#client-id').val();
        const name = $('#client-name').val();
        const email = $('#client-email').val();
        const phone = $('#client-phone').val();

        let url = '?controller=client&action=store';
        if (id) {
            url = '?controller=client&action=update';
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {id, name, email, phone},
            success: function (response) {
                if (response.status === 'success') {
                    location.reload(); 
                } else {
                    alert('Erro ao salvar cliente.');
                }
            },
            error: function () {
                alert('Ocorreu um erro na requisição AJAX.');
            }
        });
    });

    // Deletar
    $(document).on('click', '.btn-delete', function () {
        if (!confirm('Deseja realmente excluir este cliente?')) {
            return;
        }
        const id = $(this).data('id');
        $.ajax({
            url: '?controller=client&action=delete',
            type: 'POST',
            dataType: 'json',
            data: {id},
            success: function (response) {
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert('Erro ao deletar cliente.');
                }
            },
            error: function () {
                alert('Ocorreu um erro na requisição AJAX.');
            }
        });
    });
});
