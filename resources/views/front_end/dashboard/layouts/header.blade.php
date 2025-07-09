<div class="wsus__dashboard_menu">
          <div class="wsusd__dashboard_user">
            <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('/frontend/assets/images/users/profile.webp') }}" alt="img" class="img-fluid">
            <p>{{ Auth::user()->name }}</p> &nbsp &nbsp &nbsp
            <form method="POST" action="{{ route('user.logout') }}">
              @csrf
              <button type="submit" 
                      class="btn btn-link p-0 m-0" 
                      style="color: white; text-decoration: none; background: transparent; border: none;">
                  Logout
              </button>
          </form>
          </div>
        </div>