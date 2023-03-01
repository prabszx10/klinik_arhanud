<style>
    :root {
        --primary:  #1AB1E5;
    }

    .group_berita{
        display: flex;
        gap: 1vw
    }

    .group_berita .left{
        width: 70%;
        position: relative;
    }

    .group_berita .left img{
        cursor: pointer;
        /* border: 5px solid var(--primary); */
        border-radius: 10px;
        width: 100%;
        height: 500px;
        object-fit: cover
    }

    .bottom-left {
        border-radius: 10px;
        position: absolute;
        bottom: 0px;
        left: 0px;
        color: white;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgb(27, 26, 26));
        width: 100%;
        min-height: 100px
    }

    .bottom-left div{
        padding: 1vw
    }

    .bottom-left div h6{
        color: var(--primary)
    }

    .group_berita .right{
        width: 30%;
        background-color: var(--primary);
        border-radius: 10px;
        padding: 1vw;
        max-height: 500px
    }

    .group_berita .right h4{
        color: white;
        text-align: center;
    }
   
    .group_berita .right .line{
        width: 100%;
        background-color: #fff;
        height: 2px;
        margin: 0 auto
    }

    .group_berita .right .list_berita{
        padding: 2vw 0;
        height:400px;
        overflow-y: scroll;
    }

    .group_berita .right .list_berita .item_list_berita{
        margin-top: 1vw;
        cursor: pointer;
        background-color: white;
        color: var(--primary);
        padding: 0.5vw 1vw;
        border-radius: 10px
    }

    .group_berita .right .list_berita .item_list_berita p{
        padding: 0;
        margin: 0
    }
    
    .group_berita .right .list_berita .item_list_berita:hover{
        background-color: #1AB1E5;
        color:white;
        border: 1px solid white
    }
</style>