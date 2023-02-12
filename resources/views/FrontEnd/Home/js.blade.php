<script>
    $('.isactive').removeClass( "isactive" );
    $('#beranda').addClass( "isactive" );


    var urlPath ={
        carousel: "{{ route('select.carousel') }}",
        poli: "{{ route('select.poli') }}",
        fasilitas: "{{ route('select.fasilitas') }}",
    }

    getData()
    
    function getData(){
        getCarousel()
        getPoli()
        getFasilitas()
        getBerita()
    }

    function getCarousel(){
        $.ajax({
            url: urlPath.carousel,
            success: function(response){
                 if(response.length >0){
                     $.each( response, function( key, value ) {
                         var status = key == 0? 'active':''
                         var url = window.location.origin+'/storage/images/carousel/'+value.file;

                         $('#list_carousel').append(`
                         <div class="carousel-item ${status} slider_home">
                             <img class="d-block w-100" src="${url}"
                                 alt="First slide">
                         </div>
                         `)
                     });
                 } else{
                     $('#list_carousel').append(`
                         <div class="carousel-item active slider_home">
                             <img class="d-block w-100" src="{{ asset('img/home_rumah_sakit.jpg') }}"
                                 alt="First slide">
                         </div>
                         <div class="carousel-item slider_home">
                             <img class="d-block w-100" src="{{ asset('img/fasilitas.jpeg') }}"
                                 alt="Second slide">
                         </div>
                     `)
                 }
            }
        })
    }

    function getPoli(){
        $.ajax({
            url: urlPath.poli,
            success: function(response){
                if(response.length >0){
                     $.each( response, function( key, value ) {
                         var status = key == 0? 'active':''
                         var url = window.location.origin+'/storage/images/carousel/'+value.file;

                         $('#list_poli').append(`
                            <div class="col-4 item_content">
                                    <img src="{{ asset('img/hospital_icon.png') }}" alt="" class="item_content_icon">
                                    <h4>${value.nama} (${value.kode})</h4>
                                    ${value.keterangan!=null?value.keterangan:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum iure alias obcaecati tempore sit. Blanditiis quibusdam repellat nobis velit deleniti.'}
                                </div>
                         `)
                     });
                 } else{
                        for(let i =0; i<5;i++){            
                            $("#list_poli").append(`
                                <div class="col-4 item_content">
                                    <img src="{{ asset('img/hospital_icon.png') }}" alt="" class="item_content_icon">
                                    <h4>Laboratorium Klinik</h4>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum iure alias obcaecati tempore sit. Blanditiis quibusdam repellat nobis velit deleniti.
                                </div>     
                            `)
                        }
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
                    var init_section = 0
                    $.each(response, function( key, value ) {
                        var status = key == 0? 'active':''

                        if(key%4==0 || key == 0){
                            init_section++
                            $("#list_fasilitas").append(`<div class="carousel-item `+status+`"><div class="row" id=fasilitas_section_list_${init_section}></div></div>`)
                        }

                        $("#fasilitas_section_list_"+init_section).append(`
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">${value.nama}</h4>
                                        <p class="card-text">${value.keterangan}</p>
                                    </div>
                                </div>
                            </div>
                        `)
                    });
                } else{
                    for(let i =0; i<3;i++){
                        var active ="";
                        if(i==0){
                            active ="active"
                        }
                        
                        $("#list_fasilitas").append(`
                            <div class="carousel-item `+active+`">
                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Special title treatment</h4>
                                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                                additional content.</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Special title treatment</h4>
                                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                                additional content.</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Special title treatment</h4>
                                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                                additional content.</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Special title treatment</h4>
                                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                                additional content.</p>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                        `)
                    }
                }
            }
        })


    }

    function getBerita(){
        for(let i =0; i<3;i++){
            var active ="";
            if(i==0){
                active ="active"
            }
            
            $(".berita_content").append(`
                <div class="carousel-item `+active+`">
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
            `)
        }
    }
</script>