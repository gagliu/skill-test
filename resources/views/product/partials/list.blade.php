<table class="table">
    <thead>
        <tr>
            <th>Product name</th>
            <th>Quantity in stock</th>
            <th>Price per item</th>
            <th>Datetime submitted</th>
            <th>Total value number</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @php
        $sum = 0;
    @endphp
    @foreach ($products as $product)
        @php
            $total = $product->data->quantity * $product->data->price;
            $sum += $total
        @endphp
        <tr>
            <td>{{ $product->data->name }}</td>
            <td>{{ $product->data->quantity }}</td>
            <td>$ {{ $product->data->price }}</td>
            <td>{{ $product->created_at }}</td>
            <td>$ {{ $total }}</td>
            <td><a class="btn btn-primary edit-product" data="{{ json_encode($product->data) }}" data-url="/product/{{ $product->id }}">Edit</a></td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>$ {{ $sum }}</b></td>
        <td></td>
    </tr>
    </tbody>
</table>
