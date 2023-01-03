<!-- ...:::: Start Header Section:::... -->
<header class="header-section d-lg-block d-none">
    <!-- Start Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-3">
                    <div class="header-top--left">
                        <span>Вітаємо Вас у нашому магазині!</span>
                    </div>
                </div>
                <div class="col-9">
                    <div class="header-top--right">
                        <!-- Start Header Top Menu -->
                        <ul class="header-user-menu">
                            <li><a href="tg://resolve?domain=batura_m_v">Написать в телеграм <i class="fa fa-telegram"></i></a></li>
                            <li><a href="tel:+380973332222">(097) 333 22 22</a></li>
                            <li class="has-user-dropdown">
                                <i class="fas fa-money-bill-alt"></i>
                                <a href=""> USD - Долар</a>
                                <!-- Header Top Menu's Dropdown -->
                                <ul class="user-sub-menu"><i class="fas fa-money-bill-alt"></i>
                                    <a href=""> UAH – Гривня</a>
                                </ul>
                            </li>
                            @auth()
                                <li><a href="{{route('personal.index')}}"><i class="fas fa-user"></i> Мій кабінет</a>
                                </li>
                                <li><a href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fas fa-arrow-right"></i> Вихід
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest()
                                <li><a href="{{route('register')}}"><i class="fas fa-user"></i> Зареєструватися</a></li>
                                <li><a href="{{route('login')}}"><i class="fas fa-arrow-right"></i> Вхід</a></li>
                            @endguest
                        </ul> <!-- End Header Top Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Start Header Center Area -->

    <!-- Start Bottom Area -->
</header>
<!-- ...:::: End Header Section:::... -->
