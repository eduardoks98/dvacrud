@include('layouts.app')

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper">
    <!-- navbar -->
    @include('header.navbar')

    <divl class="d-flex justify-content-center col-md-10 offset-1 ">
        @if(Request::url() !== '/' )
        <button>voltar</button>
        @endif

        @yield('content-title')
    </divl>
    <divl class="d-flex justify-content-center col-md-10 offset-1">
        @yield('content')
    </divl>
    <footer class="footer text-center">
        All Rights Reserved by Soeng Souy<a href="https://soengsouy.com">KH</a>.
    </footer>
</div>