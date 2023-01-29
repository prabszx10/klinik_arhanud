<style>

    :root {
        --primary: rgb(0, 136, 255);
        --primaryOpacity: rgb(0, 136, 255, 0.2);
    }

    .card_box{
        padding: 5%;
        border-radius: 10px;
        border: none;
        box-shadow: 5px 10px 8px 10px var(--primaryOpacity);
        margin: 2% auto;
        width: 90%;
        min-height: 500px;
    }

    .card_box h3{
        text-align: center;
        color: var(--primary)
    }

    .card_box p{
        margin: 5% 0 0 0;
        text-align: center;
    }

    .card_box .button_choose{
        margin: 10px;
        text-align: center;
        font-weight: bold;
    }

    .card_box .button_choose button{
        cursor: pointer;
        border-radius: 20px;
        border: none;
        padding: 10px
    
    }

    .check_nik,.check_poli{
        margin: 1% auto 1%;
        border-radius: 20px;
        border: 1px solid var(--primary);
        width: 60%
    }

    .check_poli{
        margin-top: 0
    }

    .center{
        text-align: center;
        margin: 0 auto
    }

    .center .btn{
        width: 40%;
        border-radius: 20px;
        border: none;
    }

    .antrian{
        margin: 5%
    }

    

    .antrian_box{
        padding: 10%;
        border: 2px solid var(--primary);
        border-radius: 20px;
    }

    .informasi_pasien{
        margin: 3vw;
        display: flex;
        gap: 1vw;
    }

    .data_pribadi{
        padding: 1vw;
        /* background: red; */
        width: 40%;
        border: 2px solid var(--primary);
        border-radius: 20px;
    }

    .no_antrian_pasien{
        padding: 1vw;
        /* background: blue; */
        width: 60%;
        text-align: center;
        border: 2px solid var(--primary);
        border-radius: 20px;
    }
    
    .no_antrian{
        font-size: 8vw
    }
</style>