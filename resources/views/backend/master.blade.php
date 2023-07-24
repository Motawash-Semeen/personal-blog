<!doctype html>

<html class="no-js" lang="en">

<head>
@include('backend.partials.style')

</head>

<body>


    <!-- Left Panel -->
@include('backend.partials.sidebar')
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('backend.partials.header')
        <!-- Header-->

        @yield('content')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
@include('backend.partials.custom')

</body>

</html>
