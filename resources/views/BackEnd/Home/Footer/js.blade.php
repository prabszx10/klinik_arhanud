<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var urlPath ={
        insert_update: "{{ route('pasien.insert_update') }}",
        delete: "{{ route('pasien.delete') }}",
        select: "{{ route('select.pasien') }}",
    }

    getData()
    getAgama()

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
                                <td>${value.rm_id==null? '-':value.rm_id}</td>
                                <td>${value.nama}</td>
                                <td>${getAge(value.tgl_lhr)}</td>
                                <td>${value.jk}</td>
                                <td>${value.alamat}</td>
                                <td>${value.hp}</td>
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

    function getAgama(){
        $.ajax({
            url: "{{ route('agama.select') }}",
            success: function(response){
                $('#agama_id_pasien').empty().append(`<option value="" disabled selected>Agama</option>`)
                response.forEach(v => {
                    $('#agama_id_pasien').append(`<option value="${v.id}">${v.nama}</option>`)
                });
            }
        })
    }

    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age+' tahun '+m+' bulan';
    }

    function onAdd(id){
        if(id=='back'){
            $('#data_table').show();
            $('#data_form').hide();
        } else{
            $('#formData')[0].reset();
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
                    $("#"+key+"_pasien").val(value);
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