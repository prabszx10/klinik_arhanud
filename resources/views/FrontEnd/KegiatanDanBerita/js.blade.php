<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    var urlPath ={
        berita: "{{ route('select.berita') }}",
    }

    getData()
    
    function getData(){
        getBerita()
    }

    function getBerita(){
        $.ajax({
            url: urlPath.berita,
            success: function(response){
                 if(response.length >0){
                    $.each( response, function( key, value ) {
                        var date = moment(value.created_at).format('dddd, D MMM YYYY');

                            if(key == 0){
                                var url = window.location.origin+'/storage/images/berita/'+value.file;
                                $('#berita_terbaru').html(`
                                    <img src="${url}">
                                    <div class="bottom-left"><div><h2>${value.judul}</h2><h6>${date}</h6></div></div>
                                `)
                            }
                            $('.list_berita').append(`
                                <div class="item_list_berita">
                                    <h5>${value.judul}</h5>
                                    <p>${date}</p>
                                </div>
                            `)
                     });
                 } else{
                     $('.list_berita').append(`
                            <div class="item_list_berita">
                                <h5>Ini Berita Terknin yang Wajib Kamu lihat disetiap daerah</h5>
                                <p>Selasa, 3 Desember 2023</p>
                            </div>

                            <div class="item_list_berita">
                                <h5>Ini Berita Terknin yang Wajib Kamu lihat disetiap daerah</h5>
                                <p>Selasa, 3 Desember 2023</p>
                            </div>
                            <div class="item_list_berita">
                                <h5>Ini Berita Terknin yang Wajib Kamu lihat disetiap daerah</h5>
                                <p>Selasa, 3 Desember 2023</p>
                            </div>
                     `)
                 }
            }
        })
    }

</script>