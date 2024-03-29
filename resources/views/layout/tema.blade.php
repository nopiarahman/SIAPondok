<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    @yield('head')
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="{{asset('tema/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

    {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    @stack('head')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
{{-- Cari surah --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link href="{{asset('tema/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    {{-- Costum CSS --}}
    <link rel="stylesheet" href="{{asset('tema/css/costum.css')}}">
    <!-- Waves Effect Css -->
    {{-- <link href="{{asset('tema/plugins/node-waves/waves.css')}}" rel="stylesheet" /> --}}

    <!-- Animation Css -->
    <link href="{{asset('tema/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    {{-- <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" /> --}}

    <!-- Morris Chart Css-->
    {{-- <link href="{{asset('tema/plugins/morrisjs/morris.css')}}" rel="stylesheet" /> --}}

    <!-- Custom Css -->
    <link href="{{asset('tema/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('tema/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="
    @if(auth()->user()->jenjang=="smpPutra")
    {{Str::ucfirst(auth()->user()->role)}} theme-green 
    @elseif(auth()->user()->jenjang=="sd")
    {{Str::ucfirst(auth()->user()->role)}} theme-deep-orange
    @elseif(auth()->user()->jenjang=="smpPutri")
    {{Str::ucfirst(auth()->user()->role)}} theme-deep-purple
    @elseif(auth()->user()->jenjang=="smaPutra")
    {{Str::ucfirst(auth()->user()->role)}} theme-blue
    @elseif(auth()->user()->jenjang=="kepalaYayasan")
    {{Str::ucfirst(auth()->user()->role)}} theme-green
    @endif
    ">
    <!-- Page Loader -->
    {{-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> --}}
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar my-n2">
        <div class="container-fluid my-n2">
            <div class="navbar-header">
                {{-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> --}}
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand mb-n2"href="{{url('/dashboard')}}"> <img
                        src="{{asset('tema/images/logopondok.png')}}" alt="">
                    Sistem Informasi Akademik Pondok Pesantren Alqosim Jambi {{jenjangLengkap()}}
                </a>
            </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar my-4">
            <!-- User Info -->
            <div class="{{jenjang()}} user-info pb-5 align-center ">
                <div class="image">
                    <img src="{{asset('tema/images/user.png')}}" width="75" height="75" alt="User" />
                    {{-- <img src="{{auth()->user()->asatidzah()->pasPhoto}}" width="75" height="75" alt="User" /> --}}
                </div>
                <div class="info-container pb-3 align-center">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}</div>
                    <div class="email">{{auth()->user()->email}}</div>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Str::ucfirst(auth()->user()->role)}} {{jenjangLengkap()}}
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu">
                            <li><a href="/profil"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="@yield('menuindex')">
                        <a href="{{url('/dashboard')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    {{-- Menu  --}}
                    @if(auth()->user()->role=='admin')
                    {{-- Template Menu --}}
                    <li class="@yield('menusantri')">
                        <a href="{{'/santriwustha'}}">
                            <i class="material-icons">people</i>
                            <span>Data Santri</span>
                        </a>
                    </li>
                    <li class="@yield('menuasatidzah')">
                        <a href="{{'/asatidzah'}}">
                            <i class="material-icons">person</i>
                            <span>Asatidzah</span>
                        </a>
                    </li>
                    <li class="@yield('menukelas')">
                        <a href="{{'/kelas'}}">
                            <i class="material-icons">business</i>
                            <span>Kelas</span>
                        </a>
                    </li>
                    <li class="@yield('menukelasTahfidz')">
                        <a href="{{'/kelasTahfidz'}}">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Kelas Tahfidz</span>
                        </a>
                    </li>
                    <li class="@yield('menumapel')">
                        <a href="{{'/mapel'}}">
                            <i class="material-icons">book</i>
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="@yield('menujadwal')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Jadwal</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('jadwalbelajar')">
                                <a href="{{url('/jadwalbelajar')}}">Jadwal Belajar</a>
                            </li>
                            <li class="@yield('menuperiode')">
                                <a href="{{url('/periode')}}">Periode</a>
                            </li>
                </ul>
                </li>
                <li class="@yield('menuPelanggaran')">
                    <a href="{{'/pelanggaran'}}">
                        <i class="material-icons">gavel</i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="@yield('menuPengumuman')">
                    <a href="{{'/pengumuman'}}">
                        <i class="material-icons">announcement</i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li class="@yield('')">
                    <a href="{{'/logout'}}">
                        <i class="material-icons">exit_to_app</i>
                        <span>Keluar</span>
                    </a>
                </li>
                @elseif(auth()->user()->role=='asatidzah')
                @if(cekwaliKelas() != null)
                <li class="@yield('menuwali')">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Data Kelas</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="@yield('menusantri')">
                            <a href="{{url('/dataSantri')}}">Data Santri</a>
                        </li>
                        <li class="@yield('menulaporan')">
                            <a href="{{url('/laporannilai')}}">Laporan Nilai Kelas</a>
                        </li>
                        {{-- <li class="@yield('menuAbsensi')">
                            <a href="{{url('/absensiSantri')}}">Absensi Santri</a>
                        </li> --}}
                    </ul>
                </li>
                @endif
                <li class="@yield('menujadwal')">
                    <a href="{{'/jadwalbelajar'}}">
                        <i class="material-icons">access_time</i>
                        <span>Jadwal Mengajar</span>
                    </a>
                </li>
                <li class="@yield('menunilai')">
                    <a href="{{'/nilai'}}">
                        <i class="material-icons">mode_edit</i>
                        <span>Nilai</span>
                    </a>
                </li>
                @if(cekGuruTahfidz() != null)
                <li class="@yield('menunilaitahfidz')">
                    <a href="{{'/nilaitahfidz'}}">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span>Nilai Tahfidz</span>
                    </a>
                </li>
                @endif
                {{-- <li class="@yield('menukelas')">
                    <a href="{{'/kelas'}}">
                <i class="material-icons">business</i>
                <span>Kelas</span>
                </a>
                </li> --}}
                <li class="@yield('')">
                    <a href="{{'/logout'}}">
                        <i class="material-icons">exit_to_app</i>
                        <span>Keluar</span>
                    </a>
                </li>
                @elseif(auth()->user()->role=='waliSantri')
                <li class="@yield('menusantri')">
                    <a href="{{'/walisantriwustha'}}">
                        <i class="material-icons">people</i>
                        <span>Lihat Santri</span>
                    </a>
                </li>
                <li class="@yield('menunilai')">
                    <a href="{{'/lihatnilai'}}">
                        <i class="material-icons">mode_edit</i>
                        <span>Lihat Nilai Santri</span>
                    </a>
                </li>
                <li class="@yield('menuPelanggaran')">
                    <a href="{{'/lihatpelanggaran'}}">
                        <i class="material-icons">gavel</i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="@yield('menuPengumuman')">
                    <a href="{{'/pengumumanWali'}}">
                        <i class="material-icons">announcement</i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li class="@yield('')">
                    <a href="{{'/logout'}}">
                        <i class="material-icons">exit_to_app</i>
                        <span>Keluar</span>
                    </a>
                </li>
                @elseif(auth()->user()->role=='kepalaYayasan')
                <li class="@yield('menuwali')">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Data Santri</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="@yield('menuuulaa')">
                            <a href="{{url('/dataSantriUulaa')}}">Salafiyyah Uulaa</a>
                        </li>
                        <li class="@yield('menuwustha')">
                            <a href="{{url('/dataSantriWustha')}}">Salafiyyah Wustha'</a>
                        </li>
                        <li class="@yield('menubanaat')">
                            <a href="{{url('/dataSantriBanaat')}}">Tahfidz Banaat</a>
                        </li>
                        <li class="@yield('menuulyaa')">
                            <a href="{{url('/dataSantriUlyaa')}}">Salafiyyah Ulyaa</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('menuEditAdmin')">
                    <a href="{{'/editadmin'}}">
                        <i class="material-icons">people</i>
                        <span>Kelola Admin</span>
                    </a>
                </li>
                <li class="@yield('menuasatidzah')">
                    <a href="{{'/dataasatidzah'}}">
                        <i class="material-icons">people</i>
                        <span>Data Asastidzah</span>
                    </a>
                </li>
                <li class="@yield('')">
                    <a href="{{'/logout'}}">
                        <i class="material-icons">exit_to_app</i>
                        <span>Keluar</span>
                    </a>
                </li>
                @endif

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Pondok Pesantren Al-Qosim Jambi</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.6
                </div>
            </div>
            <!-- #Footer -->
        </aside>

    </section>

    <section class="content">
        @yield('container')
    </section>

    <!-- Jquery Core Js -->
    @yield('footer')
    
    <script src="{{asset('tema/plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <script src="{{asset('tema/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('tema/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    {{-- <script  <script src="../../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
="{{asset('tema/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script> --}}
    {{-- <script src="{{asset('tema/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('tema/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script> --}}

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('tema/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('tema/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    {{-- <script src="{{asset('tema/plugins/jquery-countto/jquery.countTo.js')}}"></script> --}}

    <!-- Morris Plugin Js -->
    {{-- <script src="{{asset('tema/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('tema/plugins/morrisjs/morris.js')}}"></script> --}}

    <!-- ChartJs -->
    <script src="{{asset('tema/plugins/chartjs/Chart.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('tema/js/admin.js')}}"></script>
    {{-- <script src="{{asset('tema/js/pages/index.js')}}"></script> --}}



    <!-- Demo Js -->
    <script src="{{asset('tema/js/demo.js')}}"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @stack('scripts')
</body>

</html>
