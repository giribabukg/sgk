<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <!-- @if (Auth::check()) -->
        @include('partials._navigations')
         <!-- @endif -->

        <div id="page-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('partials._javascripts')

    @include('partials._scripts')
</body>

</html>