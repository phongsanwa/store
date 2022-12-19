<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Tổng Quan</li>

                <li>
                    <a href="{{ url('home/dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">Bảng tổng quan</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-authentication">Sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('products') }}" key="t-products"><i data-feather="box"></i>Sản phẩm</a></li>
                        <li><a href="{{ url('categories') }}" data-key="t-product-detail"><i data-feather="menu"></i>Danh mục sản phẩm</a></li>
                        <li><a href="{{ route('attributes.index') }}" data-key="t-orders"><i data-feather="list"></i>Thuộc tính</a></li>
                        <li><a href="ecommerce-customers.html" data-key="t-customers"><i data-feather="trash"></i>Thương hiệu</a></li>
                        <li><a href="ecommerce-cart.html" data-key="t-cart"><i data-feather="users"></i>Nhà cung cấp</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Khách hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('users.index') }}" key="t-products"><i data-feather="users"></i>Danh sách khách hàng</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="database"></i>
                        <span data-key="t-authentication">Vai trò</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('roles.index') }}" key="t-products"><i data-feather="database"></i>Vai trò</a></li>
                        <li><a href="{{ route('permissions.index') }}" key="t-products"><i data-feather="key"></i>Phân quyền</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-authentication">Đơn hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html" key="t-products"><i data-feather="shopping-cart"></i>Đơn hàng</a></li>
                        <li><a href="ecommerce-product-detail.html" data-key="t-product-detail"><i data-feather="truck"></i>Chờ gửi vận chuyển</a></li>
                        <li><a href="ecommerce-orders.html" data-key="t-orders"><i data-feather="inbox"></i>Đơn hàng thành công</a></li>
                        <li><a href="ecommerce-customers.html" data-key="t-customers"><i data-feather="alert-triangle"></i>Khiếu nại</a></li>
                        <li><a href="ecommerce-cart.html" data-key="t-cart"><i data-feather="trash"></i>Đơn đã xóa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Website</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html" data-key="t-login"><i data-feather="align-left"></i>Nội dung</a></li>
                        <li><a href="auth-login.html" data-key="t-login"><i data-feather="settings"></i>Cài đặt</a></li>
                        <li><a href="auth-register.html" data-key="t-register"><i data-feather="menu"></i>Menu</a></li>
                        <li><a href="auth-recoverpw.html" data-key="t-recover-password"><i data-feather="book"></i>Tin tức</a></li>
                        <li><a href="auth-lock-screen.html" data-key="t-lock-screen"><i data-feather="tag"></i>Tags</a></li>
                        <li><a href="auth-logout.html" data-key="t-logout"><i data-feather="image"></i>Banner</a></li>
                        <li><a href="auth-confirm-mail.html" data-key="t-confirm-mail"><i data-feather="camera"></i>Album</a></li>
                        <li><a href="auth-email-verification.html" data-key="t-email-verification"><i data-feather="phone"></i>Liên hệ</a></li>
                        <li><a href="auth-two-step-verification.html" data-key="t-two-step-verification"><i data-feather="mail"></i>Newsletters</a></li>
                        <li><a href="pages-starter.html" data-key="t-starter-page"><i data-feather="help-circle"></i>Hỏi đáp, đánh giá</a></li>
                        <li><a href="pages-maintenance.html" data-key="t-maintenance"><i data-feather="globe"></i>Ngôn ngữ</a></li>
                        <li><a href="pages-comingsoon.html" data-key="t-coming-soon"><i data-feather="user"></i>User đăng nhập</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Khuyến mãi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html" data-key="t-alerts"><i data-feather="arrow-down"></i>Chiết khấu</a></li>
                        <li><a href="ui-alerts.html" data-key="t-alerts"><i data-feather="toggle-left"></i>Tích điểm</a></li>
                        <li><a href="ui-buttons.html" data-key="t-buttons"><i data-feather="credit-card"></i>Coupons</a></li>
                        <li><a href="ui-cards.html" data-key="t-cards"><i data-feather="gift"></i>Quà tặng</a></li>
                        <li><a href="ui-carousel.html" data-key="t-carousel"><i data-feather="bell"></i>Chương trình marketing</a></li>
                        <li><a href="ui-dropdowns.html" data-key="t-dropdowns"><i data-feather="cloud-lightning"></i>Season</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
