<header class="text-center text-white">
    <h1 class="display-4">TixBox</h1>
    <p class="lead mb-0">Using<a href="https://laravel.com" class="text-white font-bold">
        Laravel 7.30</a></p>
    <p class="font-italic">Snippet By
      <a href="https://bootstrapious.com" class="text-white">
        <u>Bootstrapious</u>
      </a>
    </p>
    <p>
      @guest
      <a href="{{ route('login')}}" class="badge badge-pill badge-primary py-2 px-3">Login</a>
      @else 
      <a class="badge badge-pill badge-secondary py-2 px-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      @endguest
      {{-- <a href="{{ route('register')}}" class="badge badge-secondary">Register</a> --}}
  </header>