<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DYSLIXDOWN</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .flex-center {

            }
            @import url(https://fonts.googleapis.com/css?family=Fira + Sans:400, 500italic);
 @keyframes eyes {
	 0%, 8.8888888889%, 100% {
		 top: -50px;
	}
	 17.7777777778% {
		 top: -45px;
	}
	 91.1111111111% {
		 top: -20px;
	}
	 57.7777777778%, 88.8888888889% {
		 top: -15px;
	}
	 66.6666666667% {
		 top: -25px;
	}
}
 @keyframes wings {
	 0%, 88.8888888889%, 100% {
		 top: 70px;
	}
	 91.1111111111% {
		 top: 60px;
	}
}
 @keyframes feet {
	 0%, 88.8888888889%, 100% {
		 top: -2px;
	}
	 91.1111111111% {
		 top: 0px;
	}
}
 @keyframes cloud {
	 0% {
		 left: -140px;
	}
	 100% {
		 left: 280px;
	}
}
 html {
	 height: 100%;
	 background-color: rgba(34, 32, 36, 1);
	 background: radial-gradient(circle at center, rgba(71, 65, 76, 1) 0%, rgba(34, 32, 36, 1) 100%);
	 background-repeat: no-repeat;
}
 body {
	 font: normal 100% "Fira Sans", sans-serif;
}
 h2 {
	 font-size: 4vw;
}
 h2 span {
	 font-size: 60%;
}
 a {
	 color: #aaa;
}
 .globe {
	 margin: 1em 0 0 0;
	 position: relative;
	 display: inline-block;
	 text-align: left;
	 width: 400px;
	 height: 400px;
	 border-radius: 50%;
	 border: 20px solid #f7dbcf;
	 box-sizing: border-box;
	 background: linear-gradient(to bottom, rgba(134, 174, 204, 1) 0%, rgba(212, 228, 239, 1) 100%);
	 overflow: hidden;
	 box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.5), 0 0 20px rgba(0, 0, 0, 0.3);
}
 .globe:before, .globe:after {
	 position: absolute;
	 content: "";
	 box-sizing: border-box;
	 border-radius: 50%;
	 z-index: 10;
}
 .globe:before {
	 height: 94%;
	 width: 94%;
	 top: 3%;
	 right: 3%;
	 border: 10px solid transparent;
	 border-right-color: rgba(255, 255, 255, 0.3);
	 border-right-width: 10px;
	 border-right-style: solid;
}
 .globe:after {
	 top: 50px;
	 right: 65px;
	 width: 10px;
	 height: 10px;
	 background: rgba(255, 255, 255, 0.3);
}
 .globe .bird {
	 position: absolute;
	 z-index: 1;
	 left: 96px;
	 top: 100px;
}
 .globe .bird .body {
	 position: absolute;
	 width: 175px;
	 height: 186px;
	 border-radius: 50%;
	 background-clip: padding-box;
	 background-color: #11e7d7;
	 box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.3);
}
 .globe .bird .body:before, .globe .bird .body:after {
	 position: absolute;
	 content: "";
	 z-index: -1;
	 width: 26px;
	 height: 93px;
	 border-radius: 50%;
	 background-color: #11e7d7;
	 box-shadow: inset 0 0 13px rgba(0, 0, 0, 0.3);
	 top: 70px;
	 animation: wings 4.5s linear infinite;
}
 .globe .bird .body:before {
	 left: 0;
}
 .globe .bird .body:after {
	 right: 0;
}
 .globe .bird .body .eye {
	 position: absolute;
	 z-index: 1;
	 overflow: hidden;
	 width: 56px;
	 height: 56px;
	 top: 28px;
	 border-radius: 50%;
	 background-color: #fff;
	 border: 1px solid #01c7be;
	 box-shadow: inset 0 0 0 1px #01c7be;
}
 .globe .bird .body .eye:before, .globe .bird .body .eye:after {
	 position: absolute;
	 content: "";
}
 .globe .bird .body .eye:before {
	 width: 18px;
	 height: 18px;
	 border-radius: 50%;
	 background-color: #000;
	 top: 30px;
}
 .globe .bird .body .eye:after {
	 width: 200px;
	 height: 200px;
	 background: radial-gradient(ellipse at center, rgba(109, 0, 25, 0) 0%, rgba(130, 1, 31, 0) 35%, #01c7be 36%, #31bfae 100%);
	 animation: eyes 4.5s linear infinite;
}
 .globe .bird .body .eye.left {
	 left: 15px;
}
 .globe .bird .body .eye.left:before {
	 left: 20px;
}
 .globe .bird .body .eye.left:after {
	 left: -60px;
	 top: -45px;
}
 .globe .bird .body .eye.right {
	 right: 15px;
}
 .globe .bird .body .eye.right:before {
	 right: 20px;
}
 .globe .bird .body .eye.right:after {
	 right: -60px;
	 top: -45px;
}
 .globe .bird .body .beak {
	 position: absolute;
	 z-index: 1;
	 width: 41px;
	 height: 55px;
	 top: 70px;
	 left: 67px;
	 border-radius: 50%;
	 background-color: #31bfae;
}
 .globe .bird .body .beak:before {
	 position: absolute;
	 content: "";
	 width: inherit;
	 height: inherit;
	 top: 2px;
	 border-radius: 50%;
	 background: #eb9f2d;
}
 .globe .bird .body .beak:after {
	 position: absolute;
	 content: "";
	 z-index: -1;
	 width: 37px;
	 height: inherit;
	 top: 12px;
	 left: 2px;
	 border-radius: 50%;
	 background: #31bfae;
}
 .globe .bird .body .beak div {
	 position: absolute;
	 width: 43px;
	 height: 43px;
	 top: -1px;
	 left: -1px;
	 border-radius: 50% 60% 50% 40%;
	 background-clip: padding-box;
	 background-color: #f7d35d;
	 transform: rotate(-45deg);
}
 .globe .bird .body .beak div:before {
	 position: absolute;
	 content: "";
	 transform: rotate(45deg);
	 width: 17px;
	 height: 8px;
	 top: 10px;
	 left: 20px;
	 border-radius: 50%;
	 background-color: #fff;
}
 .globe .bird .body .feet {
	 position: absolute;
	 bottom: 15px;
	 width: 100%;
}
 .globe .bird .body .feet:before, .globe .bird .body .feet:after {
	 position: absolute;
	 content: "";
	 width: 27px;
	 height: 21px;
	 border-radius: 50%;
	 background-color: #f8c14d;
	 box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.2);
	 animation: feet 4.5s linear infinite;
}
 .globe .bird .body .feet:before {
	 left: 40px;
}
 .globe .bird .body .feet:after {
	 right: 40px;
}
 .globe .wire {
	 position: absolute;
	 z-index: -1;
	 width: 500px;
	 height: 400px;
	 left: -173px;
	 top: -215px;
	 border-radius: 50%;
	 border: 3px solid transparent;
	 border-bottom-color: black;
}
 .globe .hills {
	 position: absolute;
	 width: 60px;
	 height: 60px;
	 border-radius: 30%;
	 top: 230px;
	 left: 60px;
	 transform: rotate(45deg);
	 background: radial-gradient(ellipse at top left, rgba(170, 217, 93, 1) 0%, rgba(187, 195, 105, 1) 100%);
	 box-shadow: inset 5px 0 12px rgba(0, 0, 0, 0.2);
}
 .globe .hills:before, .globe .hills:after {
	 position: absolute;
	 content: "";
	 width: 178px;
	 height: 90px;
	 border-radius: 50%;
	 background: inherit;
	 box-shadow: inherit;
}
 .globe .hills:before {
	 left: -90px;
	 top: 30px;
	 z-index: -1;
	 transform: rotate(-20deg);
}
 .globe .hills:after {
	 left: 0px;
	 top: -55px;
	 transform: rotate(120deg);
}
 .globe .cloud {
	 position: absolute;
	 width: 70px;
	 height: 24px;
	 background: linear-gradient(to bottom, rgba(242, 249, 254, 1) 5%, rgba(214, 240, 253, 1) 100%);
	 border-radius: 20px;
	 top: -20px;
	 z-index: -1;
	 animation: cloud 9s linear infinite;
}
 .globe .cloud.small {
	 top: -50px;
	 transform: scale(0.6);
	 animation-delay: -1.5s;
	 animation-duration: 13.5s;
}
 .globe .cloud:before, .globe .cloud:after {
	 position: absolute;
	 content: "";
	 background: inherit;
	 z-index: -1;
}
 .globe .cloud:before {
	 width: 36px;
	 height: 36px;
	 top: -18px;
	 right: 10px;
	 border-radius: 40px;
}
 .globe .cloud:after {
	 width: 20px;
	 height: 20px;
	 top: -10px;
	 left: 10px;
	 border-radius: 20px;
}

