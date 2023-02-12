<script>
    $('.isactive').removeClass( "isactive" );
    $('#tentangKami').addClass( "isactive" );

    var urlPath ={
        tentangKami: "{{ route('select.tentangKami') }}",
    }

    getData()
    
    function getData(){
        getInformasiSingkat()
    }

    function getInformasiSingkat(){
        $.ajax({
            url: urlPath.tentangKami,
            data:{
                type: type
            },
            success: function(response){
                 if(response.length >0){

                 } else{

                 }
            }
        })
    }
</script>