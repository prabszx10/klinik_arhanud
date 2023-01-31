<script>
    getAgama()
    getPoli()
    getAntrianSaatIni()

    function getAgama(){
        $.ajax({
            url: "{{ route('agama.select') }}",
            success: function(response){
                $('#Agama').empty().append(`<option value="" disabled selected>Agama</option>`)
                response.forEach(v => {
                    $('#Agama').append(`<option value="${v.id}">${v.nama}</option>`)
                });
            }
        })
    }

    function getPoli(){
        $.ajax({
            url: "{{ route('poli.select') }}",
            success: function(response){
                $('#poli_id').empty().append(`<option value="" disabled selected>Pilih Poli</option>`)
                response.forEach(v => {
                    $('#poli_id').append(`<option value="${v.id}">${v.nama}</option>`)
                });
            }
        })
    }

    function getAntrianSaatIni(){
        $.ajax({
            url: "{{ route('daftarOnline.antrianSaatIni') }}",
            success: function(response){
                $('.poli_gigi').html(response['Poli Gigi'])
                $('.poli_umum').html(response['Poli Umum'])

            }
        })
    }

    function onshow(type){
        $('.front_page').hide()
        $('.'+type).show()
    }

    function onBack(type){
        $('.front_page').show()
        $('.'+type).hide()
    }

    function redirect(type){
        $('.form_pasien').show()
        $('.form_registrasi').hide()
    }

    function save(){
        var form = $('#form_registrasi').serializeArray()

        $.ajax({
            url: "{{ route('daftarOnline.registrasi') }}",
            data: form,
            type: 'POST',
            success: function(response){
                if(response.success == true){
                    swal("Success !", response.message, "success");
                    redirect()
                    $('#form_registrasi')[0].reset();
                } else if(response.success == "error"){
                    swal("Error !", "Harap Hubungi Administrator "+response.message, "error");
                } else{
                    swal("Warning", response.message, "warning");
                }
            }
        })
    }

    function checkData(){
        var find = $('#check_NIK').val()

        if(find.length>0){
            $.ajax({
                url: "{{ route('daftarOnline.checkPasien') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: find
                },
                type: 'POST',
                success: function(response){
                    if(response.success == true){
                        var data = response.data
                        var antrian = response.antrian
                        
                        $.each(data, function(index, value) {
                            $('.pasien_'+index).html(value)
                        });

                        swal("Success !", response.message, "success");
                        $('.form_pasien').hide()
                        $('.form_antrian').show()
                        $('#id_pasien').val(response.data['id'])

                        if(antrian != null){
                            $('#no_anda').html(antrian.no_antrian+antrian.poli_kode)
                        }

                        if(antrian > 0){
                            $('#btn_daftar_antrian').html('Ganti No Antrian')
                        }
                    } else{
                        swal("Warning", response.message, "warning");
                    }
                }
            })
        } else{
            swal("Warning", "Anda Belum Mengisi Field", "warning");
        }
        
    }

    function onSelectPoli(){
        $('#exampleModalCenter').modal('show');
    }

    function daftarAntrian(){
        var id_pasien = $('#id_pasien').val();
        var poli_id = $('#poli_id').val();
        
        if(poli_id != null){
            $.ajax({
                url: "{{ route('daftarOnline.daftarAntrian') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id_pasien,
                    poli_id: poli_id
                },
                type: 'POST',
                success: function(response){
                    if(response.success == true){
                        swal("Success !", response.message, "success");
                        $('#no_anda').html(response.antrian)
                        if(response.antrian > 0){
                            $('#btn_daftar_antrian').html('Ganti No Antrian')
                        }
                    } else{
                        swal("Warning", response.message, "warning");
                    }
                }
            })
        } else{
            swal("Warning", "Pilih Poli Terlebih Dahulu", "warning");
        }
        
    }
</script>