<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });

    var urlPath ={
        insert_update: "{{ route('home.gambarCarousel.insert_update') }}",
        select: "{{ route('home.gambarCarousel.select') }}",
        delete: "{{ route('home.gambarCarousel.delete') }}",
    }

    getData()

    function getData(id=''){
        var type= 0;
        $.ajax({
            url: urlPath.select,
            data:{
                id: id,
            },
            success: function(response){
                $('#tableData').html('')

                if(response.length>0){
                    $.each(response, function( key, value ) {
                        $('#tableData').append(`
                            <tr>
                                <td>${value.nama}</td>
                                <td><span class="badge badge-success" style="cursor:pointer" onclick="onModal('${value.file}')">Preview File</span></td>
                                <td>
                                    <a href ="javascript:onEdit('${value.id}')" class="btn btn-sm btn-icon-split btn-primary">
                                        <span class="icon"><i class="fa fa-pen" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                    </a>
                                    <a href ="javascript:onDelete('${value.id}','${value.file}')" class="btn btn-sm btn-icon-split btn-danger">
                                        <span class="icon"><i class="fa fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus</span>
                                    </a>
                                </td>
                            </tr>
                        `)
                    });
                }
            }
        })
    }

    function onEdit(id){
        var type= 0;
        // $('#btn-preview').html('')
        $.ajax({
            url: urlPath.select,
            data:{
                id: id,
                type: type
            },
            success: function(response){
                $.each( response, function( key, value ) {
                    if(key != 'file'){
                        $("#"+key).val(value);
                    }
                }) 

                if(response.file != null){
                    $('#btn-preview').html(`<span class="badge badge-success" style="cursor:pointer" onclick="onModal('${response.file}')">Preview File</span>`)
                }

                $('.formTitle').html('Edit Fasilitas')
                $('.btnBatal').show()
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
                const formElement = $('#formData')[0];
                const form = new FormData(formElement);

                $.ajax({
                    url: urlPath.insert_update,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.success == true){
                            swal("Success !", response.message, "success");
                            onReset()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        });
    }

    function onDelete(id,file)
    {
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menghapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                $.ajax({
                    url: urlPath.delete,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id,
                        file:file
                    },
                    type: 'POST',
                    success: function(response){
                        if(response.success == true){
                            swal("Success !", response.message, "success");
                            onReset()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        });
    }

    function onReset(){
        getData()
        $("#id").val('')
        $('#btn-preview').remove()
        $('#formData')[0].reset();
        $('.formTitle').html('Tambah Fasilitas')
        $('.btnBatal').hide()
    }

    function onModal(file){
        var url = window.location.origin+'/storage/images/carousel/'+file;
        $('.modal-body').html(' <embed src="'+url+'" width="100%" ></embed>')
        $('#modal_detail').modal('show')
    }
 </script>