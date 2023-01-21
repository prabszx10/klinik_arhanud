<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    
<script>
    getAgama()
    // $('#example').DataTable();

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
                        console.log(response)
                        swal("Success !", response.message, "success");
                        $('.form_pasien').hide()
                        $('#pasien_nama').html(response.data['nama'])
                        $('.form_antrian').show()
                        $('#id_pasien').val(response.data['id'])
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
            swal("Warning", "Anda Belum Mengisi Field", "warning");
        }
        
    }

    function daftarAntrian(){
        var id_pasien = $('#id_pasien').val();
        
        $.ajax({
                url: "{{ route('daftarOnline.daftarAntrian') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id_pasien
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
    }
</script>