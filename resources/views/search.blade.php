<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" id="token" infovalueue="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/search.css') }}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" />
        <link rel="icon" type="image/gif/png" href="{{ asset('/images/m.png') }}">
        <title>Movie Stack</title>
    </head>
    <body v-cloak>
        <div class="container">
            <div class="col-sm-10 col-xs-12 col-sm-offset-1">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                <span style="font-family: 'Budmo Jiggler'; font-size: 40px">Mo<span style="font-family: 'Budmo Jiggler'; color: dodgerblue">v</span>ie St<span style="color: red;font-family: 'Budmo Jiggler'">a</span>ck
                                </span>
                                <span style="font-size: 15px; color: cadetblue; display: inline-block;"><i>world's largest movie station ...</i></span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group stylish-input-group aa-input-container" id="aa-input-container">
                                <input id="search-input" type="search" name="search" placeholder="Search your movie.." autocomplete="off" required="required" class="form-control" v-model="query">
                                <span class="input-group-addon" style="padding-left: 20px">
                                <button @click="browse()" type="button" v-if="!loading">
                                <span class="glyphicon glyphicon-search"></span>
                                </button>  
                                </span>
                            </div>
                            <div v-if="movies.length > 0"><i>Total <strong style="color: dodgerblue">@{{movies.length}}</strong> result found</i></div>
                            <div v-else></div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class='row'>
                    <div class="row">
                        <div class="modal fade" id="demo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="panel" style="margin-bottom:0px; border: 0px transparent !important">
                                            <div class="panel-body">
                                                <div class="col-sm-6 col-md-4" style="padding: 0px">
                                                    <img style='height: 400px; width: 100%;border-top-left-radius: 4px; border-bottom-left-radius: 4px' src="@{{ infos.image }}" alt="" class="img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8" style="padding: 0px">
                                                    <div style=' background-color: whitesmoke; margin-left: 10px;padding: 15px; border-bottom-right-radius: 4px; border-top-right-radius: 4px;'>
                                                        <form class="form-horizontal">
                                                            <h4 style="margin-top: 0px; margin-bottom: 20px">@{{ infos.title }}</h4>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Also Known As</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.aka }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Tagline</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.tagline }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Directed By</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.directorlink }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Genre</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.genres }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Casts</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.castlink }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Written By</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.writer }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Plot</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.plot }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Aspect Ratio</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.aspect_ratio }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Language</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.lang }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Soundmix</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.soundmix }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Released On</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.release_date }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Runtime</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.runtime }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Company</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.companylink }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Award</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.awards }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Certification</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.certification }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Votes</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9">@{{ infos.votes }}</div>
                                                            </div>
                                                            <div class="form-group detail">
                                                                <label class="col-sm-3"><span class='infolabel'>Trailer</span>&nbsp;<span class='dot'> : </label>
                                                                <div class="col-sm-9"><a href="@{{ infos.trailer }}">Watch the trailer here..</a></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div v-if='loading'>
                                <center><img style='width: 120px; height: 120px' src="{{ asset('/images/bc22e0b7c3.loader.gif') }}"></center>
                            </div>
                            <center style='font-weight: bold' class="alert" role="alert" v-if="error">
                                <img src="{{ asset('/images/sad.png') }}" style="margin-bottom: 15px; width: 100px; display: block;">
                                @{{ error }}
                            </center>
                            <div id="movies" class="row list-group">
                                <div id="" class="col-sm-4 col-xs-12" v-for="movie in movies | paginate">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="boximg">
                                                <img data-toggle="modal" data-target="#demo"  @click='getInfo(movie.id)' style='height: 200px; width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px' alt='image' src="@{{movie.image}}" class="img-responsive">
                                            <div class='panel-footer' style="background-color: #ddd; color: #111">
                                                <p style='font-size: 14px; font-weight: bold; margin-bottom: 7px'><a href="@{{movie.url}}">@{{ movie.title }}</a></p>
                                                <p>Director : @{{ movie.director }}</p>
                                                <!-- <p>Realesed : @{{ movie.release_date }}</p> -->
                                                <!-- <p>Casts : @{{ movie.cast }}</p> -->
                                                <p>Genre : @{{ movie.genres }}</p><!-- 
                                                <p>Runtime : @{{ movie.runtime }}</p>
                                                <p>Ratings : @{{ movie.ratings }} / 10</p> -->
                                                <p>Page Rank : @{{ movie.rank }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src=" {{ asset('/js/vue.min.js') }}"></script>
        <script src=" {{ asset('/js/vue-resource.min.js') }}"></script>
        <script src=" {{ asset('/js/search.js') }}"></script>
        <script src=" {{ asset('/js/algoliasearch.min.js') }}"></script>
        <script src=" {{ asset('/js/instant.min.js') }}"></script>
        <script src=" {{ asset('/js/autocomplete.min.js') }}"></script>
        <script src=" {{ asset('/js/autocomplete.js') }}"></script>
        <script src=" {{ asset('/js/jquery.min.js') }}"></script>
        <script src=" {{ asset('/js/bootstrap.min.js') }}"></script>
        <!-- <script src=" {{ asset('/js/pagination.js') }}"></script> -->
    </body>
</html>

