<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">

    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fire"></i><span>Dashboard</span>
        </a>
    </div>

    {{-- Slider --}}
    <ul class="sidebar-menu">
        <li class="menu-header">Slider</li>
        <li class="dropdown has-dropdown {{ set_active(['admin.slider.*']) }}">
            <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Manage Slider</span></a>
            <ul class="dropdown-menu"">
                <li class="{{ set_active(['admin.slider.index']) }}">
                    <a class="nav-link" href="{{ route('admin.slider.index') }}">All Sliders</a>
                </li>
                <li class="{{ set_active(['admin.slider.create']) }}">
                    <a class="nav-link" href="{{ route('admin.slider.create') }}">Create Slider</a>
                </li>
            </ul>
        </li>
    </ul>

    {{-- Ecommerce  --}}
    <ul class="sidebar-menu">
        <li class="menu-header">Ecommerce</li>
        <li class="dropdown has-dropdown {{ set_active(['admin.vendor-profile.*']) }}">
            <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Ecommerce</span></a>
            <ul class="dropdown-menu"">
                <li class="{{ set_active(['admin.vendor-profile.index']) }}">
                    <a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Vendor profile</a>
                </li>
            </ul>
        </li>
    </ul>

    {{-- Product --}}
    <ul class="sidebar-menu">
        <li class="menu-header">Product</li>
        <li class="dropdown has-dropdown {{ set_active(['admin.brands.*']) }}">
            <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Manage products</span></a>
            <ul class="dropdown-menu">
                <li class=" {{ set_active(['admin.brands.index']) }}">
                    <a class="nav-link" href="{{ route('admin.brands.index') }}">Brands</a>
                </li>
                <li class=" {{ set_active(['admin.products.index']) }}">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                </li>
            </ul>
        </li>
    </ul>

    {{-- Categories --}}
    <ul class="sidebar-menu">
        <li class="menu-header">Categories</li>

        {{-- Parent is active if any child route matches --}}
        <li class="dropdown has-dropdown  {{ set_active(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
            <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Manage Categories</span></a>
            <ul class="dropdown-menu">
                <li class="{{ set_active(['admin.category.*']) }}">
                    <a class="nav-link" href="{{ route('admin.category.index') }}">categories</a>
                </li>
                <li class="{{ set_active(['admin.sub-category.*']) }}">
                    <a class="nav-link" href="{{ route('admin.sub-category.index') }}">sub categories</a>
                </li>
                <li class="{{ set_active(['admin.child-category.*']) }}">
                    <a class="nav-link" href="{{ route('admin.child-category.index') }}">child categories</a>
                </li>
            </ul>
        </li>
    </ul>

</aside>

</div>

@push('scripts')
<script>
  $(document).ready(function () {
    $('.has-dropdown > a').on('click', function (e) {
      e.preventDefault();
      $(this).parent().toggleClass('active');
      $(this).next('.dropdown-menu').slideToggle(200);
    });
  });
</script>
@endpush
