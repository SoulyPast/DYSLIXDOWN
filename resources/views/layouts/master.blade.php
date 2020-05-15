<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>DYSLIXDOWN</title>
  </head>
  <style>
      .navbar-collapse.collapse.in {
  display: block!important;
}
.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

#Començar {
  min-width: 300px;
  min-height: 60px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #4FD1C5;
background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

  #Començar::before {
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

#Començar:hover, #Començar:focus {
  color: #313133;
  transform: translateY(-6px);
}

#Començar:hover::before, #Començar:focus::before {
  opacity: 1;
}

#Començar::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

#Començar:hover::after, #Començar:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
}

label {
  display: inline-block;
  padding: 0;
  cursor: pointer;
  vertical-align: middle;
}

label.reset {
  font-size: 10px;
  border: 1px solid #000;
  border-radius: 5px;
  margin: 10px 5px;
  padding: 2px 3px;
}

label.star {
  width: 30px;
  height: 27px;
}


/* ocultamos los radiobuttons */

input[name=rating] {
  display: none;
}


/* estrellas inmediatamente despues de un radiobutton van amarillas */

input[type=radio]+label.star svg path {
  fill: #fe0
}


/* estrellas a la derecha del radiobutton checked van blanco */

input[type=radio]:checked~label.star svg path {
  fill: #fff;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.font {
        background-image:  url("https://images.unsplash.com/photo-1564089915105-db97895bdd78?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: fixed;
        bottom: 0px;
        right: 0px;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1000;
        overflow: hidden;
    }
  </style>
  <body >
      <div class="font"></div>
    @include('partials.navbar')
    <br>
    <div class="container" class="mt-4">
    @yield('content')
    @yield('scripts')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    <script>

      </script>
  </body>
</html>
