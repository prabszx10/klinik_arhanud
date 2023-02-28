@include('FrontEnd.Home.js')
@include('FrontEnd.TentangKami.js')
@include('FrontEnd.TenagaMedis.js')
@include('FrontEnd.KegiatanDanBerita.js')

<script>
    function scrollDiv(type) {
        var div = document.getElementById(type);
        var margin = 60;
        var topPos = div.getBoundingClientRect().top + window.pageYOffset - margin;
        window.scrollTo({top: topPos, behavior: 'smooth'});

        $('.isactive').removeClass( "isactive" );
        $('#nav_'+type).addClass( "isactive" );
    }
</script>