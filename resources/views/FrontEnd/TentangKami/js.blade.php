<script>
    var urlPath ={
        tentangKami: "{{ route('select.tentangKami') }}",
        fasilitas: "{{ route('select.fasilitas') }}",
        kemitraan: "{{ route('select.kemitraan') }}",
    }

    getData()
    
    function getData(){
        getTentangKami()
        getFasilitas()
        getLayanan()
        getKemitraan()
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

    function getFasilitas(){
        var type= 0;
        $.ajax({
            url: urlPath.fasilitas,
            data:{
                type: type
            },
            success: function(response){
                if(response.length>0){
                    $.each(response, function( key, value ) {
                        var url = window.location.origin+'/storage/images/fasilitasLayanan/'+value.file;
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                $("#list_fasilitas").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.keterangan}</h4>
                                            </article>
                                            <img src="${url}"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                            }, error: function(xhr, status, error){
                                $("#list_fasilitas").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.keterangan}</h4>
                                            </article>
                                            <img src="https://img-aws.ehowcdn.com/400x400/ds-img.studiod.com/Half_Dome_from_Glacier_Point0_1.jpg"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                            }
                        });
                        
                    });
                } else{
                    for(let i =0; i<3;i++){                        
                        $("#list_fasilitas").append(`
                            <li>
                                <div class="col-12 container_foto ">
                                    <div class="ver_mas text-center">
                                        <span class="lnr lnr-eye"></span>
                                    </div>
                                    <article class="text-left">
                                        <h2>TÍTULO DE <br>LA IMAGEN</h2>
                                        <h4>Descripción corta de la imagen en cuestión</h4>
                                    </article>
                                    <img src="https://img-aws.ehowcdn.com/400x400/ds-img.studiod.com/Half_Dome_from_Glacier_Point0_1.jpg"
                                        alt="">
                                </div>
                            </li>                 
                        `)
                    }
                }
            }
        })


    }

    function getLayanan(){
        var type= 1;
        $.ajax({
            url: urlPath.fasilitas,
            data:{
                type: type
            },
            success: function(response){
                if(response.length>0){
                    $.each(response, function( key, value ) {
                        var url = window.location.origin+'/storage/images/fasilitasLayanan/'+value.file;
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                $("#list_layanan").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.keterangan}</h4>
                                            </article>
                                            <img src="${url}"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                            }, error: function(xhr, status, error){
                                $("#list_layanan").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.keterangan}</h4>
                                            </article>
                                            <img src="https://img-aws.ehowcdn.com/400x400/ds-img.studiod.com/Half_Dome_from_Glacier_Point0_1.jpg"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                            }
                        });
                        
                    });
                } else{
                    for(let i =0; i<3;i++){                        
                        $("#list_layanan").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>Layanan</h3>
                                                <h4>Keterangan</h4>
                                            </article>
                                            <img src="https://img-aws.ehowcdn.com/400x400/ds-img.studiod.com/Half_Dome_from_Glacier_Point0_1.jpg"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                    }
                }
            }
        })


    }

    function getKemitraan(){
        $.ajax({
            url: urlPath.kemitraan,
            success: function(response){
                if(response.length>0){
                    $.each(response, function( key, value ) {
                        var url = window.location.origin+'/storage/images/kemitraan/'+value.file;
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                $("#list_kemitraan").append(`
                                <div class="col-2">
                                    <img src="${url}" alt="" style="width: 100%">
                                </div>
                                `)
                            },
                        });
                        
                    });
                } else{
                    $("#list_kemitraan").html(`
                        <div class="col-12">
                            <h4>Data Belum Tersedia</h4>
                        </div>
                    `)
                }
            }
        })


    }
</script>