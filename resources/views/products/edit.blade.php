
<div class="modal right fade" id="editProductModal{{$product->id}}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editProductModalLabel">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('editproduct', ['id' => $product->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" required value="{{$product->name}}" name="name" id="name" class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" required value="{{$product->price}}" name="price" id="price" class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" required value="{{$product->quantity}}" name="quantity" id="quantity" class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" required value="{{$product->alert_stock}}" name="stock" id="stock" class="form-control"/>

                    </div>
                    <div class="form-group">
                        <label for="image">Stock Status</label>
                        <select name="product_status" id="" class="form-select">
                            <option value="">Stock status</option>
                            <option value="1">Instock</option>
                            <option value="0">Out Of Stock</option>
                        </select>

                    </div>
                    <div class="modal-fotter">
                        <button class="btn btn-block btn-primary" type="submit">Edit Product</button>
                        <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
