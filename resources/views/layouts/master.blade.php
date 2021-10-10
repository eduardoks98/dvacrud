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

</div>

<script>
    $(document).ready(function() {
        $('.phone-mask').inputmask('(99) 9 9999-9999');
        $('.birth-mask').inputmask('99/99/9999');
        var table = $('#user-table').DataTable({
            dom: "ltipr",
            paging: false,
            info: false,
            language: {
                "search": "Pesquisar",
                "emptyTable": "Nenhum registro encontrado na tabela!",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "zeroRecords": "Nenhum registro correspondente encontrado!",
            }
        });

        $('#table-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        setTimeout(function() {
            $('.session-message').fadeOut('fast');
        }, 2000); // <-- time in milliseconds
    });
</script>