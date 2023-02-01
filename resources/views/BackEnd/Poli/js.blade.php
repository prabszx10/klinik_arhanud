<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var urlPath ={
        insert_update: "{{ route('poli.insert_update') }}",
        select: "{{ route('poli.select') }}",
        delete: "{{ route('poli.delete') }}",
    }

    getData()

    function getData(){
        $.ajax({
            url: urlPath.select,
            success: function(response){
                $('#tableData').html('')

                if(response.length>0){
                    $.each( response, function( key, value ) {
                        var status = value.status == 1? 'Active':'Deactive'
                        var label = value.status == 1? 'label-primary':'label-danger'

                        $('#tableData').append(`
                            <tr>
                                <td>${value.nama}</td>
                                <td>${value.keterangan==null? '-':value.keterangan}</td>
                                <td><span class="label ${label}">${status}</span></td>
                                <td>
                                    <a href ="javascript:onAdd('${value.id}')" class="btn btn-sm btn-icon-split btn-warning">
                                        <span class="icon"><i class="fa fa-pen" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                    </a>
                                    <a href ="javascript:onDelete('${value.id}')" class="btn btn-sm btn-icon-split btn-danger">
                                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus</span></a>

                                </td>
                            </tr>
                        `)
                    });
                }
            }
        })
    }

    function onAdd(id){
        if(id=='back'){
            $('#data_table').show();
            $('#data_form').hide();
        } else{
            $('#data_table').hide();
            $('#data_form').show();

            if(id != undefined){
                onEdit(id);
            }
        }
    }

    function onEdit(id){
        $.ajax({
            url: urlPath.select,
            data: {
                id:id
            },
            success: function(response){
                $.each( response, function( key, value ) {
                    $("#"+key+"_poli").val(value);
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
        onAdd('back')
        getData()
        $('#formData')[0].reset();
    }

    function onDelete(id)
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
                        id:id
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

 </script>