.row{
    top:30px;
}

#genaral{
    margin-top: 50%;
}

@keyframes particleAnimation
{
    from {
        left: -100px;
    }
    to {
        left: calc( 100% + 100px );
    }
}

body{

}

.p{
  position:fixed;
  left:0px;
  top:50px;
  width:1px;
  height:1px;
  background-color:white;
  position:fixed;
  animation-name:particleAnimation;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}
.p::before{
  position:absolute;
  display:block;
  content:"";
  width:100px;
  right:1px;
  top:0px;
  height:1px;
  background: linear-gradient(to right, rgba(0,0,0,0) 0%,rgba(255,255,255,0.4) 100%);
}
.p-1{
  animation-duration:10s;
}
.p-2{
  animation-duration:5s;
  top:60%;
}
.p-3{
  animation-duration:20s;
  top:90%;
}

body {
        background-image:  url("https://images.unsplash.com/photo-1564089915105-db97895bdd78?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;


    }
        </style>
    </head>
    <body>
    @include('partials.navbar')


    <div class="container mt-5">
    <div class="row mt-5" >
    <div class="col mt-5">
    <div class="globe">
	    <div class="bird">
		<div class="body">
	  	<div class="eye left"></div>
	  	<div class="eye right"></div>
	  	<div class="beak"><div></div></div>
	  	<div class="feet"></div>
	    <div class="wire"></div>
		</div>
		<div class="hills"></div>
		<div class="cloud"></div>
		<div class="cloud small"></div>
        </div>
        </div>

    </div>
    <div class="col text-center mt-5">
        <div class="mt-5">
        <h4>Millora la teva escriptura i millorar la teva lectura</h4>
        <p class="mt-5">
        <a href="http://localhost:8000/register" class="btn btn-primary btn-lg btn-block">Comença</a>
        </p>
        <p>
        <a href="http://localhost:8000/login" class="btn btn-secondary btn-lg btn-block">Ja tinc un compte</a>
        </p>
        </div>
    </div>
    </div>
    </div>

    <div class="p p-"></div>
    <div class="p p-"></div>
    <div class="p p-"></div>


    </body>
</html>
