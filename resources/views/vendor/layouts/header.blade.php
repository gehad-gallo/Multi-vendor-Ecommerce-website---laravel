<div class="wsus__dashboard_menu">
          <div class="wsusd__dashboard_user">
            <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('/frontend/assets/images/users/profile.webp') }}" alt="img" class="img-fluid">

            <p>{{ Auth::user()->name }}</p> &nbsp &nbsp &nbsp
            <form method="POST" action="{{ route('vendor.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
            </form>
          </div>
        </div>