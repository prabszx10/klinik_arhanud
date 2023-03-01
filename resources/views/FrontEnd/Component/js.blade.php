@include('FrontEnd.Home.js')
@include('FrontEnd.TentangKami.js')
@include('FrontEnd.TenagaMedis.js')
@include('FrontEnd.KegiatanDanBerita.js')

<script>
    var urlPath ={
        pengaturan: "{{ route('select.pengaturan') }}",
    }

    getLogo()
    function scrollDiv(type) {
        var div = document.getElementById(type);
        var margin = 60;
        var topPos = div.getBoundingClientRect().top + window.pageYOffset - margin;
        window.scrollTo({top: topPos, behavior: 'smooth'});

        $('.isactive').removeClass( "isactive" );
        $('#nav_'+type).addClass( "isactive" );
    }

    function getLogo(){
        $.ajax({
            url: urlPath.pengaturan,
            success: function(response){
                console.log(response)
                if(response.length>0){
                    var url = window.location.origin+'/storage/logo/'+response[0].gambar;
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                $("#app_logo").append(`
                                    <img src="${url}" alt="">
                                `)
                            }, error: function(xhr, status, error){
                                $("#app_logo").html(`
                                    <img src="{{asset('img/arhanud_logo.png')}}" alt="">
                                `)
                            }
                        });
                } else{
                    
                }
            }
        })


    }
</script>