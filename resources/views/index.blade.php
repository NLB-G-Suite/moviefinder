<!DOCTYPE HTML>
<html>
    <head>
        <title>Movie Finder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        {{-- <meta name="keywords" content="Movie_store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
            Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> --}}
        <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/search.css') }}">
        <!-- start plugins -->
        {{-- <script type="text/javascript" src=" {{ asset('js/jquery-1.11.1.min.js') }}"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
        <script>
            $(function () {
              $("#slider").responsiveSlides({
              	auto: true,
              	nav: true,
              	speed: 500,
                namespace: "callbacks",
                pager: true,
              });
            });
        </script> --}}
    </head>
    <body>
        <div class="container col-md-10 col-md-offset-1">
            <div class="">
                <div class="header_top">
                    {{-- 
                    <div class="col-sm-3 logo"><a href="index.html"><img src="/images/logo.png" alt=""/></a></div>
                    --}}
                    <div class="col-sm-12 nav">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div id="imaginary_container">
                                <div class="input-group stylish-input-group aa-input-container" id="aa-input-container">
                                    <input id="search-input" type="search" name="search" placeholder="What are you looking for?" autocomplete="off" required="required" class="form-control" v-model="query">
                                    <span class="input-group-addon">
                                    <button @click="search()" type="button" v-if="!loading">
                                    <span class="glyphicon glyphicon-search"></span>
                                    </button>  
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                {{-- 	
                <div class="slider">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider">
                            <li>
                                <img src="images/banner.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                            <li>
                                <img src="images/banner1.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                            <li>
                                <img src="images/banner2.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="banner_desc">
                        <div class="col-md-9">
                            <ul class="list_1">
                                <li>Published <span class="m_1">Feb 20, 2015</span></li>
                                <li>Updated <span class="m_1">Feb 20 2015</span></li>
                                <li>Rating <span class="m_1"><img src="images/rating.png" alt=""/></span></li>
                            </ul>
                        </div>
                        <div class="col-md-3 grid_1">
                            <ul class="list_1 list_2">
                                <li>
                                    <i class="icon1"> </i>
                                    <p>2,548</p>
                                </li>
                                <li>
                                    <i class="icon2"> </i>
                                    <p>215</p>
                                </li>
                                <li>
                                    <i class="icon3"> </i>
                                    <p>546</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                --}}
                <div class="content">
                    <div class="box_1">
                        <h1 class="m_2">Featurd Movies</h1>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="box_2">
                        <div class="col-md-5 grid_3"  v-for="movie in movies">
                            <div class="col-md-6 grid_4">
                                <a href="single.html">
                                    <div class="grid_2">
                                        <img :src="movie.image" alt="@{{ movie.title }}" class="img-responsive" alt=""/>
                                        <div class="caption1">
                                            {{-- <ul class="list_3">
                                                <li>
                                                    <i class="icon5"> </i>
                                                    <p>3,548</p>
                                                </li>
                                            </ul> --}}
                                            <p class="m_3">@{{ movie.title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <script src=" {{ asset('/js/vue.min.js') }}"></script>
        <script src=" {{ asset('/js/vue-resource.min.js') }}"></script>
        <script src=" {{ asset('/js/search.js') }}"></script>
        <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
        <script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
        <script src=" {{ asset('/js/autocomplete.js') }}"></script>

    </body>
</html>

