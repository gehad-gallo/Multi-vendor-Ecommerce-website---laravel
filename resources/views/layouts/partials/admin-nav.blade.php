<nav class="bg-gray-800 text-white shadow-lg">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex justify-between h-16">
                  <div class="flex">
                      <!-- Logo / Brand -->
                      <div class="flex-shrink-0 flex items-center">
                          <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white hover:text-yellow-400 transition">
                              Admin Panel
                          </a>
                      </div>
      
                      <!-- Navigation Links -->
                      <div class="hidden sm:-my-px sm:ml-10 sm:flex space-x-6 items-center">
                          <a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-400 transition">Dashboard</a>
                          <a href="#" class="hover:text-yellow-400 transition">Users</a>
                          <a href="#" class="hover:text-yellow-400 transition">Settings</a>
                          <a href="#" class="hover:text-yellow-400 transition">Reports</a>
                      </div>
                  </div>
      
                  <!-- Right Side -->
                  <div class="flex items-center space-x-4">
                      <span class="hidden sm:block text-sm text-gray-300">
                          {{ Auth::user()->name }}
                      </span>
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                              Logout
                          </button>
                      </form>
                  </div>
              </div>
          </div>
      </nav>
      