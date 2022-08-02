<!doctype html>
<html lang="en">
{{-- head start --}}
@include('admin.master.head')
{{-- head end --}}

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       @include('admin.master.pageHeader')
        <div class="app-main">
            {{-- Sidebar start --}}
            @include('admin.master.sidebar')
            {{-- Sidebar end --}}
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    @yield('title-icon')
                                </div>
                                <div>
                                    @yield('title')
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
                <div class="app-wrapper-footer" style="text-align: center;">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link" >
                                            Copyright &copy; <?php echo date('Y'); ?> amthuc3mien.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    {{-- Scripts start --}}
    @include('admin.master.footer')
    {{-- Scripts end --}}
</body>

</html>
