$(document).on('click', '.add-modal', function () {
    $('.modal-title').text("Add");
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function () {
    $.ajax({
        type: 'POST',
        url: 'laptoptypes',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#name_add').val(),
            
        },
        success: function (data) {
            console.log(data);
            toastr.success('Successfully added Laptop!', 'Success Alert', {timeOut: 5000});
            $('#laptopTypeTable').append(
                "<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        },
    }).fail(function (data) {
        setTimeout(function () {
            $('#addModal').modal('show');
            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
        }, 500);
        $('#validation-errors-create').html('');
        $.each(data.responseJSON.errors, function (key, value) {
            $('#validation-errors-create').append('<div class="alert alert-danger" style="font-size: 1.5rem;">' + value + '</div');
        });
    });
});

//edit a laptop
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('Edit');
    $('#id_edit').val($(this).data('id'));
    $('#name_edit').val($(this).data('name'));
    id = $('#id_edit').val();
    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'PUT',
        url: 'laptoptypes/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#id_edit').val(),
            'name': $('#name_edit').val(),
           
        },
        success: function (data) {
            console.log(data);
            toastr.success('Successfully updated Laptop!', 'Success Alert', {timeOut: 5000});
            $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        }
    }).fail(function (data) {
        setTimeout(function () {
            $('#editModal').modal('show');
            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
        }, 500);
        $('#validation-errors-edit').html('');
        $.each(data.responseJSON.errors, function (key, value) {
            $('#validation-errors-edit').append('<div class="alert alert-danger" style="font-size: 1.5rem;">' + value + '</div');
        });
    });
});
//delete a laptop
$(document).on('click', '.delete-modal', function () {
    $('.modal-title').text('Delete');
    $('#id_delete').val($(this).data('id'));
    $('#name_delete').val($(this).data('name'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'DELETE',
        url: 'laptoptypes/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (data) {
            toastr.success('Successfully deleted Laptop!', 'Success Alert', {timeOut: 5000});
            $('.item' + data['id']).remove();
        }
    });
});