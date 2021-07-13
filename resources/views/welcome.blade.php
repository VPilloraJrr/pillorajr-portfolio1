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
        <style>
            .full-height{
                background: url("{{asset('assets/pics/bg-header.jpg')}}");
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            <div class="nav">
                <div class="top-left links">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/pics/VP.png') }}"></a> 
                </div> 
                <div class="top-right links" id="btns">
                    <a href="{{ url('/') }}" class="btn active">Home</a>
                    <a href="#about" class="btn">About</a>
                    <a href="#skill" class="btn">Skills</a>
                    <a href="#education" class="btn">Education</a>
                    <a href="#experience" class="btn">Experience</a>
                    <a href="#portfolio" class="btn">Portfolio</a>
                    <a href="#contact" class="btn">Contact</a>
                    @auth
                        <a href="{{ url('dashboard/home') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @endauth
                </div>    
            </div>
    
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
                            <label for="progress">{{ $d->skill_name }} progress:</label>
                            <progress id="progress" value="{{ $d->percent }}" max="100"> {{ $d->percent }}% </progress>   
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

            <div class="text-container">
                <div class="image-container">
                    <p><img src="{{ asset('assets/pics/portfolio_1.png')}}"></p>
                </div>
                <p align="center"><b>Project:</b> A clinic front page with bootstrap.</p>
            </div>

            <div class="text-container">
                <div class="image-container">
                    <p><img src="{{ asset('assets/pics/portfolio_2.png')}}"></p>
                </div>
                <p align="center"><b>Project:</b> An eCommerce webpage of a company seling gadgets such as phones.</p>
            </div>

            <div class="text-container">
                <div class="image-container">
                    <p><img src="{{ asset('assets/pics/portfolio_3.png')}}"></p>
                </div>
                <p align="center"><b>Project:</b> A simple tourism page about Bicol.</p>
            </div>

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
        <script>
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
            </script>
    </body>
</html>
