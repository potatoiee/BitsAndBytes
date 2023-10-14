
<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i>user</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>products</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i>cashier</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i>reports</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i>transactions</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-cart-flatbed"></i>suppliers</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i>customers</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-truck"></i>incoming</a>

<style>
    .btn-outline{
        border-color: black;
    }
    .btn-outline:hover{
        background: grey;
        color:white;
    }
</style>