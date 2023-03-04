<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cycling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,300&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"rel="stylesheet"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>

        :root{
        --main-color: #f05812;
        --back: #000;
        --light-color: #868e96; 
        }
        *{
            margin: 0;
            padding: 0;
            /* font-family: 'Montserrat', sans-serif; */
            /* font-family: 'PT Sans', sans-serif; */
            font-family: 'Poppins', sans-serif;
            
        }
         /* CYCLING */
        .item-cycling{
            width: 1400px;
            height: 780px;
            background-image: url(https://images.pexels.com/photos/163491/bike-mountain-mountain-biking-trail-163491.jpeg);
            background-size: cover;
            position: relative;
            /* font-family: 'Montserrat', sans-serif; */
        }
        .item1-cycling{
            width: 1400px;
            height: 700px;
            background-color: transparent;
            position: relative;
        }
        .item1-cycling img{
            position: absolute;
            width: 900px;
            height: 600px;
            bottom: -100px;
            left: -220px;
        }
        @media (max-width: 950px){
            .item1-cycling img{
                left: -390px;
                position: absolute;
            }
        }
        .item-con-cycling{
            width: 55%;
            height: 100%;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%, 0 0, 50% 0);
            background-image: url(https://images.pexels.com/photos/5825604/pexels-photo-5825604.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            background-size: cover;
            opacity: 12%;
        }
        .item-text-cycling{
            width: 55%;
            height: 100%;
            position: absolute;
            margin: 60px 60px;
        }
        
        @media (max-width: 550px) {
        .item-text-cycling {
            position: absolute;
            margin: 10px 3px;
        }}

        @media (max-width: 650px) {
        .item-text-cycling {
            position: absolute;
            margin: 15px 6px;
        }}

        @media (max-width: 950px) {
        .item-text-cycling {
            position: absolute;
            margin: 22px 8px;
        }}

        .fade-in-left {
        animation: fadeInLeft 1s;
        }

        @keyframes fadeInLeft {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
        }

        .item-text-cycling h1{
            font-family: 'Montserrat', sans-serif;
            color: black;
            font-size: 90px;
            font-weight: 700;
        }
        .item-text-cycling h2{
            font-family: 'Montserrat', sans-serif;
            font-size: 40px;
            font-weight:900;
            letter-spacing: 3px;
            color: white;
            
        }
        .item-text-cycling p{
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            color:white;
            font-weight: 300;
        }
        .text-box-cycling{
            margin-top: 250px;
            width: 60%;
            height: 5%;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            overflow: hidden;
            position: relative;
        }
        .text-box-cycling p{
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            color:white;
            font-weight: 800;
            position: absolute;
            top: 8px;
        }
        @media (max-width: 600px) {
        .text-box-cycling p {
            font-size: 10px;
            top: 5px;
        }}
        .btn-cycling{
            margin-top: 10px;
            width: 30%;
            height: 8%;
            overflow: hidden;
            background-color: rgb(147, 147, 147);
            position: relative;
            --color: #000000;
            --color2: #000000;
            padding: 0.8em 1.75em;
            /* background-color: white; */
            border-radius: 5px;
            border: none;
            transition: .5s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            z-index: 1;
            font-weight: 300;
            font-size: 17px;
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            text-transform: uppercase;
            color: var(--color);
            }
        .btn-cycling p{
            color: rgb(255, 255, 255);
            font-weight: 900;
            font-size: 15px;
            position: absolute;
            top: 20px;
        }
        @media (max-width:600px){
            .btn-cycling {
                height: 4%;
            }}
        @media (max-width:600px){
            .btn-cycling p {
                font-size: 8px;
                top:8px;
            }}
        .btn-cycling::after, .btn-cycling::before {
            content: '';
            display: block;
            height: 100%;
            width: 100%;
            transform: skew(90deg) translate(-50%, -50%);
            position: absolute;
            inset: 50%;
            left: 25%;
            z-index: -1;
            transition: .5s ease-out;
            background-color: var(--color2);
            }

            .btn-cycling::before {
            top: -50%;
            left: -25%;
            transform: skew(90deg) rotate(180deg) translate(-50%, -50%);
            }

            .btn-cycling:hover::before {
            transform: skew(45deg) rotate(180deg) translate(-50%, -50%);
            background-color: var(--color2);
            }

            .btn-cycling:hover::after {
            transform: skew(45deg) translate(-50%, -50%);
            background-color: var(--color2);
            }

            .btn-cycling:hover {
            color: var(--color2);
            }

            .btn-cycling:active {
            filter: brightness(.7);
            transform: scale(.98);
            }
            .item-text2-cycling{
                width: 55%;
                height: 100%;
                position: absolute;
                right: 0;
                margin: 100px 0 0 60px;
                font-family: 'Work Sans', sans-serif;
                overflow: hidden;
            }

            .item-hr-cycling{
                width: 20%;
                border-bottom: red;
                border: 2px solid red ;
                margin-top: 10px;
                border-radius: 50px;
            }
            .item-text2-cycling p{
                margin-top: 20px;
                font-weight: 400;
                font-size: 23px;
            }
            /* @media (max-width: 550px){
            .item-text2 p{
                font-size: 10px;
                font-size: 300;
            }} */
            @media (max-width: 1000px){
            .item-text2-cycling p{
                font-size: 16px;
                font-size: 300;
            }}
            .cta-cycling {
            border: none;
            background: none;
            font-weight: 800;
            margin-top: 100px;
            }
            @media (max-width:550px){
                .cta-cycling {
                    margin-top: 15px;
                }
            }
            @media (max-width:1000px){
                .cta-cycling {
                    margin-top: 30px;
                }
            }

            .cta-cycling span {
            padding-bottom: 7px;
            letter-spacing: 4px;
            font-size: 14px;
            padding-right: 15px;
            text-transform: uppercase;
            }

            .cta-cycling svg {
            transform: translateX(-8px);
            transition: all 0.3s ease;
            }

            .cta-cycling:hover svg {
            transform: translateX(0);
            }

            .cta-cycling:active svg {
            transform: scale(0.9);
            }

            .hover-underline-animation {
            position: relative;
            color: black;
            padding-bottom: 20px;
            }

            .hover-underline-animation:after {
            content: "";
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #000000;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
            }

            .cta-cycling:hover .hover-underline-animation:after {
            transform: scaleX(1);
            transform-origin: bottom left;
            }
            .fade-in-right {
            animation: fadeInRight 2s;
            }

            @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(20px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
            }
            /* SWIMMING */
            .item-swim{
                font-family: 'Montserrat', sans-serif;
                margin-top: 110px;
                width: 1400px;
                height: 550px;
                /* border: 1px solid black; */
                position: relative;
                background-image: url(https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg);
                background-size: cover;
                font-family: 'Playfair Display', serif;
                /* border-radius: 4px; */
            }
            .item-text-swim{
                width: 70%;
                height: 550px;
                color: white;
                position: absolute;
                /* margin: 20px 0 0 20px; */
                background-color: rgb(21, 139, 177);
                /* padding: 5px 5px ; */
                opacity: 0.49;
                border-radius: 8px;

            }
            @media (max-width:555px){
                .item-text-swim{
                    width: 100%;
                    opacity: 0.38;
                }
            }
            .item-text1-swim{
                width: 60%;
                color: white;
                position: absolute;
                margin: 20px 0 0 20px;
            }
            @media (max-width:555px){
                .item-text1-swim{
                    margin: 7px;
                }
            }
            .item-text1-swim h1{
                /* margin-top: 20px; */
                font-size: 55px;
                letter-spacing: 5px;
                
            }
            @media (max-width:555px){
                .item-text1-swim h1{
                    font-size: 30px;
                    letter-spacing: 1px;
                }
            }
            .item-text1-swim h2{
                margin-top: 20px;
                font-size: 20px;
                
            }
            @media (max-width:555px){
                .item-text1-swim h2{
                    margin-top: 15px;
                    font-size: 11px;
                }
            }
            @media (min-width:556px) and (max-width:1000px){
                .item-text1-swim h2{
                    margin-top: 20px;
                    font-size: 16px;
                }
            }
            /* @media (max-width:900px){
                .item-text1 h2{
                    margin-top: 15px;
                    font-size: 14px;
                }
            } */
            .item-text1-swim h3{
                font-size: large;
                margin-top: 135px;
                color: black;
            }
            @media (max-width:555px){
                .item-text1-swim h3{
                    margin-top: 10px;
                    font-size: 14px ;
                }
            }

            @media (max-width:900px){
                .item-text1-swim h3{
                    margin-top: 50px;
                    font-size: 15px ;
                }
            }
            
            @media (max-width:600px){
                .item1-swim{
                    display: flex;
                    flex-wrap: wrap;
                }
            }
            .btnswimming {
                margin:15px 0 0 10px;
                background: #fff;
                border: none;
                padding: 10px 20px;
                display: inline-block;
                font-size: 10px;
                font-weight: 600;
                width: 120px;
                text-transform: uppercase;
                cursor: pointer;
                transform: skew(-21deg);
                }

                span {
                display: inline-block;
                transform: skew(1deg);
                }

            .btnswimming::before {
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                right: 100%;
                left: 0;
                background: rgb(20, 20, 20);
                opacity: 0;
                z-index: -1;
                transition: all 0.5s;
                }

            .btnswimming:hover {
                color: #fff;
                }

            .btnswimming:hover::before {
                left: 0;
                right: 0;
                opacity: 1;
                }
                @media (max-width:555px){
                    .btnswimming {
                        margin-top: 5px;
                        font-size: 10px;
                        padding: 3px 2px;
                    }
                }
                .item1-swim{
                    width: 1400px;
                    height: auto;
                    padding: 5px 0 20px 0;
                    position: relative;
                    margin-top: 10px;
                    display:flex;
                    flex-wrap: wrap;
                    justify-content: space-between;

                }
                .item1-con-swim{
                    width: 31%;
                    height: auto;
                    position: relative;
                    overflow: hidden;
                    transform: scale(1);
                    transition: all 0.4s ease-out;
                }
                .item1-con-swim img{
                    width: 100%;
                    height: auto;
                    border-radius: 5px;
                }
                .item1-con-swim:hover{
                    width: 32%;
                    top: -5px;
                    margin-top: 7px;
                    transform: scale(1.1);
                    box-shadow: 0px 5px 5px rgba(0,0,0,0.9);
                }
                
                .container-ex{
                    font-family: 'Montserrat', sans-serif;
                    position: relative;
                    width: 1400px;
                    height: 700px;
                    background-color: azure;
                }
                .item-ex{
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    background-image: url(https://images.pexels.com/photos/7894486/pexels-photo-7894486.jpeg);
                    background-size: cover;
                }
                .item-ex2{
                    width: 40%;
                    height: 560px;
                    position: absolute;
                    margin: 5% 3%;
                    border-radius: 40px;
                    background: #e0e0e0;
                    box-shadow:  22px 22px 44px #bebebe,
                    -22px -22px 44px #ffffff;
                }
                .item-ex2 h1{
                    margin-top: 20px;
                    font-size: 45px;
                    text-shadow: 6px 6px 4px rgb(168, 164, 163);
                    text-align: center;
                    font-weight: 900;
                }
                ul{
                    margin-top: 40px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                }
                .item-ex2 li{
                    margin: 20px 0 10px 25px;
                    list-style: none;
                    font-size: 30px;
                    font-style: italic;
                    font-weight: 600;
                }
                .btn-ex {
                position: relative;
                font-size: 17px;
                text-transform: uppercase;
                text-decoration: none;
                padding: 1em 2.5em;
                display: inline-block;
                border-radius: 6em;
                transition: all .2s;
                border: none;
                font-family: inherit;
                font-weight: 500;
                color: black;
                background-color: white;
                }

                .btn-ex:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                }

                .btn-ex:active {
                transform: translateY(-1px);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                }

                .btn-ex::after {
                content: "";
                display: inline-block;
                height: 100%;
                width: 100%;
                border-radius: 100px;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                transition: all .4s;
                }

                .btn-ex::after {
                background-color: #fff;
                }

                .btn-ex:hover::after {
                transform: scaleX(1.4) scaleY(1.6);
                opacity: 0;
                }
                .item-ex2-btn{
                    margin-top: 20px;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                }
                .content-ex{
                    margin-top: 15px;
                    width: 1400px;
                    height: auto;
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    min-height: 50px;
                    justify-content: space-evenly;
                    position: relative;
                }
                .item-content-ex{
                    width: 30%;
                    height: 300px;
                    border-radius: 15px;
                    box-shadow: 5px 5px 9px 5px rgb(139, 137, 137);
                }
                .item-content-ex img{
                    object-fit: cover;
                    width: 100%;
                    height: 100%;
                    border-radius: 15px;
                }
                .btn-content-ex{
                    position: absolute;
                    width: 100px;
                    height: 30px;
                    padding: 5px 10px;
                    margin-left: -400px;
                    margin-top: 240px;
                    background-color: rgb(214, 212, 210);
                    border-radius: 5px;
                    border: none;
                    font-weight: 600;
                    font-size: 20px;
                    cursor: pointer;
                    box-shadow: 1px 1px 5px 1px rgb(182, 177, 177);
                    transform: none;
                    transition: all .8s ease-in-out;
                }
                .btn-content-ex:before {
                    background-color: #ffffff;
                    content: "";
                    display: block;
                    height: 1px;
                    transition: all 1s cubic-bezier(.25,.8,.25,1);
                    width: 0;
                    bottom: 0;
                    left: 0;
                }
                .btn-content-ex:hover{
                    box-shadow: 1px 1px 6px 1px rgb(0, 0, 0);
                    transform: scale(1.1);
                }
                .btn-content-ex:hover:before {
                    background-color: #000000;
                    width: 100%;
                    bottom: 0;
                }
                *{
                padding: 0;
                margin: 0;
                font-family: 'Bitter', serif;
                font-family: 'Montserrat', sans-serif;
            }
            .container-sp{
                font-family: 'Montserrat', sans-serif;
                margin-top: 20px;
                width: 1400px;
                height: 500px;
                background-image: url(https://th.bing.com/th/id/R.5e3afdbc3df8ad43667e88420ede0417?rik=JjM%2fcj47oZPQ3w&riu=http%3a%2f%2fwww.musclemango.com%2fwp-content%2fuploads%2f2019%2f12%2f468884-PFZ4P2-187.jpg&ehk=AvU3cpcXr4j%2fjw6nR2e9EeCx69ODNcpeB0VMgYvAYGg%3d&risl=&pid=ImgRaw&r=0);
                background-size: cover;
                position: relative;
                z-index: 0;
            }
            .container-text{
                margin-top: -500px;
                width: 1400px;
                height: 500px;
                z-index: 2;
                position: absolute;
            }
            .bgr-sp{
                margin-top: 20px;
                margin-left: 15px;
                width: 1385px;
                height: 500px;
                background: linear-gradient(to right, rgb(113, 111, 111),rgb(46, 45, 45));
                opacity: 0.6;
                position: absolute;
                z-index: 1;
            }
            .container-text h1{
                text-align: center;
                position: absolute;
                top: 15%;
                left: 50%;
                transform: translateX(-50%) translateY(-15%);
                color: aliceblue;
                line-height: 1.3;
                letter-spacing: 1px;
                font-style: italic;
                font-size: 40px;
            }
            
            button {
                position: relative;
                display: inline-block;
                cursor: pointer;
                outline: none;
                border: 0;
                vertical-align: middle;
                text-decoration: none;
                background: transparent;
                padding: 0;
                font-size: inherit;
                font-family: inherit;
                }

                button.learn-more {
                width: 12rem;
                height: auto;
                }

                button.learn-more .circle {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: relative;
                display: block;
                margin: 0;
                width: 3rem;
                height: 3rem;
                background: #282936;
                border-radius: 1.625rem;
                }

                button.learn-more .circle .icon {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: absolute;
                top: 0;
                bottom: 0;
                margin: auto;
                background: #fff;
                }

                button.learn-more .circle .icon.arrow {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                left: 0.625rem;
                width: 1.125rem;
                height: 0.125rem;
                background: none;
                }

                button.learn-more .circle .icon.arrow::before {
                position: absolute;
                content: "";
                top: -0.29rem;
                right: 0.0625rem;
                width: 0.625rem;
                height: 0.625rem;
                border-top: 0.125rem solid #fff;
                border-right: 0.125rem solid #fff;
                transform: rotate(45deg);
                }

                button.learn-more .button-text {
                transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                padding: 0.75rem 0;
                margin: 0 0 0 1.85rem;
                color: #ffffff;
                font-weight: 700;
                line-height: 1.6;
                text-align: center;
                text-transform: uppercase;
                }

                button:hover .circle {
                width: 100%;
                }

                button:hover .circle .icon.arrow {
                background: #fff;
                transform: translate(1rem, 0);
                }

                button:hover .button-text {
                color: #fff;
                }
                .btn-sp{
                    position: absolute;
                    top:80%;
                    left: 50%;
                    transform:translateX(-50%) translateY(-80%);
                    }
                .title-sp{
                    width: 1400px;
                    height: 100px;
                    background-color: transparent;
                    color: black;
                }
                .title-sp h2{
                    text-align: center;
                    position: relative;
                    top: 45%;
                    left: 50%;
                    transform: translateX(-50%) translateY(-45%);
                }
                .product-sp{
                    display: grid;
                    grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
                    gap: 13px;
                    padding: 0px 50px;
                }
                .product-sp-item{
                    height: 250px;
                }
                .product-sp-item img{
                    object-fit: cover;
                    width: 100%;
                    height: 100%;
                    border-radius: 10px;
                }
                /* HEADER */
                .header{
                    font-family: 'Poppins', sans-serif;
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    padding: 2rem 9%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    background-color: rgba(255,255,255,.1);
                    box-shadow: 0rem .1rem .5rem rgba(0,0,0,.1);
                    z-index: 100; 
                }
                .header .logo{
                    font-size: 25px;
                    color: #fff;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: .1rem;
                }

                .header .logo span{
                    color: var(--main-color);
                    text-transform: uppercase; 
                }

                .header .navbar a{
                    font-size: 18px;
                    color: #fff;
                    margin: 0 1rem;
                    border: none;
                }

                .header .navbar a:hover{
                    color: var(--main-color);
                }

                .header .icons div{
                    font-size: 2.5rem;
                    color:#222;
                    padding: 0.5rem;
                    cursor: pointer;
                    margin-left: 1rem;
                }

                .header .icons div:hover{
                    /* transform: rotate(180deg); */
                    color: var(--main-color);
                }

                .header .icons a{
                    font-size: 14px;
                    letter-spacing: .1rem;
                    color: #fff;
                    background-color: var(--main-color);
                    font-weight: 500;
                    text-transform: uppercase;
                    padding: 0.8rem 2rem;
                    border: none;
                }

                .header .icons a:hover{
                    color: var(--main-color);
                    background: #fff;
                }

                #menu-btn{
                    display: none;
                }

                .header.active{
                    padding: 2rem 9%;
                    background: rgba(0,0,0,.9);
                }
                /*footer start */
                .footer{
                    margin-top: 5px;
                    background: #222;
                    height: 300px;
                }

                .footer .box-container{
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(35rem, 1fr));
                    height: 254px;
                }

                .footer .box-container .box{
                    padding: 2rem;
                }

                .footer .box-container .box h1{
                    font-size: 22px;
                    color: #fff;
                    font-weight: 600;
                    padding-bottom: 1rem;
                }

                .footer .box-container .box .text{
                    color: #eee;
                    font-size: 15px;
                    font-weight: normal;
                    line-height: 1.8;
                    padding-bottom: 1rem;
                }

                .footer .box-container .box .icons{
                    margin-top: -10px;
                }

                .footer .box-container .box .icons a i{
                    height: 3rem;
                    width: 3rem;
                    line-height: 3rem;
                    background: var(--main-color);
                    text-align: center;
                    font-size: 15px;
                    border-radius: 50%;
                    margin: 0 .5rem;
                    color: #fff;
                }

                .footer .box-container .box .icons a i:hover{
                    color: var(--main-color);
                    background: none;
                    border: .2rem solid var(--main-color);
                }

                .footer .box-container .box .icon a{
                    display: block;
                    color: #fff;
                    font-size: 15px;
                    margin: 1.5rem 0;
                }

                .footer .box-container .box .icon a:hover i{
                    padding-right: 2rem;
                    color: #fff;
                }

                .footer .box-container .box .icon a i{
                    margin-right: 0.5rem;
                    color: var(--main-color);
                }

                .footer .box-container .box .icon a:hover{
                    color: var(--main-color);
                }
                /*footer end */
                .container-fix{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    position: relative;
                }
    </style>
