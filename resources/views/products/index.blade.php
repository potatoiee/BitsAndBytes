@extends('layouts.app')

@section('content')
   <div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 style="float: left">Add Products</h4>
                    <a href="#" style="float: right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct">
                    <i class="fa fa-plus"></i> Add New Products</a>
                </div> <!-- closing div for card-hearder -->
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Alert Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{ number_format($product->price,2) }}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td> 
                                        @if( $product->alert_stock >= $product->quantity) <span class="badge badge-danger"> Low Stock < {{ $product->alert_stock }}</span>
                                        @else <span class="badge badge-success">{{ $product->alert_stock }}</span>
                                         @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editproduct{{ $product->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteproduct{{ $product->id }}"><i class="fa fa-trash"></i>Del</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal for editing product details -->
                                <div class="modal right fade" id="editproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">edit product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('products.update', $product->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input type="text" name="product_name" id="" value="{{ $product->product_name }}"class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Brand</label>
                                                <input type="text" name="brand" id="" value="{{ $product->brand }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" id="" value="{{ $product->price }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" id="" value="{{ $product->quantity }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alert Stock</label>
                                                <input type="number" name="alert_stock" id="" value="{{ $product->alert_stock }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="2" class="form-control">{{ $product->description }}</textarea> 
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>


                                <!-- Modal for deleting product details -->
                                <div class="modal right fade" id="deleteproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">delete product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <p>Are you sure you want to delete this {{ $product->product_name }} ?</p>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{$products->links("pagination::bootstrap-4")}}
                    </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>search product</h4></div>
                    <div class="card-body">
                        ........
                    </div>
            </div>
            </div>
        </div>
    </div>
   </div>  

                                <!-- Modal for adding new product -->
                                <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">add product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('products.store')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input type="text" name="product_name" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Brand</label>
                                                <input type="text" name="brand" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alert Stock</label>
                                                <input type="number" name="alert_stock" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea> 
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Save Product</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal for editing product details -->
                                <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">edit product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('products.update', 1)}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" name="phone" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="confirm_password" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select name="is_admin" id="" class="form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Cashier</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Save product</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
<style>
    .modal.right .modal-dialog{
        top:0;
        right:0;
        margin-right:25vh;
    }
    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>
@endsection