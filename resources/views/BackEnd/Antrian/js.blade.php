<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var history_data = '';
    $(document).ready(function () {
        $('#example').DataTable();
    });

    var urlPath ={
        insert_update: "{{ route('antrian.insert_update') }}",
        select: "{{ route('select.antrian') }}",
        delete: "{{ route('antrian.delete') }}",
        onAntrian: "{{ route('antrian.onAntrian') }}",
        onDetail: "{{ route('antrian.onDetail') }}",
        selectPoli: "{{ route('select.poli') }}",
    }

    getData()
    getPoli()

    function getData(id=''){
        if(id == ''){
            id = 1
        }
        $.ajax({
            url: urlPath.select,
            data:{
                id: id,
                history: history_data
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
        $('.no_antrian_saat_ini').html(0)
        $.ajax({
            url: "{{ route('poli.antrian') }}",
            success: function(response){
                if(response.length>0){
                    $.each(response, function( key, value ) {
                        $('#poli_'+value.id).html(value.antrian)
                    });
                }
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

   function onShowTab(type){
        if(type == 'history'){
            $('#antrian_list').hide()
            history_data = 'history';
            getData()
        } else{
            $('#antrian_list').show()
            history_data = '';
            getData()
        }
   }

   function getPoli(){
        $.ajax({
            url: urlPath.selectPoli,
            success: function(response){
                

                if(response.length>0){
                    $.each( response, function( key, value ) {
                        var status = '';

                        if(key==0){
                            status = 'active'
                        }

                        $('#antrian_list').append(`
                            <div class="col-4 p-3">
                                <div class="card center">
                                    <div class="card-body row bg-info text-light rounded">
                                        <div class="col-8">
                                            <h2 class="card-title">${value.nama}</h2>
                                            <a href="javascript:onAntrian(${value.id},'skip')" class="btn btn-danger">Lewati <span
                                                    class="fa fa-times"></span></a>
                                            <a href="javascript:onAntrian(${value.id},'next')" class="btn btn-success">Lanjut <span
                                                    class="fa fa-chevron-right"></span></a>
                                        </div>
                                        <div class="col-4">
                                            <h1 class="card-subtitle no_antrian_saat_ini" id="poli_${value.id}" style="font-size: 60px">0</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `)

                        $('#poli_tab').append(`
                            <li class="nav-item">
                                <a class="nav-link ${status}" data-toggle="tab" href="#tab_table" onclick="getData(${value.id})">${value.nama}</a>
                            </li>
                        `)
                    });

                    getAntrianSaatIni()
                } else{
                    
                }
            }
        })
    }
 </script>