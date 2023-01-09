<script>
    isActive('btn-1')
    function isActive(type){
        $('.button_choose').removeClass("active")
        $('#'+type).addClass("active")
    }
</script>