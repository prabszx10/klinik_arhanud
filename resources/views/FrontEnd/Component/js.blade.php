@include('FrontEnd.Home.js')
@include('FrontEnd.TentangKami.js')
@include('FrontEnd.TenagaMedis.js')
@include('FrontEnd.KegiatanDanBerita.js')

<script>
    function scrollDiv(type) {
        var div = document.getElementById(type);
        div.scrollIntoView({ behavior: 'smooth' });

        $('.isactive').removeClass( "isactive" );
        $('#nav_'+type).addClass( "isactive" );
    }
</script>