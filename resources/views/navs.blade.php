
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">

<div class="container">
        <a class="navbar-brand" href="#">@yield('title','First Project')</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link active" href="{{action('HomeController@index')}}">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href={{URL::to('company/index')}} role="button" aria-haspopup="true" aria-expanded="false">Companies</a>
                    <div class="dropdown-menu">
                        @can('create', App\Company::class)
                        <a class="dropdown-item" href={{URL::to('company/create')}}>Add Company</a>
                        @endcan
                        <a class="dropdown-item" href={{URL::to('company/index')}}>Show Company</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href={{URL::to('customers/index')}} role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
                    <div class="dropdown-menu">
                        @can('create', App\Customer::class)
                        <a class="dropdown-item" href={{URL::to('customers/create')}}>Add Customers</a>
                        @endcan
                        <a class="dropdown-item" href={{URL::to('customers/index')}}>Show Customers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href={{URL::to('product/index')}} role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu">
                        @can('create', App\Product::class)
                            <a class="dropdown-item" href={{URL::to('product/create')}}>Add Product</a>
                        @endcan
                        <a class="dropdown-item" href={{URL::to('product/index')}}>Show Product</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about">About-Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/contact/create">Contact-Us</a>
                </li>

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        </div>
</nav>

