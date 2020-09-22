<header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">Logo</a>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
                        <ul class="nav navbar-nav navbar-center">
                            <li><a class="active" href="#">Menu1</a></li>
                            <li><a class="" href="#">Menu2</a></li>
                            <li><a class="" href="#">Menu3</a></li>
                            <li><a class="" href="#">Menu4</a></li>
                            <li><a class="" href="#">Menu5</a></li>
                            <li><a class="" href="#">Menu6</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-services">
                        <a href="#"><i class="fa fa-user"></i><p>Your Account</p></a>
                        <a href="#" class="btn btn-secondary"><i class="fa fa-truck"></i><p>Dealer Area</p></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="head-search">
        <div class="container">
            <div class="row">
                
                    <div class="col-xs-2 col-sm-1 col-md-1 col-lg-2">
                        <div class="dropdown btn-category">
                            <a class="buttonselect" href="#" data-toggle="dropdown" aria-expanded="false"><span>Categories</span></a>
                           
                        </div>
                    </div>
                    <div class="hidden-xs col-sm-3 col-md-2 col-lg-2 head-contact">
                        
                    </div>
                    <div class="col-xs-7 col-sm-5 col-md-6 col-lg-6 pr0">
                        <form action="" id="" class="search-products">
                            <div class="input-group" style="margin:0;">
                                <input type="text" id="search" placeholder="What are you looking for?" style="width:500px">
                              
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
                        <div class="shop-icons">
                            <div class="row">

                                <div class="col-xs-6 col-sm-6 preferiti text-right">
                                    <a href="#">
                                        <div class="icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 cart dropdown text-right">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <div class="bag">
                                                <div class="icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                                {{-- <div class="num">4</div> --}}
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-cart cart-data" role="menu">
                                            
                                            <li><a class="text-center" href="{{ route('checkout') }}">CheckOut</a></li>
                                            <li class="divider"></li>
                                            @if (\Cart::count() > 0)
                                            @foreach (\Cart::content() as $item)
                                            <li>
                                                <span class="item">
                                                    <span class="item-left">
                                                        <img src="{{ $item->options->image->image }}" alt="">
                                                        <span class="item-info">
                                                            <span>{{ $item->name }}</span>
                                                            <span>{{ $item->price }} EGP - (Qty: {{ $item->qty }}</span>
                                                        </span>
                                                    </span>
                                                    <span class="item-right">
                                                        <a href="{{ route('cart_delete',$item->rowId) }}" onclick="return confirm('Are you Sure')" class="btn btn-xs btn-danger pull-right itemDelete"><i class="fa fa-times"></i></a>
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="divider"></li>
                                            @endforeach
                                            
                                            @endif
                                        </ul>
                                  
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</header>