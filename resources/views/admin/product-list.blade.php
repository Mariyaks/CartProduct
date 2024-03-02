<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->

        @if (session('status'))
        <div class="row">
            <div class="col-8" style="padding-right:20Px">
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('status') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                        data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if (session('error'))
        <div class="row" >
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ session('error') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10"
                    data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong> Categroy List </strong></h6>
                            </div>
                        </div>
                    
                        <div class="me-3 my-3 d-flex justify-content-between">
                                   
                            <a class="btn bg-gradient-dark  mx-3" href="{{ route('products') }}">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User
                            </a>
                       
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">

                            
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17">
                                                ID
                                            </th>  
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17 ps-2">
                                                Product Image
                                            </th>                                       
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17 ps-2">
                                                Product Name
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17 ps-2">
                                                Categroy
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17 ps-2">
                                                Description
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-17 ps-2">
                                                Add to Cart
                                            </th>
                                            
                                            
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            
                                            <td class="align-middle text-center">
                                                <a href="{{ url('productedit/'. $product->id) }}" class="text-secondary text-sm font-weight-bold">{{$product->id}}</a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ url('productedit/'. $product->id) }}">
                                                    <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ url('productedit/'. $product->id) }}" class="text-secondary text-sm font-weight-bold">{{$product->name}}</a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ url('productedit/'. $product->id) }}" class="text-secondary text-sm font-weight-bold">{{ optional($product->category)->name }}</a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold">{{$product->description}}</span>
                                            </td>
                                           
                                            
                                            <td class="align-middle">
                                                <a rel="tooltip" class="btn btn-success btn-link" 
                                                    href="{{ url('cartview/'. $product->id) }}" 
                                                    data-original-title="Add To Cart" title="Add To Cart">
                                                    <i class="material-icons">add_shopping_cart</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>

