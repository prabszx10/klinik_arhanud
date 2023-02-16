<script>
    $('.isactive').removeClass( "isactive" );
    $('#tentangKami').addClass( "isactive" );

    var urlPath ={
        tentangKami: "{{ route('select.tentangKami') }}",
    }

    getData()
    
    function getData(){
        getTentangKami()
    }

    function getTentangKami(){
        $.ajax({
            url: urlPath.tentangKami,
            success: function(response){
                var klinik = JSON.parse(response['informasi_klinik']);
                var lokasi = JSON.parse(response['lokasi']);
                var misi = JSON.parse(response['misi']);
                var visi = JSON.parse(response['visi']);

                 if(klinik != null){
                    $('#'+klinik['id']).html(klinik['keterangan'])
                 } else{
                    $('#'+klinik['id']).html("Informasi Belum Diinputkan Oleh Admin")
                 }

                 if(lokasi!=null){
                    $('#'+lokasi['id']).html(lokasi['keterangan'])
                 } else{
                    $('#'+lokasi['id']).html('Informasi Belum Diinputkan Oleh Admin')
                 }

                 if(visi!= null){
                    $.each( visi.visi, function( key, value ) {
                         $('#visi').append(`
                            <li><span class="text-wrapper">${value}<span></li>
                         `)
                     });
                 } else{
                    $('#visi').html(`
                            <li><span class="text-wrapper">Belum Terisi<span></li>
                     `)
                 }

                 if(misi!= null){
                    $.each( misi.misi, function( key, value ) {
                         $('#misi').append(`
                            <li><span class="text-wrapper">${value}<span></li>
                         `)
                     });
                 } else{
                    $('#misi').html(`
                            <li><span class="text-wrapper">Belum Terisi<span></li>
                     `)
                 }
            }
        })
    }
</script>