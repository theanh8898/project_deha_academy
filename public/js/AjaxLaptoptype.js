$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.add-modal', function () {
    $('.modal-title').text("Add");
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add_type', function () {
    $.ajax({
        type: 'POST',
        url: 'laptoptypes',
        data: {
            '_token': $('input[name=_token]').val(),
            'name_type': $('#name_type_add').val(),

        },
        success: function (data) {
            console.log(data);
            toastr.success('Successfully added Laptop!', 'Success Alert', {timeOut: 5000});
            $('#laptopTypeTable').append(
                "<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name_type + "</td><td> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name_type='" + data.name_type + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name_type='" + data.name_type + "'><span class='glyphicon glyphicon-trash'></span> Delete</button><form action='listoftype/" + data.id + "' method='get' class='navbar-form navbar-left' style='margin: 0px;padding: 0px 4px;'><div class='form-group'><button type='submit' class='btn btn-success' >Show all</button></div></form></td></tr>");
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
    $('#name_type_edit').val($(this).data('name_type'));
    id = $('#id_edit').val();
    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit_type', function () {
    $.ajax({
        type: 'PUT',
        url: 'laptoptypes/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#id_edit').val(),
            'name_type': $('#name_type_edit').val(),

        },
        success: function (data) {
            console.log(data);
            toastr.success('Successfully updated Laptop!', 'Success Alert', {timeOut: 5000});
            $('.item' + data.id).replaceWith(
                "<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name_type + "</td><td> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name_type='" + data.name_type + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name_type='" + data.name_type + "'><span class='glyphicon glyphicon-trash'></span> Delete</button><form action='listoftype/" + data.id + "' method='get' class='navbar-form navbar-left' style='margin: 0px;padding: 0px 4px;'><div class='form-group'><button type='submit' class='btn btn-success' >Show all</button></div></form></td></tr>");
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
    $('#name_delete').val($(this).data('name_type'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete_type', function () {
    $.ajax({
        type: 'DELETE',
        url: 'laptoptypes/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (id) {
            toastr.success('Successfully deleted Laptop!', 'Success Alert', {timeOut: 5000});
            $('.item' + id).remove();
        }
    });
});
