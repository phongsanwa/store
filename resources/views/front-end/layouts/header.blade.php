<header class="header-top haeder-desktop" role="banner-black">
    <div class="menu_bar_content">
        <div class="logo-brand">
            <a href="#" class="linklogo"><img src="https://storage.googleapis.com/cdn.nhanh.vn/store/26685/store_1615884570_309.jpeg" alt="Error Image" class="img-logo"></a>
        </div>
        <div class="menu-items">
            <ul class="item-content">
                <div class="title-cate"><a href="../product/product.html" class="link-cateParent"><span>TOPS</span></a></div>
                <div class="child-category">
                    <ul>
                        <li class="child-name"><a href="" class="child-link">SHIRT</a></li>
                        <li class="child-name"><a href="" class="child-link">T-SHIRT</a></li>
                        <li class="child-name"><a href="" class="child-link">TANKTOP</a></li>
                        <li class="child-name"><a href="" class="child-link">GILE</a></li>
                        <li class="child-name"><a href="" class="child-link">SHIRT</a></li>
                        <li class="child-name"><a href="" class="child-link">SHIRT</a></li>
                        <li class="child-name"><a href="" class="child-link">SHIRT</a></li>
                    </ul>
                </div>
            </ul>
            <ul class="item-content">
                <div class="title-cate"><a class="link-cateParent"><span>BOTTOMS</span></a></div>
                <div class="child-category">
                    <ul>
                        <li class="child-name"><a href="" class="child-link">PANTS</a></li>
                        <li class="child-name"><a href="" class="child-link">TIGHTS</a></li>
                        <li class="child-name"><a href="" class="child-link">UNDERWEARS</a></li>
                    </ul>
                </div>
            </ul>
            <ul class="item-content">
                <div class="title-cate"><a class="link-cateParent"><span>SKIRTS</span></a></div>
                <div class="child-category">
                    <ul>
                        <li class="child-name"><a href="" class="child-link">SKIRTS</a></li>
                        <li class="child-name"><a href="" class="child-link">DRESSES</a></li>
                        <li class="child-name"><a href="" class="child-link">SKIRTS</a></li>
                    </ul>
                </div>
            </ul>

            <ul class="item-content">
                <div class="title-cate"><a class="link-cateParent"><span>ACCESSORIES</span></a></div>
                <div class="child-category">
                    <ul>
                        <li class="child-name"><a href="" class="child-link">BAGS</a></li>
                        <li class="child-name"><a href="" class="child-link">HAT</a></li>
                        <li class="child-name"><a href="" class="child-link">EYESGLASSES</a></li>
                        <li class="child-name"><a href="" class="child-link">HANDKERCHIEF</a></li>
                        <li class="child-name"><a href="" class="child-link">BELT</a></li>
                        <li class="child-name"><a href="" class="child-link">BELT</a></li>
                    </ul>
                </div>
            </ul>
            <ul class="item-content">
                <div class="title-cate"><a class="link-cateParent"><span>BRANDS MADE</span></a></div>
            </ul>
        </div>
        <div class="right-menu">
            <form action="/search" method="get">
                <div class="search-btn-wrap">
                    <button type="submit" class="searchBtn">
                        <i class="fa fa-search"></i>
                    </button>
                    <input name="name" placeholder="Search here">
                </div>
            </form>
            @guest
            <div class="user-icon">
                <a href="{{ route('login.show') }}" class="user-link"><i class="fa fa-user"></i></a>
            </div>
            @endguest
            @auth
                {{auth()->user()->username}}
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth
            <a href="#" class="cart-link-page">
                <i class="fa fa-shopping-cart"></i>
                <span class="count-cart">(0)</span>
            </a>
        </div>
    </div>
    <div class="mobile-navi">

    </div>
</header>
