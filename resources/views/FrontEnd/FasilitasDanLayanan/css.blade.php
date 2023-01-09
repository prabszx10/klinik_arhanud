<style>
    :root {
    --primary: rgb(0, 136, 255);
}

    .button_choose{
        margin-bottom: 0.2vw;
        padding:   1vw;
        width: 100%;
        border: 1px solid var(--primary);
        border-radius: 10px;
        background-color: none;
    }

    .button_choose:hover{
        background-color: var(--primary);
        cursor: pointer;
        color: white;
    }

    .active{
        background-color: var(--primary);
        color: white;
    }

    .background{
        position: relative
    }

    .background .box{
        height: 200px;
        width: 100%;
        background-color: black;
        opacity: 0.5;
        position: absolute;
        z-index: 99

    }

    .background img{
        height: 200px;
        width: 100%;object-fit: cover;
        position: absolute

    }

    .section{
        margin-top: 250px
    }


</style>