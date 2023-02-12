<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var urlPath ={
        insert_update: "{{ route('tentangKami.insert_update') }}",
        select: "{{ route('tentangKami.select') }}",
    }

    onSelect('visi')
    onSelect('misi')
    function onSelect(type){
        $.ajax({
            url: urlPath.select,
            data: {
                id:type
            },
            success: function(response){
                $.each( response[type], function( key, value ) {
                    var id_temp = type+'_'+$('.misi_item').length
                    $('#list_'+type).append(`
                            <div class="d-flex align-items-center mt-2 misi_item" style="justify-content: space-between;" id="item_`+id_temp+`">
                                <i class="fas fa-trash" style="color:red;cursor:pointer;margin-right:10px" onclick="onDeleteTemp('`+id_temp+`')"></i>
                                <input type="text" name="`+type+`[]" class="form-control" placeholder="Inputkan `+type+`" value="`+value+`">
                            </div>
                    `);
                })
            }
        })
    }


    function onAdd(type){
        var id_temp = type+'_'+$('.misi_item').length
       $('#list_'+type).append(`
            <div class="d-flex align-items-center mt-2 misi_item" style="justify-content: space-between;" id="item_`+id_temp+`">
                <i class="fas fa-trash" style="color:red;cursor:pointer;margin-right:10px" onclick="onDeleteTemp('`+id_temp+`')"></i>
                <input type="text" name="`+type+`[]" class="form-control" placeholder="Inputkan `+type+`">
            </div>
       `);
    }

    function onDeleteTemp(id){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menghapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                $('#item_'+id).remove()
            }
        });
    }

    function onSave(type){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                var form = $('#formData'+type).serializeArray()
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