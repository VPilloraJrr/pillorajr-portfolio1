<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vicente Pillora Jr</title>

        <!-- Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
        <!-- Stylesheet-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity= "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <style>
            .full-height{
                background: url("{{asset('assets/pics/bg-header.jpg')}}");
            }
        </style>

    </head>
    <body>
        <div class="full-height">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <ul class="top-left links">
                    <li><a href="{{ url('/') }}"><img src="{{ asset('assets/pics/VP.png') }}"></a></li> 
                </ul> 
                <ul class="top-right links nav navbar-nav" id="btns">
                    <li><a href="#header" class="btn active"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#about" class="btn" title="About">About</a></li>
                    <li><a href="#skill" class="btn" title="Skills">Skills</a></li>
                    <li><a href="#education" class="btn" title="Education">Education</a></li>
                    <li><a href="#experience" class="btn" title="Experience">Experience</a></li>
                    <li><a href="#portfolio" class="btn" title="Portfolio">Portfolio</a></li>
                    <li><a href="#contact" class="btn"  title="Contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard/home') }}" class="text-sm text-gray-700 underline">{{ Auth::user()->name }}</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>
                        @endauth
                    @endif
                </ul>    
            </nav>

            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

            <div class="content" id="header">
                <div class="title">
                    <p>Creating Designs <br /> For an Unending Innovation</p>
                    <p class="links">
                        <a href ="#about" class="about">Get to Know Me</a>
                        <a href ="#contact" class="contact">Contact me</a>
                    </p>
                </div>    
            </div>
        </div>

        <div class="content col-md-10" id="about">
            <div class="info">
                <div class="inform">
                    <h2>Hi, I'm Vicente G. Pillora. Jr.,</h2>
                    <p>And I love to create beautiful and efficient websites as a good practice in my studies. I love going in every details from the website's concept, design and the process of launching the program. I also like to learn more about web design and also some application design which I can use to create something that can benefit in the future.</p>
                </div>

                <div class="inform">
                    <p class="links">
                        <a href ="#skill" class="skills">Skills</a>
                        <a href ="#education" class="educ">Education</a>
                        <a href ="#experience" class="exp">Experience</a>
                        <a href ="#portfolio" class="port">Portfolio</a>
                    </p>
                </div>
                    
                <div class="img">
                    <img src="{{ asset('assets/pics/Pillora.jpg') }}">
                </div>
            </div>
        </div>

        <div class="content" id="skill">
            <h1 class="flex-center">SKILLS</h1>
            <p class="flex-center">I am currently living in Naga City. I am studying Bachelor of Science in Computer Science and will graduate in the year 2022. I am practicing and improving my skills.</p>
            <br />

            @foreach($data as $key => $d)
                <div class="polaroid"> 
                    <div class="col-sm-20">
                        @if($d->logo)
                            <p class="logo"><img src = "{{ asset('/storage/images/'.$d->logo )}}" alt="logo" class="logo"></p>
                        @else
                            <p class="logo"><img src="{{ asset('assets/pics/default.jpg')}}"></p>
                        @endif 
                        <div class="container">
                            <p>{{ $d->skill_name }}</p>
                            <label for="progress">{{ $d->skill_name }} progress: <b>{{ $d->percent }}%</b></label>
                            <progress id="progress" value="{{ $d->percent }}" max="100"><p></p></progress>   
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="content cols-md-4" id="education">
            <h1 class="flex-center">EDUCATION</h1>
            <p class="flex-center">Through the years in my life I experience knowledge that really strengthen my<br /> skills and my confidence to reach my goals.</p>
            <!-- Schools -->
            @foreach(DB::table('educations')->get() as $key => $ed)
                <div class="polaroid">
                    @if($ed->logo)
                        <p class="logo"><img src = "{{ asset('/storage/images/'.$ed->logo )}}" alt="logo" class="logo"></p>
                    @else
                        <p class="logo"><img src="{{ asset('assets/pics/default.jpg')}}"></p>
                    @endif 
                    <div class="container">
                        <p><b>School Name:</b> {{ $ed->school_name }}</p>
                        <p><b>Year Started:</b> {{ $ed->year_started }}</p>
                        <p class="first"><b>Year Graduated:</b> {{ $ed->year_graduated }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="content" id="experience">
            <h1 class="flex-center">EXPERIENCE</h1>
            @foreach(DB::table('experiences')->get() as $key => $exp)
                <div class="text-container ">
                    <div class="time"><b>{{ $exp->year_started }} - {{ $exp->year_resigned }}</b></div>
                    <h3><b>{{ $exp->position_name }}</b></h3>
                    <p>{{ $exp->description }}</p>
                </div>
            @endforeach
        </div>
        

        <div class="content" id="portfolio">
            <h1 class="flex-center">PORTFOLIO</h1>
            <p class="flex-center">Listed below are some of the most representative projects I've worked on.</p>
            <br />

            @forelse(DB::table('portfolios')->get() as $key => $port)
            <div class="text-container">
                <div class="image-container">
                    <p><img src="{{ asset('assets/pics/'.$port->screenshot)}}"></p>
                </div>
                @if($port->client)
                    <p align="center"><b>For:</b> {{ $port->client }}</p> 
                @else
                    <p></p>   
                @endif
                <p align="center"><b>Project:</b> {{ $port->description }}</p>
            </div> 
            @empty
                <p align="center">No Data(s) Found</p>
            @endforelse(DB::table('portfolios')->get() as $key => $port)
        </div>

        <div class="content" id="contact">
            <h1 class="flex-center">Contact Information</h1>
            <p class="flex-center">For any type of online project please don't hesitate to get in touch with me. The fastest way is to <br />send me your message using the following email <a href="#">vpillorajr@gbox.adnu.edu.ph</a></p>
            <form method="post" action="/dashboard/contact"  class="flex-center">
                @csrf
                <input type="text" name="name" placeholder="Name"/>
                <input type="text" name="email" placeholder="Email"/>
                <textarea name="content" placeholder="Project Informations" class="body"></textarea>
                <button type="submit" class="submit">Send Email</button>
            </form>
        </div>

        <div class="footer">
            <footer>
                <div class="container">
                    <button class="btn flex-center"><a href="#"><i class="fa fa-facebook-square"></i></a></button>
                    <button class="btn flex-center"><a href="#"><i class="fa fa-twitter-square"></i></a></button>
                    <button class="btn flex-center"><a href="#"><i class="fa fa-envelope-square"></i></a></button>
                </div>
                <div class="text-container">
                    <p>&copy; Copyright 2021 Vicente G. Pillora Jr</p>
                </div>
            </footer>
        </div>
    </body>
    <script>

        /*   $$$$$$\                   $$$$$$\  $$\ $$\           $$\       
            $$  __$$\                 $$  __$$\ $$ |\__|          $$ |      
            $$ /  $$ |$$$$$$$\        $$ /  \__|$$ |$$\  $$$$$$$\ $$ |  $$\ 
            $$ |  $$ |$$  __$$\       $$ |      $$ |$$ |$$  _____|$$ | $$  |
            $$ |  $$ |$$ |  $$ |      $$ |      $$ |$$ |$$ /      $$$$$$  / 
            $$ |  $$ |$$ |  $$ |      $$ |  $$\ $$ |$$ |$$ |      $$  _$$<  
             $$$$$$  |$$ |  $$ |      \$$$$$$  |$$ |$$ |\$$$$$$$\ $$ | \$$\ 
             \______/ \__|  \__|       \______/ \__|\__| \_______|\__|  \__|
        */ 
            
        // Add active class to the current button (highlight it)
        var header = document.getElementById("btns");
        var bt = header.getElementsByClassName("btn");
        for (var i = 0; i < bt.length; i++) {
          bt[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
          });   
        }

        /*   $$$$$$\         $$$$$$$$\              $$$$$$$$\                  
            $$  __$$\        \__$$  __|             \__$$  __|                 
            $$ /  \__| $$$$$$\  $$ | $$$$$$\           $$ | $$$$$$\   $$$$$$\  
            $$ |$$$$\ $$  __$$\ $$ |$$  __$$\          $$ |$$  __$$\ $$  __$$\ 
            $$ |\_$$ |$$ /  $$ |$$ |$$ /  $$ |         $$ |$$ /  $$ |$$ /  $$ |
            $$ |  $$ |$$ |  $$ |$$ |$$ |  $$ |         $$ |$$ |  $$ |$$ |  $$ |
            \$$$$$$  |\$$$$$$  |$$ |\$$$$$$  |         $$ |\$$$$$$  |$$$$$$$  |
            \______/  \______/ \__| \______/          \__| \______/ $$  ____/ 
                                                                    $$ |      
                                                                    $$ |      
                                                                    \__|  
        */     

        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
        
        /* 
         $$$$$$\                   $$$$$$\                                $$\ $$\ 
        $$  __$$\                 $$  __$$\                               $$ |$$ |
        $$ /  $$ |$$$$$$$\        $$ /  \__| $$$$$$$\  $$$$$$\   $$$$$$\  $$ |$$ |
        $$ |  $$ |$$  __$$\       \$$$$$$\  $$  _____|$$  __$$\ $$  __$$\ $$ |$$ |
        $$ |  $$ |$$ |  $$ |       \____$$\ $$ /      $$ |  \__|$$ /  $$ |$$ |$$ |
        $$ |  $$ |$$ |  $$ |      $$\   $$ |$$ |      $$ |      $$ |  $$ |$$ |$$ |
         $$$$$$  |$$ |  $$ |      \$$$$$$  |\$$$$$$$\ $$ |      \$$$$$$  |$$ |$$ |
         \______/ \__|  \__|       \______/  \_______|\__|       \______/ \__|\__
        */

        $(window).scroll(function () {
            var distance = $(window).scrollTop();
            $('.content').each(function (i) {
  
                if ($(this).position().top <= distance + 250) {
                    $('.navbar-nav a.active').removeClass('active');
                    $('.navbar-nav a').eq(i).addClass('active');
                }
            });
        }).scroll();
    </script>
</html>
