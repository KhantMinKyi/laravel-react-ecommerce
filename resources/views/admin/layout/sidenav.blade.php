<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/admin') }}">
            <img src="/assets/img/logos/visa.png" class="navbar-brand-img h-100" alt="main_logo" />
            <span class="ms-1 font-weight-bold">Area's Shoppy</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ url('/admin') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/product', 'admin/product/*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('product.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-box-open text-lg opacity-10" style="color: #ffd500;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/product-transaction*', 'admin/product-*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('admin.view.product.transaction') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-right text-lg opacity-10" style="color: #000000;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product Transactions</span>
                </a>
            </li>
            <a class="nav-link {{ request()->is('admin/order*') ? 'active bg-secondary text-white' : '' }} "
                href={{ route('order.list') }}>
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class=" fa fa-solid fa-list-check text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Order Lists</span>
            </a>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/color*') ? 'active bg-secondary text-white' : '' }} "
                    href="{{ route('color.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-palette text-lg opacity-10" style="color: #e14747;"></i>

                    </div>
                    <span class="nav-link-text ms-1">Color</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/category*') ? 'active bg-secondary text-white' : '' }} "
                    href="{{ route('category.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-sitemap text-lg" style="color: #2474ff;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/brand*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('brand.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-bag-shopping text-lg" style="color: #c2a800;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Brand</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/supplier*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('supplier.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users text-lg" style="color: #0095c2;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Suppliers</span>
                </a>
            </li>
            <hr class="horizontal dark">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/income*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('income.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sack-dollar text-lg" style="color: #c2a800;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Income</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/outcome*') ? 'active bg-secondary text-white' : '' }}"
                    href="{{ route('outcome.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-wallet text-lg" style="color: #BF0000; "></i>
                    </div>
                    <span class="nav-link-text
                            ms-1">Outcome</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer border-top mx-4">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Account pages
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ url('/admin/logout') }}" method="POST">
                    @csrf
                    <button class="nav-link " type="submit" style="border:none; background-color:white;">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
