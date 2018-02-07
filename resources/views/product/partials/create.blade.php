<form id="product-form" action="product" data-default-action="product" method="POST">
     {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Product name:</label>
        <input type="text" class="form-control" name="name" required="required">
    </div>
    <div class="form-group">
        <label for="email">Quantity in stock:</label>
        <input type="number" class="form-control" name="quantity" required="required">
    </div>
    <div class="form-group">
        <label for="email">Price per item</label>
        <input type="number" class="form-control" name="price" required="required">
    </div>

    <a class="btn btn-default cancel-edition" style="display: none;">Cancel edit</a>
    <button type="submit" class="btn btn-primary" action="create">Submit</button>
</form>
