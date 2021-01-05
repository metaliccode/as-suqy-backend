<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    {{--  meta   --}}
    @include('includes.meta')

    {{--  style link  --}}
    @stack('before-style')
    @include('includes.style')
    {{--  untuk menambahkan khusus dengan stack  --}}
    @stack('after-style')
</head>

<body>
    {{--  sidebar --}}
    @include('includes.sidebar') 

    <div id="right-panel" class="right-panel">
    {{--  navbar  --}}
    @include('includes.navbar')

        <div class="content">
            {{--  content   --}}
            @yield('content')

        </div>

        <div class="clearfix"></div>
    </div>

{{--  sciript  --}}
@stack('before-script')
@include('includes.script')
@stack('after-script')

</body>

</html>