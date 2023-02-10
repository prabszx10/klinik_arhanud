<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });

    var urlPath ={
        insert_update: "{{ route('antrian.insert_update') }}",
        select: "{{ route('select.antrian') }}",
        delete: "{{ route('antrian.delete') }}",
        onAntrian: "{{ route('antrian.onAntrian') }}",
        onDetail: "{{ route('antrian.onDetail') }}",
    }

    getData()
    getAntrianSaatIni()

    function getData(id=''){
        if(id == ''){
            id = 1
        }
        $.ajax({
            url: urlPath.select,
            data:{
                id: id
            },
            success: function(response){
                $('#tableData').html('')

                if(response.length>0){
                    $.each( response, function( key, value ) {
                        var status = ''
                        var badge = ''
                        if(value.status == 0){
                            status ='MENUNGGU'
                            badge = 'warning'
                        } else if(value.status == 1){
                            status ='LEWATI'
                            badge = 'secondary'
                        } else if(value.status == 2){
                            status ='SELESAI'
                            badge = 'success'
                        } else{
                            status ='DIBATALKAN'
                            badge = 'danger'
                        }

                        $('#tableData').append(`
                            <tr>
                                <td>${value.no_antrian}${value.poli_kode}</td>
                                <td>${value.pasien_no_bpjs==null? '-':value.pasien_no_bpjs}</td>
                                <td>${value.pasien_nama}</td>
                                <td><span class="badge badge-${badge}">${status}</span></td>
                                <td>
                                    <a href ="javascript:onDetail('${value.pasien_id}','${value.id}')" class="btn btn-sm btn-icon-split btn-primary">
                                        <span class="icon"><i class="fa fa-pen" style="padding-top: 4px;"></i></span><span class="text">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        `)
                    });
                }
            }
        })
    }

    function getAntrianSaatIni(){
        $('.poli_gigi').html(0)
        $('.poli_umum').html(0)
        $.ajax({
            url: "{{ route('daftarOnline.antrianSaatIni') }}",
            success: function(response){
                $('.poli_gigi').html(response['Poli Gigi'])
                $('.poli_umum').html(response['Poli Umum'])
            }
        })
    }

    function onDetail(pasien_id,id){
        $.ajax({
            url: urlPath.onDetail,
            data: {
                id: id,
                pasien_id: pasien_id
            },
            success: function(response){
                $.each(response, function( key, value ) {
                    $('#detail_'+key).html(value==null?'-':value)
                });
                $('#modal_detail').modal('show')
            }
        })
    }

   function onAntrian(id,type){
        $.ajax({
            url: urlPath.onAntrian,
            data: {
                id: id,
                type: type
            },
            success: function(response){
                if(response.success == true){
                    getData()
                    getAntrianSaatIni()
                } else{
                    swal("Warning", response.message, "warning");
                }
            }
        })
   }
 </script>