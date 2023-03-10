<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
        <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{ route('lkp-bahagian.index') }}"><i class="fas fa-address-book"></i> Bahagian</a>
                </li>
                <li>
                    <a href="{{ route('lkp-seksyen.index') }}"><i class="fas fa-address-book"></i> Seksyen</a>
                </li>
                <li>
                    <a href="{{ route('pengguna.index') }}"><i class="fas fa-users"></i> Pengguna</a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-table"></i>Penyelenggaraan</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('lkp-bahagian.index') }}">Senarai Bahagian</a>
                        </li>
                        <li>
                            <a href="{{ route('lkp-bahagian.index') }}">Senarai Unit</a>
                        </li>
                    </ul>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
