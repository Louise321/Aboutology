<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{--
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="css/forum.css" rel="stylesheet" type="text/css" />
<link href="css/test.css" rel="stylesheet" type="text/css" /> --}}
<link href="css/dashboard.css" rel="stylesheet" type="text/css" />
<link href="css/dashboard2.css" rel="stylesheet" type="text/css" />
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in like {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div> --}}

    <main class="content">
        <div class="container-fluid p-0">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/car.jpeg" alt="Petronas" width=100% height="400">
                        <div class="carousel-caption">
                            <h3 style="color: white">Petronas</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/oilgas.jpg" alt="Offshore" width=100% height="400">
                        <div class="carousel-caption">
                            <h3 style="color: white">Offshore</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/landscape.jpg" alt="Landscape" width=100% height="400">
                        <div class="carousel-caption">
                            <h3 style="color: white">Landscape</h3>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <br><br>

            <!-- <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>Articles</strong></h3>
                    </div>
            </div> -->

            <div class="row">
                <div class="col-12">

                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>Articles</strong></h3>
                    </div>

                    <ul class="nav tm-category-list">
                        <li class="nav-item tm-category-item"><a data-toggle="tab" href="#popular"
                                class="nav-link tm-category-link active">Popular</a></li>
                        <li class="nav-item tm-category-item"><a data-toggle="tab" href="#latest"
                                class="nav-link tm-category-link">Latest</a></li>
                        <li class="nav-item tm-category-item"><a data-toggle="tab" href="#recommended"
                                class="nav-link tm-category-link">Recommended</a></li>
                    </ul>

                    <div class="tm-categories-container mb-5">
                        <div class="tab-content">
                            <div class="tab-pane active" id="popular">

                                <div class="content-md container">

                                    <!-- Masonry Grid -->
                                    <div class="masonry-grid">
                                        <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-6"></div>
                                        <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-6">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width img-responsive" src="img/01.jpg"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">Art Of Coding</h3>
                                                    <p class="color-white margin-b-0">Lorem ipsum dolor sit amet
                                                        consectetur adipiscing</p>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                        <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-6">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width2 img-responsive" src="img/02.jpg"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">Clean Design</h3>
                                                    <p class="color-white margin-b-0">Lorem ipsum dolor sit amet
                                                        consectetur adipiscing</p>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                        <div class="masonry-grid-item col-xs-3 col-sm-3 col-md-3">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width3 img-responsive" src="img/03.jpg"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">Amazing Support</h3>
                                                    <p class="color-white margin-b-0">Lorem ipsum dolor sit amet
                                                        consectetur adipiscing</p>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                        <div class="masonry-grid-item col-xs-3 col-sm-3 col-md-3">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width3 img-responsive" src="img/03.jpg"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">Amazing Support</h3>
                                                    <p class="color-white margin-b-0">Lorem ipsum dolor sit amet
                                                        consectetur adipiscing</p>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                    </div>
                                    <!-- End Masonry Grid -->
                                </div>
                                <!-- End Work -->

                            </div>

                            <div class="tab-pane" id="latest">

                                <div class="cont-md cont">

                                    <!-- Main Wrapper -->
                                    <div id='main-wrapper'>

                                        <div class="extra2">
                                            <a href="article">View more >></a>
                                        </div>

                                        <div class='clearfix'></div>
                                        <!-- Featured Wrapper -->
                                        <div id='feat-wrapper'>
                                            <div class='big-feat no-items section' id='feat-section'
                                                name='Featured Post'>
                                            </div>
                                        </div>
                                        <div class='clearfix'></div>
                                        <div class='home-ad section' id='home-ad' name='Home Ads'>
                                            <div class='widget HTML' data-version='2' id='HTML33'>
                                                <div class='widget-title'>
                                                    <h3 class='title'>Advertisement</h3>
                                                </div>
                                                <!-- <div class='widget-content'>
                                                <a href='#'><img alt='Main Ad' src='https://1.bp.blogspot.com/-FyWx6QZ9cuw/W4A_yhpY5kI/AAAAAAAAC84/j-nQg0-pNrQ-yGFuqxj2ZED5Xe9BvohwACK4BGAYYCw/s1600/ad728.gif'/></a>
                                            </div> -->
                                            </div>
                                        </div>
                                        <div class='clearfix'></div>
                                        <div name='Main Posts'>
                                            <div class='widget Blog' data-version='2' id='Blog1'>
                                                <div class='blog-posts hfeed container index-post-wrap'>
                                                    <div class='grid-posts'>
                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/08/essential-tips-for-portrait.html'>
                                                                        <img alt='Essential Tips for Portrait Photographers'
                                                                            class='post-thumb'
                                                                            src='https://2.bp.blogspot.com/-EQKZwnKUe3U/W1q4UUxEVQI/AAAAAAAACow/u2PwukB77609F-2swRR9Rtg-E7yOgTPWgCK4BGAYYCw/w680/glo2.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Beauty'>Beauty</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/08/essential-tips-for-portrait.html'>Essential
                                                                            Tips for Portrait Photographers</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-08-23T15:00:00-07:00'>August
                                                                            23, 2016</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/03/24-hour-challenge-san-francisco.html'>
                                                                        <img alt='24 Hour Challenge: San Francisco'
                                                                            class='post-thumb'
                                                                            src='https://4.bp.blogspot.com/-jboqjoqxwbo/W1q4hNrnKqI/AAAAAAAACo4/gorIT0PKvu8Zgj2bVDPaoNeGZieB6zabwCK4BGAYYCw/w680/glo4.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Fashion'>Fashion</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/03/24-hour-challenge-san-francisco.html'>24
                                                                            Hour Challenge: San Francisco</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-03-17T00:59:00-07:00'>March
                                                                            17, 2016</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/03/backpacking-southern-cascades.html'>
                                                                        <img alt='Backpacking the Southern Cascades'
                                                                            class='post-thumb'
                                                                            src='https://1.bp.blogspot.com/-wHVf1CDEwEg/W1q42OF8OcI/AAAAAAAACpE/K9U1nKqRcUsU_2BnbbZWiEI4ay9aoGi8gCK4BGAYYCw/w680/glo3.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Learn'>Learn</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/03/backpacking-southern-cascades.html'>Backpacking
                                                                            the Southern Cascades</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-03-17T00:56:00-07:00'>March
                                                                            17, 2016</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/03/no-image-post-format.html'>
                                                                        <img alt='No image post format'
                                                                            class='post-thumb'
                                                                            src='https://1.bp.blogspot.com/-DvyjethCc0o/XgIjaGJtvJI/AAAAAAAAHfg/u7PYQNFYmI0o2vBWF9sqWyqA4AayYKRbwCNcBGAsYHQ/w680/bg1.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Business'>Business</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/03/no-image-post-format.html'>No
                                                                            image post format</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-03-17T00:53:00-07:00'>March
                                                                            17, 2016</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/03/copenhagens-hip-bike-culture.html'>
                                                                        <img alt='Copenhagen’s Hip Bike Culture'
                                                                            class='post-thumb'
                                                                            src='https://1.bp.blogspot.com/-P5oyPBJwvfg/W1q5Bsv6q3I/AAAAAAAACpM/gxte7xFcNdco5RdG-kz_RcMO35BSqj2XQCK4BGAYYCw/w680/glo5.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Fashion'>Fashion</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/03/copenhagens-hip-bike-culture.html'>Copenhagen&#8217;s
                                                                            Hip Bike Culture</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-03-17T00:51:00-07:00'>March
                                                                            17, 2016</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                        href='https://aeon-way-2themes.blogspot.com/2016/03/bucket-list-londons-lush-greenhouses.html'>
                                                                        <img alt='Bucket List: London’s Lush Greenhouses'
                                                                            class='post-thumb'
                                                                            src='https://3.bp.blogspot.com/-w7oSb-WPXAM/W1q5IYCVf_I/AAAAAAAACpY/MWKhGDQORd4XJ5bDVdPE6-E-lOndlx27ACK4BGAYYCw/w680/glo1.jpg' />
                                                                    </a>
                                                                </div>
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                        href='https://aeon-way-2themes.blogspot.com/search/label/Fashion'>Fashion</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title'>
                                                                        <a
                                                                            href='https://aeon-way-2themes.blogspot.com/2016/03/bucket-list-londons-lush-greenhouses.html'>Bucket
                                                                            List: London&#8217;s Lush Greenhouses</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                        <span class='post-author'><a href=''
                                                                                target='_blank'
                                                                                title='Sora Blogging Tips'>Sora Blogging
                                                                                Tips</a></span>
                                                                        <span class='post-date published'
                                                                            datetime='2016-03-17T00:47:00-07:00'>March
                                                                            17, 2016</span>
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
                            </div>

                            <div class="tab-pane" id="recommended">

                                <div class="content-md container">

                                    <div class="row_cb">
                                        <div class="col-thirds">
                                            <div class="media-card">
                                                <div class="media-card-image-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1504204267155-aaad8e81290d"
                                                        alt="">
                                                    <div class="media-card-meta-taxonomy">
                                                        System
                                                    </div>
                                                </div>
                                                <div class="media-card-title">
                                                    <h2>New Article</h2>
                                                    <div class="media-card-meta-date">
                                                        12.01.2021
                                                    </div>
                                                </div>
                                                <div class="media-card-content">
                                                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua
                                                    excepteur. Quis pariatur dolore culpa aliqua
                                                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                                                </div>
                                                <div class="media-card-button">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-thirds">
                                            <div class="media-card">
                                                <div class="media-card-image-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1489844097929-c8d5b91c456e"
                                                        alt="">
                                                    <div class="media-card-meta-taxonomy">
                                                        Stations
                                                    </div>
                                                </div>
                                                <div class="media-card-title">
                                                    <h2>New Article</h2>
                                                    <div class="media-card-meta-date">
                                                        12.01.2021
                                                    </div>
                                                </div>
                                                <div class="media-card-content">
                                                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua
                                                    excepteur. Quis pariatur dolore culpa aliqua
                                                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                                                </div>
                                                <div class="media-card-button">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-thirds">
                                            <div class="media-card">
                                                <div class="media-card-image-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1449247709967-d4461a6a6103"
                                                        alt="">
                                                    <div class="media-card-meta-taxonomy">
                                                        Policy
                                                    </div>
                                                </div>
                                                <div class="media-card-title">
                                                    <h2>New Article</h2>
                                                    <div class="media-card-meta-date">
                                                        12.01.2020
                                                    </div>
                                                </div>
                                                <div class="media-card-content">
                                                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua
                                                    excepteur. Quis pariatur dolore culpa aliqua
                                                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                                                </div>
                                                <div class="media-card-button">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="extra">
                                        <a href="article">View more >></a>
                                    </div>

                                    {{-- <div class="tab-pane" id="recommended">
                                        <div class="slider owl-carousel">
                                            <div class="card">
                                                <div class="img"><img
                                                        src="https://thememakker.com/templates/oreo/html/assets/images/image1.jpg"
                                                        alt=""></div>
                                                <div class="content">
                                                    <div class="title">Briana Tozour</div>
                                                    <div class="sub-title">Graphic Designer</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit
                                                        modi
                                                        dolorem quis quae animi nihil minus sed unde voluptas cumque.
                                                    </p>
                                                    <div class="btn">
                                                        <button>Read more</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="img"><img
                                                        src="https://thememakker.com/templates/oreo/html/assets/images/image2.jpg"
                                                        alt=""></div>
                                                <div class="content">
                                                    <div class="title">Pricilla Preez</div>
                                                    <div class="sub-title">Web Developer</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit
                                                        modi
                                                        dolorem quis quae animi nihil minus sed unde voluptas cumque.
                                                    </p>
                                                    <div class="btn">
                                                        <button>Read more</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="img"><img
                                                        src="https://thememakker.com/templates/oreo/html/assets/images/image3.jpg"
                                                        alt=""></div>
                                                <div class="content">
                                                    <div class="title">Eliana Maia</div>
                                                    <div class="sub-title">App Developer</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit
                                                        modi
                                                        dolorem quis quae animi nihil minus sed unde voluptas cumque.
                                                    </p>
                                                    <div class="btn">
                                                        <button>Read more</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <br><br>
                    </div>
                    <!-- Forum Section -->
                    <section>

                        <ol class='ipsList_reset cForumList'
                            data-controller='core.global.core.table, forums.front.forum.forumList' data-baseURL=''>
                            <li data-categoryID='44' class='cForumRow ipsBox ipsSpacer_bottom ipsResponsive_pull'>
                                <h2 class="ipsType_sectionTitle ipsType_reset cForumTitle">
                                    <!-- <a href='#' class='ipsPos_right ipsJS_show ipsType_noUnderline cForumToggle' data-action='toggleCategory' data-ipsTooltip title='Toggle this category'></a> -->
                                    <a href='https://w3schools.invisionzone.com/forum/44-w3schools/'>Forums</a>
                                </h2>
                                <ol class="ipsDataList ipsDataList_large ipsDataList_zebra" data-role="forums">
                                    <li class="cForumRow ipsDataItem ipsDataItem_responsivePhoto  ipsClearfix"
                                        data-forumID="45">

                                        <div class="ipsDataItem_icon ipsDataItem_category">
                                            <span
                                                class='ipsItemStatus ipsItemStatus_large cForumIcon_normal ipsItemStatus_read'><i
                                                    class="fa fa-comments"></i></span>
                                        </div>
                                        <div class="ipsDataItem_main">
                                            <h4 class="ipsDataItem_title ipsType_break">
                                                <a
                                                    href="https://w3schools.invisionzone.com/forum/45-general/">General</a>
                                            </h4>
                                            <div class='ipsType_richText ipsDataItem_meta ipsContained'
                                                data-controller='core.front.core.lightboxedImages'>
                                                <p>Discuss W3Schools.com</p>
                                            </div>
                                        </div>

                                        <div class="ipsDataItem_stats ipsDataItem_statsLarge">
                                            <dl>
                                                <dt class="ipsDataItem_stats_number">31.8k</dt>
                                                <dd class="ipsDataItem_stats_type ipsType_light"> posts</dd>
                                            </dl>
                                        </div>
                                        <ul class="ipsDataItem_lastPoster ipsDataItem_withPhoto">
                                            <li>
                                                <a href="https://w3schools.invisionzone.com/profile/223625-arda/"
                                                    data-ipsHover
                                                    data-ipsHover-target="https://w3schools.invisionzone.com/profile/223625-arda/?do=hovercard"
                                                    class="ipsUserPhoto ipsUserPhoto_tiny" title="Go to Arda's profile">
                                                    <img src='data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201024%201024%22%20style%3D%22background%3A%2362c4b4%22%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20dy%3D%22.35em%22%20x%3D%22512%22%20y%3D%22512%22%20fill%3D%22%23ffffff%22%20font-size%3D%22700%22%20font-family%3D%22-apple-system%2C%20BlinkMacSystemFont%2C%20Roboto%2C%20Helvetica%2C%20Arial%2C%20sans-serif%22%3EA%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fsvg%3E'
                                                        alt='Arda'>
                                                </a>
                                            </li>
                                            <li class='ipsDataItem_lastPoster__title'><a
                                                    href="https://w3schools.invisionzone.com/topic/62476-scrollable-nav/?do=getNewComment"
                                                    title='Scrollable Nav'>Scrollable Nav</a></li>
                                            <li class='ipsType_light ipsType_blendLinks'>
                                                <a href='https://w3schools.invisionzone.com/profile/223625-arda/'
                                                    data-ipsHover
                                                    data-ipsHover-target='https://w3schools.invisionzone.com/profile/223625-arda/?do=hovercard&amp;referrer=https%253A%252F%252Fw3schools.invisionzone.com%252F'
                                                    title="Go to Arda's profile" class="ipsType_break">Arda</a>,
                                                <a href='https://w3schools.invisionzone.com/topic/62476-scrollable-nav/?do=getLastComment'
                                                    title='Go to last post'><time datetime='2021-01-11T06:28:47Z'
                                                        title='01/11/2021 06:28  AM' data-short='1 dy'>Yesterday at
                                                        06:28
                                                        AM</time></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="cForumRow ipsDataItem ipsDataItem_responsivePhoto  ipsClearfix"
                                        data-forumID="46">
                                        <div class="ipsDataItem_icon ipsDataItem_category">
                                            <span
                                                class='ipsItemStatus ipsItemStatus_large cForumIcon_normal ipsItemStatus_read'><i
                                                    class="fa fa-comments"></i></span>
                                        </div>

                                        <div class="ipsDataItem_main">
                                            <h4 class="ipsDataItem_title ipsType_break">
                                                <a
                                                    href="https://w3schools.invisionzone.com/forum/46-suggestions/">Suggestions</a>
                                            </h4>
                                            <div class='ipsType_richText ipsDataItem_meta ipsContained'
                                                data-controller='core.front.core.lightboxedImages'>
                                                <p>How can we improve W3Schools.com</p>
                                            </div>
                                        </div>

                                        <div class="ipsDataItem_stats ipsDataItem_statsLarge">
                                            <dl>
                                                <dt class="ipsDataItem_stats_number">5.1k</dt>
                                                <dd class="ipsDataItem_stats_type ipsType_light"> posts</dd>
                                            </dl>
                                        </div>
                                        <ul class="ipsDataItem_lastPoster ipsDataItem_withPhoto">
                                            <li>
                                                <a href="https://w3schools.invisionzone.com/profile/31017-niche/"
                                                    data-ipsHover
                                                    data-ipsHover-target="https://w3schools.invisionzone.com/profile/31017-niche/?do=hovercard"
                                                    class="ipsUserPhoto ipsUserPhoto_tiny"
                                                    title="Go to niche's profile">
                                                    <img src='//content.invisioncic.com/r49260/profile/photo-thumb-31017.jpg'
                                                        alt='niche'>
                                                </a>
                                            </li>
                                            <li class='ipsDataItem_lastPoster__title'><a
                                                    href="https://w3schools.invisionzone.com/topic/62469-w3schools-need-to-add-more-frameworks/?do=getNewComment"
                                                    title='W3Schools need to add more frameworks'>W3Schools need to add
                                                    more
                                                    frameworks</a></li>
                                            <li class='ipsType_light ipsType_blendLinks'>
                                                <a href='https://w3schools.invisionzone.com/profile/31017-niche/'
                                                    data-ipsHover
                                                    data-ipsHover-target='https://w3schools.invisionzone.com/profile/31017-niche/?do=hovercard&amp;referrer=https%253A%252F%252Fw3schools.invisionzone.com%252F'
                                                    title="Go to niche's profile" class="ipsType_break">niche</a>,
                                                <a href='https://w3schools.invisionzone.com/topic/62469-w3schools-need-to-add-more-frameworks/?do=getLastComment'
                                                    title='Go to last post'><time datetime='2021-01-09T11:25:07Z'
                                                        title='01/09/2021 11:25  AM' data-short='3 dy'>Saturday at 11:25
                                                        AM</time></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="cForumRow ipsDataItem ipsDataItem_responsivePhoto  ipsClearfix"
                                        data-forumID="53">
                                        <div class="ipsDataItem_icon ipsDataItem_category">
                                            <span
                                                class='ipsItemStatus ipsItemStatus_large cForumIcon_normal ipsItemStatus_read'><i
                                                    class="fa fa-comments"></i></span>
                                        </div>
                                        <div class="ipsDataItem_main">
                                            <h4 class="ipsDataItem_title ipsType_break">
                                                <a
                                                    href="https://w3schools.invisionzone.com/forum/53-critiques/">Critiques</a>
                                            </h4>
                                            <div class='ipsType_richText ipsDataItem_meta ipsContained'
                                                data-controller='core.front.core.lightboxedImages'>
                                                <p>Offer constructive criticism on web sites posted by members here.</p>
                                            </div>
                                        </div>

                                        <div class="ipsDataItem_stats ipsDataItem_statsLarge">
                                            <dl>
                                                <dt class="ipsDataItem_stats_number">4.4k</dt>
                                                <dd class="ipsDataItem_stats_type ipsType_light"> posts</dd>
                                            </dl>
                                        </div>
                                        <ul class="ipsDataItem_lastPoster ipsDataItem_withPhoto">
                                            <li>
                                                <a href="https://w3schools.invisionzone.com/profile/223626-rolf/"
                                                    data-ipsHover
                                                    data-ipsHover-target="https://w3schools.invisionzone.com/profile/223626-rolf/?do=hovercard"
                                                    class="ipsUserPhoto ipsUserPhoto_tiny" title="Go to Rolf's profile">
                                                    <img src='data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201024%201024%22%20style%3D%22background%3A%23c46266%22%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20dy%3D%22.35em%22%20x%3D%22512%22%20y%3D%22512%22%20fill%3D%22%23ffffff%22%20font-size%3D%22700%22%20font-family%3D%22-apple-system%2C%20BlinkMacSystemFont%2C%20Roboto%2C%20Helvetica%2C%20Arial%2C%20sans-serif%22%3ER%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fsvg%3E'
                                                        alt='Rolf'>
                                                </a>
                                            </li>

                                            <li class='ipsDataItem_lastPoster__title'><a
                                                    href="https://w3schools.invisionzone.com/topic/62477-w3css-fix-text-into-a-w3-column-while-scrolling-the-page/?do=getNewComment"
                                                    title='W3.CSS: Fix text into a w3-column while scrolling the page'>W3.CSS:
                                                    Fix text into a w3-column while scrolling the page</a></li>
                                            <li class='ipsType_light ipsType_blendLinks'>
                                                <a href='https://w3schools.invisionzone.com/profile/223626-rolf/'
                                                    data-ipsHover
                                                    data-ipsHover-target='https://w3schools.invisionzone.com/profile/223626-rolf/?do=hovercard&amp;referrer=https%253A%252F%252Fw3schools.invisionzone.com%252F'
                                                    title="Go to Rolf's profile" class="ipsType_break">Rolf</a>,
                                                <a href='https://w3schools.invisionzone.com/topic/62477-w3css-fix-text-into-a-w3-column-while-scrolling-the-page/?do=getLastComment'
                                                    title='Go to last post'><time datetime='2021-01-11T09:02:53Z'
                                                        title='01/11/2021 09:02  AM' data-short='1 dy'>Yesterday at
                                                        09:02
                                                        AM</time></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </li>

                    </section>

</x-app-layout>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000, //2000ms = 2s;
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

</script>

<script>
    var botmanWidget = {
        aboutText: 'ssdsd',
        introMessage: "✋ Hi! I'm form codechief.org"
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
  
