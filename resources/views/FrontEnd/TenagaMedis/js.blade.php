<script>
    var urlPath ={
        tenagaMedis: "{{ route('select.tenagaMedis') }}",
    }

    getData()
    
    function getData(){
        getTenagaMedis()
    }

    function getTenagaMedis(){
        $.ajax({
            url: urlPath.tenagaMedis,
            success: function(response){
                console.log(response)
                if(response.length>0){
                    $.each(response, function( key, value ) {
                        var url = window.location.origin+'/storage/images/tenaga_medis/'+value.file;
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                $("#list_tenaga_medis").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.pekerjaan}</h4>
                                            </article>
                                            <img src="${url}"
                                                alt="">
                                        </div>
                                    </li>
                                `)
                            }, error: function(xhr, status, error){
                                $("#list_tenaga_medis").append(`
                                    <li>
                                        <div class="col-12 container_foto ">
                                            <div class="ver_mas text-center">
                                                <span class="lnr lnr-eye"></span>
                                            </div>
                                            <article class="text-left">
                                                <h3>${value.nama}</h3>
                                                <h4>${value.pekerjaan}</h4>
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
                        $("#list_tenaga_medis").append(`
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
</script>