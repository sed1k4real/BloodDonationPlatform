<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--style-->
        <link rel="stylesheet" href="../css/main.css">
        <title>Home</title>
    <body class="">
        @include('navbar');
        <div class="home-container">
            <div class="home-container-01">
                <div>
                    <h1><span>Save lives,</span> within clicks!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a risus id purus laoreet convallis. Sed nisl ante, pulvinar ac tristique eget, tristique non justo. Aliquam a lectus lacinia, blandit tortor at, mollis lectus. Vivamus dictum dui sed iaculis porttitor. Etiam egestas eros id sodales interdum. Phasellus suscipit fermentum mauris quis vehicula. Proin posuere mattis sapien in mattis. Donec a mauris eu neque tempor vestibulum et vel leo. Ut eget tincidunt quam. Maecenas a scelerisque enim, in </p>
                </div>
                <img src="Doctors.svg" alt="doctors"/>
            </div>

            <img class="heart" src="heart.svg" alt="heart"/>

            <div class="home-container-03">
                <img class="booknow" src="booknow.png" alt="book"/>
                <div class="home-container-03-board">
                    <h1><span>Save lives,</span> within clicks!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a risus id purus laoreet convallis. Sed nisl ante, pulvinar ac tristique eget, tristique non justo. Aliquam a lectus lacinia, blandit tortor at, mollis lectus. Vivamus dictum dui sed iaculis porttitor. Etiam egestas eros id sodales interdum. Phasellus suscipit fermentum mauris quis vehicula. Proin posuere mattis sapien in mattis. Donec a mauris eu neque tempor vestibulum et vel leo. Ut eget tincidunt quam. Maecenas a scelerisque enim, in </p>
                    <a href="">Book now</a>
                </div>
            </div>

            <div class="home-container-02">
                <div class="home-container-02-board">
                    <h1>What do we provide!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a risus id purus laoreet convallis. Sed nisl ante, pulvinar ac tristique eget, tristique non justo. Aliquam a lectus lacinia, blandit tortor at, mollis lectus.Vivamus dictum dui sed iaculis porttitor. Etiam egestas eros id sodales interdum. Phasellus suscipit fermentum mauris quis vehicula. Proin posuere mattis sapien in mattis. Donec a mauris eu neque tempor vestibulum et vel leo. Ut eget tincidunt quam. Maecenas a scelerisque enim, inLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a risus id purus laoreet convallis.</p>
                </div>
                <div class="home-container-02-cards">
                    <div class="card">
                        <span class="material-symbols-outlined">ecg_heart</span>
                        <a href="">Health care</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="card">
                        <span class="material-symbols-outlined">badge</span>
                        <a href="">Profile</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="card">
                        <span class="material-symbols-outlined">inventory</span>
                        <a href="">Consultation</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>

            
        </div>
    </body>
</html>
