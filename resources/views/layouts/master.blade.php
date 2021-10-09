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

    <divl class="user-title d-flex justify-content-center col-md-10 offset-1 ">

        @yield('content-title')
    </divl>
    <divl class="d-flex justify-content-start col-md-10 offset-1">
        @yield('content')
    </divl>
    <footer class="footer text-center">
        All Rights Reserved.
    </footer>
</div>

<script>
  $(document).ready(function() {
    $('.phone-mask').inputmask('(99) 9 9999-9999');
    $('.birth-mask').inputmask('99/99/9999');
    $('#user-table').DataTable();
  });
</script>




