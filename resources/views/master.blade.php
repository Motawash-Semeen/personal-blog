<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.style')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">


    @include('frontend.partials.header')

    <!-- page-header -->
    <!-- <header class="page-header"></header> -->
    <!-- end of page header -->

    <div class="container">

        @yield('content')



    </div>


    @include('frontend.partials.footer')

    @include('frontend.partials.custom')

</body>

</html>
