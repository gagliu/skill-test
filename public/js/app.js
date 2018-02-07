$(document).ready(function () {
    updateProductsTable();

    //Send products
    $('#product-form').submit(function (e) {
        e.preventDefault();
        var productForm = $('#product-form');
        var formAction = productForm.attr('action');
        var action = productForm.find('[type="submit"]').attr('action');
        if (action == 'update') {
            var type = 'PUT';
        } else {
            var type = 'POST';
        }
        $.ajax({
            dataType: 'json',
            type: type,
            url: formAction,
            data: productForm.serialize(),
            success: function (response) {
                $(productForm)[0].reset();
                updateProductsTable();
                showMessage(response.message, 'success');
            }, error: function (response) {
                handleAjaxErrors(response);
            }
        });
        return false;
     });


     $(document).on('click','.edit-product', function (e) {
        e.preventDefault();
        var data = $(this).attr('data');
        data = JSON.parse(data);
        var formAction =  $(this).attr('data-url');
        var productForm = $('#product-form');
        productForm.attr('action', formAction);
        productForm.find('[name="name"]').val(data.name);
        productForm.find('[name="quantity"]').val(data.quantity);
        productForm.find('[name="price"]').val(data.price);
        productForm.find('[type="submit"]').attr('action', 'update');

        productForm.find('.cancel-edition').show();
     });

      $('.cancel-edition').click(function (e) {
          var productForm = $('#product-form');
          productForm.attr('action', productForm.attr('data-default-action'));
          productForm.find('[type="submit"]').attr('action', 'create');
          productForm.find('.cancel-edition').hide();
          $(productForm)[0].reset();
      });
});

function showMessage(message, type) {
  $.notify(message, type);
}

//Helpers
//Update Products Table
function updateProductsTable() {
    $.ajax({
        url: '/product',
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {
            $('#products-container').html(response.data)
        }, error: function (response) {
          handleAjaxErrors(response);
        }
    });
}

function handleAjaxErrors(response) {
    if (response.status == 422) {
        var errorsList = '<ul>';
        var json = JSON.parse(response.responseText);
        $.each(json.errors, function (index, element) {
          showMessage(element, 'danger');
        });
    } else {
        showMessage('Something went wrong, please try again.', 'danger');
    }
}
