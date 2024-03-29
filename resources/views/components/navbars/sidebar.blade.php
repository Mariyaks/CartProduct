@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('productlist') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">ManPower</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"></h6>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'admin.category-add' ? 'active bg-gradient-primary' : '' }} "
                    href=" {{ route('categorylist') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'admin.product-add' ? 'active bg-gradient-primary' : '' }} "
                    href=" {{ route('productlist') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank">Free Download</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="../../documentation/getting-started/installation.html" target="_blank">View documentation</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank" type="button">Upgrade
                to pro</a>
        </div>
    </div> -->
</aside>
