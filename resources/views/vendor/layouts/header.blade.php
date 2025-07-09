<div class="wsus__dashboard_menu">
          <div class="wsusd__dashboard_user">
            <img src="{{asset('/frontend/assets/images/dashboard_user.jpg')}}" alt="img" class="img-fluid">
            <p>{{ Auth::user()->name }}</p> &nbsp &nbsp &nbsp
            <form method="POST" action="{{ route('vendor.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
            </form>
          </div>
        </div>