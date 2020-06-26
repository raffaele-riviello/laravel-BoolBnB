<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
  <div class="loader-container">
      <div class="loader"></div>
  </div>
    <div class="team-section">
        <div class="person">
            <img src="{{asset('/img/p1.png')}}" alt="" class="person-pic">
            <div class="person-info">
                <h2>Person Name</h2>
                <p>Developer</p>
                <div class="socialmedia">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="person">
            <img src="{{asset('/img/p2.png')}}" alt="" class="person-pic">
            <div class="person-info">
                <h2>Person Name</h2>
                <p>Developer & Designer</p>
                <div class="socialmedia">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="person">
            <img src="{{asset('/img/p3.png')}}" alt="" class="person-pic">
            <div class="person-info">
                <h2>Person Name</h2>
                <p>Game Developer</p>
                <div class="socialmedia">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="person">
            <img src="{{asset('/img/p4.png')}}" alt="" class="person-pic">
            <div class="person-info">
                <h2>Person Name</h2>
                <p>Designer</p>
                <div class="socialmedia">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        
        <div class="person">
            <img src="{{asset('/img/p4.png')}}" alt="" class="person-pic">
            <div class="person-info">
                <h2>Person Name</h2>
                <p>Designer</p>
                <div class="socialmedia">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).on("load",function(){
            $(".loader-container").fadeOut(2400);
        });
    </script>
</body>
</html>
