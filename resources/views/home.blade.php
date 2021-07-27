<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Idea Tournament</title>
    <link rel="icon" href="{{asset('images/tournament.png')}}" type="image/png" sizes="16x16">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    body {
    width: 100%;
    height: 100%;
}

html {
    width: 100%;
    height: 100%;
}

.navbar-transparent {
   background-color: transparent;
   background: transparent;
   border-color: transparent;
}

@media(min-width:767px) {
    .navbar {
        padding: 20px 0;
        -webkit-transition: background .5s ease-in-out,padding .5s ease-in-out;
        -moz-transition: background .5s ease-in-out,padding .5s ease-in-out;
        transition: background .5s ease-in-out,padding .5s ease-in-out;
    }

    .top-nav-collapse {
        padding: 0;
    }
}

/* Demo Sections - You can use these as guides or delete them - the scroller will work with any sort of height, fixed, undefined, or percentage based.
The padding is very important to make sure the scrollspy picks up the right area when scrolled to. Adjust the margin and padding of sections and children 
of those sections to manage the look and feel of the site. */

.intro-section {
    height: 100%;
    padding-top: 150px;
    text-align: center;
    background: #fff;
}

.about-section {
    height: 100%;
    padding-top: 150px;
    text-align: center;
    background: #eee;
}

.services-section {
    height: 100%;
    padding-top: 150px;
    text-align: center;
    background: #fff;
}

.contact-section {
    height: 100%;
    padding-top: 150px;
    text-align: center;
    background: #eee;
}
</style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="{{asset('images/tournament.png')}}" style="width:70px;height:60px;margin-top:-10px" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#post_idea" style="background-color:black;color:#ff8888;">Post Your Idea !</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#articles">Articles</a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>IDEA TOURNAMENT</h1>
                    <p>Post your idea and win with joy !! :)</p>
                    <a class="btn btn-default page-scroll" href="#post_idea">Click Me to Scroll Down!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="post_idea" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Post Idea Form Information</h1>
                </div>
            </div>
            <form action="{{route('idea.add')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label style="float:left;">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label style="float:left;">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label style="float:left;">Idea</label>
                        <textarea class="form-control" name="idea" placeholder="Enter Your Idea" required></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" value="Submit Idea" class="btn btn-xs btn-primary" style="float:right;" />
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>

    <!-- Services Section -->
    <section id="articles" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Articles</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(count($articles) != 0)
                    @foreach($articles as $article)
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="{{$article->urlToImage}}" alt="Card image cap" style="width:300px;height:180px;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title" style="text-align:left;">{{$article->title}}</h4>
                                <p class="card-text" style="text-align:left;">{{$article->description}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                    <br>
                    @endforeach
                    @else
                        <h3>No articles found</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <!-- <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>
                </div>
            </div>
        </div>
    </section> -->

</body>
<script>
    //jQuery to collapse the navbar on scroll
// var header_height  = $('.navbar').height(),
//     intro_height    = $('.intro-section').height(),
//     offset_val = intro_height + header_height;
// $(window).scroll(function() {
//   var scroll_top = $(window).scrollTop();
//     if (scroll_top >= offset_val) {
//         $(".navbar-fixed-top").addClass("top-nav-collapse");
//             $(".navbar-fixed-top").removeClass("navbar-transparent");
//     } else {
//         $(".navbar-fixed-top").removeClass("top-nav-collapse");
//       $(".navbar-fixed-top").addClass("navbar-transparent");
//     }
// });

// //jQuery for page scrolling feature - requires jQuery Easing plugin
// $(function() {
//     $('a.page-scroll').bind('click', function(event) {
//         var $anchor = $(this);
//         $('html, body').stop().animate({
//             scrollTop: $($anchor.attr('href')).offset().top
//         }, 1500, 'easeInOutExpo');
//         event.preventDefault();
//     });
// });


// //jQuery to collapse the navbar on scroll
// $(window).scroll(function() {
//     if ($(".navbar").offset().top > 100) {
//         $(".navbar-fixed-top").addClass("top-nav-collapse");
//             $(".navbar-fixed-top").removeClass("navbar-transparent");
//     } else {
//         $(".navbar-fixed-top").removeClass("top-nav-collapse");
//       $(".navbar-fixed-top").addClass("navbar-transparent");
//     }
// });
</script>
@if(Session::get('success_message'))
<script>
iziToast.success({
    title: 'OK',
    message: "{{Session::get('success_message')}}",
});
</script> 
@endif

</html>