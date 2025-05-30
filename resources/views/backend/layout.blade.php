<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.includes.head')
</head>

<body class="alt-menu">
    <!-- BEGIN LOADER -->
    @include('backend.includes.loader')
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('backend.includes.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('backend.includes.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('module') | </a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('action')</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                    <div class="row">
                        @yield('admin-content')
                    </div>


                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            @include('backend.includes.footer')
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('backend.includes.foot')


</body>


</html>