</head>
  <body>
        <header class="header">
            <a href="./index.php" class="logo">Prime<span>Fitness</span></a>
            
            <nav class="navbar">
                <a href="./index.php">Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="./trainer.php">Trainer</a>
                <a href="#">Contact</a>
            </nav>
            <div class="icons">
                <a href="" class="btn">Become a memeber</a>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        </header>
        <div class=" d-flex flex-wrap justify-content-center">
            <div class="item-cycling " >
                <div class="item-text-cycling d-flex flex-column fade-in-left ">
                    <h1>Cycling</h1>
                    <h2>ĐẲNG CẤP QUỐC TẾ</h2>
                    <p>Hãy tới chúng tôi để cùng nhau phát triển bản thân<br>
                        Cùng giúp nhau có một cơ thể khỏe mạnh</p>
                        <div class="text-box-cycling d-flex justify-content-center text-center">
                            <p>TẶNG 1 BUỔI TRẢI NGHIỆM MIỄN PHÍ</p>
                        </div>
                        <button class="btn-cycling d-flex justify-content-center text-center"><p>ĐĂNG KÝ NGAY</p></button>    
                </div>
                <div class="item-con-cycling "></div>
            </div>
            <div class="item1-cycling " >
                <img class="fade-in-left" src="./assets/image/service/pexels-nathan-cowley-1089164-removebg.png" alt="Gym And Fitness">
                <div class="item-text2-cycling d-flex flex-column fade-in-right">
                    <h1>Đạp xe chưa bao giờ tuyệt vời đến thế !</h1>
                    <div class="item-hr-cycling"></div>
                    <p>Cycling là một hoạt động giải trí và thể dục đầy mạnh mẽ, 
                        với việc sử dụng một chiếc xe đạp để di chuyển từ nơi này đến nơi khác.
                        Nó cũng là một hình thức hoạt động giải trí cực kỳ sức khỏe, giúp bạn giảm cân, 
                        tăng sức mạnh và tốt cho sức khỏe của bạn. 
                        Cycling có thể làm tại bất kỳ nơi nào, 
                        từ đường phố của thành phố đến khu vực ngoại ô hoặc quần thể đồi núi. 
                        Nó cũng có thể là một hoạt động cộng đồng, với nhiều nhóm đạp xe và sự kiện được tổ chức hàng năm. 
                        Tất cả trong tất cả, cycling là một trải nghiệm tuyệt vời cho cả cơ thể và tâm hồn của bạn.</p>
                    <button class="cta-cycling">
                        <span class="hover-underline-animation"> TÌM HIỂU THÊM </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </button>    
                </div>
            </div>
        </div>
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="item-swim">
                <div class="item-text-swim"></div>
                <div class="item-text1-swim d-flex flex-column justify-content-center">
                    <h1>SWIMMING</h1>
                    <h2>Bơi lội là một bộ môn thể thao vô cùng thú vị và bổ ích cho sức khỏe.
                         Khi bạn bơi, cơ thể của bạn sẽ được hoạt động toàn diện,
                         tăng cường sự dẻo dai và sức mạnh của cơ bắp, đồng thời giảm căng thẳng và tăng cường khả năng tập trung. 
                         Nếu bạn muốn tìm một cách để tăng cường sức khỏe và thư giãn đồng thời khám phá thế giới dưới nước, hãy thử bơi lội và trải nghiệm sự tự do và nhẹ nhàng khi bạn bơi giữa những dòng nước trong xanh.</h2>
                    <h3>ĐẾN VỚI CHÚNG TÔI ĐỂ KHÁM PHÁ !</h3>
                    <button class="btnswimming">
                        <span>Đăng ký ngay</span>
                    </button>
                </div>
            </div>
            <div class="item1-swim">
                <div class="item1-con-swim">
                    <img src="https://images.pexels.com/photos/2062708/pexels-photo-2062708.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </div>
                <div class="item1-con-swim">
                    <img src="https://images.pexels.com/photos/1415810/pexels-photo-1415810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </div>
                <div class="item1-con-swim">
                    <img src="https://images.pexels.com/photos/73760/swimming-swimmer-female-race-73760.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </div>
            </div>
        </div>
        <div class="container-fix">
        <div class="container-ex">  
            <div class="item-ex"></div>
            <div class="item-ex2">
                <h1>GROUP EXCERCISE</h1>
                <ul>
                    <li>1. TRẢI NGHIỆM THÚ VỊ</li>
                    <li>2. HUẤN LUYỆN VIÊN CHUYÊN NGHIỆP</li>
                    <li>3. MÔI TRƯỜNG LÀNH MẠNH</li>
                    <li>4. MỘT CƠ THỂ KHỎE MẠNH</li>
                </ul>
                <div class="item-ex2-btn">
                    <button class="btn-ex">THAM GIA NGAY</button>
                </div>
            </div>
        </div>
        <div class="content-ex">
            <div class="item-content-ex">
                <img src="https://images.pexels.com/photos/866021/pexels-photo-866021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <button class="btn-content-ex">YOGA</button>
            </div>
            <div class="item-content-ex">
                <img src="https://images.pexels.com/photos/690597/pexels-photo-690597.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <button class="btn-content-ex">KARATE</button>
            </div>
            <div class="item-content-ex">
                <img src="https://images.pexels.com/photos/3340318/pexels-photo-3340318.jpeg" alt="">
                <button class="btn-content-ex">JUMBA</button>
            </div>
        </div>
        <div class="spAndfn">
            <div class="bgr-sp"></div>
            <div class="container-sp"></div>
            <div class="container-text">    
                <h1>ĐĂNG KÝ ĐỂ ĐƯỢC SỬ DỤNG NHỮNG TRANG THIẾT BỊ CAO CẤP NHẤT HIỆN NAY</h1>
                <div class="btn-sp">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Đăng Ký Ngay</span>
                      </button>
                    </div>
                </div>
            </div>
        <div class="title-sp">
                <h2>Một số sản phẩm hiện tại<br>của chúng tôi: </h2>
        </div>
        </div>
        <div class="product-sp">
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/260352/pexels-photo-260352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/4162449/pexels-photo-4162449.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/136404/pexels-photo-136404.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://th.bing.com/th/id/R.576f831d695b2e6d23ebd53d879942ad?rik=gV6SXXK6gBmjaQ&pid=ImgRaw&r=0" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://toiyeugym.vn/wp-content/uploads/2020/09/phong-tap-gym-quan-go-vap-02.jpg" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://pt-fitness.com/wp-content/uploads/2020/06/tieu-chuan-thiet-ke-phong-tap-gym-1024x500.jpg" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://th.bing.com/th/id/R.711b31753207fe9ed5b6227fe4045d78?rik=Ru4lW2gHP30u8g&pid=ImgRaw&r=0" alt="">
            </div>
        </div>
    </div>
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h1>about</h1>
                    <div class="text">
                        <p>I have found this fantastic gym and I couldn't be happier. The spacious and well-equipped facilities, along with the best workout equipment, have given me an amazing workout experience. The staff are attentive and helpful, and I have seen great improvements in my health and strength since I started working out here.</p>
                    </div>
                    <div class="icons">
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="box">
                    <h1>contact info</h1>
                    <div class="icon">
                        <a href="#"><i class="fas fa-map-marker-alt"></i>Doi can, </a>
                        <a href=""><i class="fas fa-phone-alt"></i>030303030</a>
                        <a href=""><i class="fas fa-envelope"></i>primefitness@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="./assets/js/navbar.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <!-- MDBootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdbootstrap/bootstrap-free@4.19.0/css/mdb.min.css" integrity="sha384-pK+jKzIx2N/ZN3qd5oy5NlX9MyIcR+z/F/0KjOv4/z+tMeOaMfWGm8TTJj9zm+0" crossorigin="anonymous">

        <!-- MDBootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@mdbootstrap/bootstrap-free@4.19.0/js/mdb.min.js" integrity="sha384-iRHfQV91qxFc2h2zKtIV8L7W4OMvn5h5nZp5B8P5jlSxvx0anW4M/vSlHYltVt2" crossorigin="anonymous"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    </body>
</html>

  