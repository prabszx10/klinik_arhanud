<style>
    :root {
        --primary: #1AB1E5;
    }

    .title_content {
        background-color: var(--primary);
        color: white;
        padding: 3vw;
    }

    /* informasi */
    .informasi_singkat {
        padding: 5vw 10vw;
        display: flex;
    }

    .informasi_singkat>* {
        flex: 1 1;
    }

    .informasi_singkat h2 {
        color: var(--primary);
    }

    /* visi misi */
    .visi_misi {
        background-color: #f9f9f9;
        padding: 5vw 18vw;
        display: flex;
        gap: 1vw
    }

    .visi_misi>* {
        flex: 1 1;
    }

    .visi,
    .misi h2 {
        text-align: center;
        color: var(--primary);
    }

    .visi,
    .misi {
        padding: 1vw;
        box-shadow: 0 4px 8px 0 #cff3ff, 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 10px
    }


    .item_list {
        padding: 1vw;
        box-shadow: 0 4px 8px 0 #cff3ff, 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 10px
    }

    /* fasilitas */
    .fasilitas {
        padding: 5vw 10vw;
    }

    .fasilitas h2 {
        text-align: center;
        color: var(--primary);
    }

    /* layanan */
    .layanan {
        background-color: #f9f9f9;
        padding: 5vw 10vw;
    }

    .layanan h2 {
        text-align: center;
        color: var(--primary);
    }

    /* lokasi */
    .lokasi {

        padding: 5vw 18vw;
        display: flex;
        gap: 1vw
    }

    .lokasi>* {
        flex: 1 1;
    }

    .lokasi h2 {
        color: var(--primary);
    }

    /* mitra */
    .mitra {
        background-color: #f9f9f9;

        padding: 5vw 18vw;
    }

    .mitra h2 {
        text-align: center;
        color: var(--primary);
    }

    .list_kemitraan{
        text-align: center;
        margin: 2vw
    }

    ul {
        color: var(--primary);
        text-align: left;
        margin: 0;
    }

    .text-wrapper {
        color: black;
    }

    .list_fasilitas, .list_layanan {
        margin-top: 3vw;
        padding: 0;
        list-style: none;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .container_foto {
        border-radius: 10px;
        background-color: rgba(57, 62, 93, 0.7);
        padding: 0;
        overflow: hidden;
    }

    .container_foto article {
        padding: 10%;
        position: absolute;
        bottom: 0;
        z-index: 1;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .container_foto h3 {
        color: #fff;
        font-weight: 800;
        font-size: 25px;
        border-bottom: #fff solid 1px;
    }

    .container_foto h4 {
        font-weight: 300;
        color: #fff;
        font-size: 16px;
    }

    .container_foto img {
        object-fit: cover;
        width: 100%;
        height: 300px;
        top: 0;
        left: 0;
        opacity: 0.4;
        -webkit-transition: all 4s ease;
        -moz-transition: all 4s ease;
        -o-transition: all 4s ease;
        -ms-transition: all 4s ease;
        transition: all 4s ease;
    }

    .ver_mas {
        background-color: var(--primary);
        position: absolute;
        width: 100%;
        height: 70px;
        bottom: 0;
        z-index: 1;
        opacity: 0;
        transform: translate(0px, 70px);
        -webkit-transform: translate(0px, 70px);
        -moz-transform: translate(0px, 70px);
        -o-transform: translate(0px, 70px);
        -ms-transform: translate(0px, 70px);
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .ver_mas span {
        font-size: 40px;
        color: #fff;
        position: relative;
        margin: 0 auto;
        width: 100%;
        top: 13px;
    }


    /*hovers*/

    .container_foto:hover {
        cursor: pointer;
    }

    .container_foto:hover img {
        opacity: 0.1;
        transform: scale(1.5);
    }

    .container_foto:hover article {
        transform: translate(2px, -69px);
        -webkit-transform: translate(2px, -69px);
        -moz-transform: translate(2px, -69px);
        -o-transform: translate(2px, -69px);
        -ms-transform: translate(2px, -69px);
    }

    .container_foto:hover .ver_mas {
        transform: translate(0px, 0px);
        -webkit-transform: translate(0px, 0px);
        -moz-transform: translate(0px, 0px);
        -o-transform: translate(0px, 0px);
        -ms-transform: translate(0px, 0px);
        opacity: 1;
    }

</style>
