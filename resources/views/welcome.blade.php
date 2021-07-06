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
                    <a href="#header"><img src="{{ asset('assets/pics/VP.png') }}"></a> 
                </div> 
                <div class="top-right links">
                    <a href="#header">Home</a>
                    <a href="#about">About</a>
                    <a href="#skill">Skills</a>
                    <a href="#education">Education</a>
                    <a href="#experience">Experience</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#contact">Contact</a>
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
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

        <div class="content" id="about">
            <h1>ABOUT</h1>
        </div>

        <div class="content" id="skill">
            <h1>SKILLS</h1>
        </div>

        <div class="content" id="education">
            <h1>EDUCATION</h1>
        </div>

        <div class="content" id="experience">
            <h1>EXPERIENCE</h1>
        </div>

        <div class="content" id="portfolio">
            <h1>PORTFOLIO</h1>
        </div>

        <div class="content" id="contact">
            <h1 class="flex-center">Contact Information</h1>
            <p class="flex-center">For any type of online project please don't hesitate to get in touch with me. The fastest way is to <br />send me your message using the following email <a href="#">vpillorajr@gbox.adnu.edu.ph</a></p>
            <form method="post" action="/send"  class="flex-center">
                @csrf
                <input type="text" name="name" placeholder="Name"/>
                <input type="text" name="email" placeholder="Email"/>
                <textarea name="content" placeholder="Project Informations" class="body"></textarea>
                <button type="submit" class="submit">Send Email</button>
            </form>
        </div>
    </body>
</html>
