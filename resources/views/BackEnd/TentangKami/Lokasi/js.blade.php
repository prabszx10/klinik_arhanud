<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var urlPath ={
        insert_update: "{{ route('tentangKami.insert_update') }}",
        select: "{{ route('tentangKami.select') }}",
    }

    onSelect('lokasi')
    function onSelect(id){
        $.ajax({
            url: urlPath.select,
            data: {
                id:id
            },
            success: function(response){
                $.each( response, function( key, value ) {
                    $("#"+key).val(value);
                })
            }
        })
    }

    function onSave(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                var form = $('#formData').serializeArray()
                $.ajax({
                    url: urlPath.insert_update,
                    data: form,
                    type: 'POST',
                    success: function(response){
                        if(response.success == true){
                            swal("Success !", response.message, "success");
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        });
    }



 </script>