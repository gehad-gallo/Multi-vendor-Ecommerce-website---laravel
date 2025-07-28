<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Slider</li>
      <li class="dropdown has-dropdown">
        <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Manage Slider</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li>
            <a class="nav-link" href="{{ route('admin.slider.index') }}">Index</a>
          </li>
        </ul>
      </li>
    </ul>

    <ul class="sidebar-menu">
      <li class="menu-header">Categories</li>
      <li class="dropdown has-dropdown">
        <a href="#" class="nav-link"><i class="fas fa-images"></i><span>Manage Categories</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li>
            <a class="nav-link" href="{{ route('admin.category.index') }}">categories</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.sub-category.index') }}">sub categories</a>
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
