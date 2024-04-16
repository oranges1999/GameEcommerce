<?php 
    use App\Models\Admin\Category;
    $categories =  Category::get();
?>

<header class="sticky-top">
    <div class="promotion">
        <div class="container">
            <nav class="promotion-bar navbar navbar-light bg-light justify-content-between">
                <div class="d-flex">
                    <div class="dropdown">
                        <a class=" nav-link text-white" href="#" id="personal-space" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nav-icon text-white fa-solid fa-user"></i>
                        </a>
                        @if(Auth::check())
                        <div class="search-form dropdown-menu dropdown-menu-left" aria-labelledby="personal-space">
                            <span class="dropdown-item-text bg-dark text-light">Personal Section</span>
                            <a class="dropdown-item" href="{{route("client.client.index")}}">Infomation</a>
                            <a class="dropdown-item" href="{{route("logout")}}">Logout</a>
                            <a class="dropdown-item" href="{{route("client.orderdetails.index")}}">Your Order</a>
                        </div>
                        @else
                        <div class="search-form dropdown-menu dropdown-menu-left" aria-labelledby="personal-space">
                            <form class="px-4 py-3" action="{{route('pLogin')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('register')}}">New around here? Sign up</a>
                        </div>
                        @endif
                    </div>
                    <div class="dropdown">
                        <a class="nav-link text-white" href="{{route("client.cart.index")}}" id="shopping-cart" aria-expanded="false">
                            <i class="nav-icon text-white fa-solid fa-basket-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class=" d-flex align-items-center">
                    <p class="promotion-item text-white">Get 10% OFF at the Porto GAMES Selection</p>
                    <p class="promotion-item"><a href="{{route("client.filter.index")}}" >Shop Now!</a></p>
                    <p class="promotion-item"><a href="{{route("admin.adminhome.index")}}" >Admin Section</a></p>
                </div>
            </nav>
        </div>
    </div>
    <div class="second-header">
            <div class="nav-main container d-flex align-item-center">
                <nav class="navbar navbar-light bg-light ">
                    <div class="nav-item nav-tag d-flex align-items-center justify-content-between">
                        <a class="col-md-2" href="/"><img width="100%" class="" src="{{ asset('asset/steamLogo.png') }}" alt=""></a>
                        <div class="col-md-8 d-flex position-relative" id="middle-nav">
                            <a class="tab col-md-3 games-tab" href="{{route("client.filter.index")}}">  
                                <div class="tag text-white d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-gamepad"></i>
                                    <P class="tag-text">GAMES</P>
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                            </a>
                        </div>
                        <div class="position-relative" >
                            <form class="d-flex" action="#">
                                <input id="search" class="form-control col-xs-2" type="search" placeholder="Search" aria-label="Search"  name="search">
                            
                            </form>
                            <div class="position-absolute">
                                <div id="search-box">
        
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="nav-side-bar">
        <div class="">
            <div class="">
                <button id="nav-side-open"><i class="fa-solid fa-bars" style="color: #ffffff;"></i></button>
                <button id="nav-side-close"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
            </div>
            <ul>
                <li>
                    <a class="" href="">
                        <div class="sidebar-item d-flex">
                            <div class="d-flex justify-content-center align-items-center sidebar-icon"><i class="fa-solid fa-globe"></i></div>
                            <div class="d-flex justify-content-center align-items-center sidebar-content">About</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="sidebar-item d-flex">
                            <div class="d-flex justify-content-center align-items-center sidebar-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                            <div class="d-flex justify-content-center align-items-center sidebar-content">Services</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="sidebar-item d-flex">
                            <div class="d-flex justify-content-center align-items-center sidebar-icon"><i class="fa-solid fa-people-group"></i></div>
                            <div class="d-flex justify-content-center align-items-center sidebar-content">Clients</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="sidebar-item d-flex">
                            <div class="d-flex justify-content-center align-items-center sidebar-icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="d-flex justify-content-center align-items-center sidebar-content">Contact</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
