<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="css/dashboard.css" rel="stylesheet" type="text/css" />
<link href="css/dashboard2.css" rel="stylesheet" type="text/css" />
<link href="css/chatbot.css" rel="stylesheet" type="text/css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<x-app-layout>

    <main class="content">
        <div class="container-fluid p-0">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <ul class="carousel-indicators">
                    @foreach($banners as $key => $banner)
                        <li data-target="#demo" data-slide-to="0" @if($key==0) class="active" @endif></li>
                    @endforeach
                </ul>
                
                <div class="carousel-inner">
                    @foreach($banners as $key => $banner)
                    <div class="carousel-item @if($key==0) active @endif">
                        <a href="{{ $banner->link }}" title="Banner 1">
                            <img src="{{asset('uploads/banners_image/'.$banner->image)}}" width=100% height="400"></a>
                            <div class="carousel-caption">
                                <h3 ><span style="color: white">{{$banner->title}}</span></h3>
                            </div>
                    </div>
                    @endforeach
                </div>

                {{--  --}}
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <br><br>

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
                                                     <img class="full-width img-responsive"  src="{{ asset('uploads/image/' . $popularArticle->file_path) }}"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">{{$popularArticle->title}}</h3>
                                                    <div class="articledesc color-white  margin-b-0 showline">
                                                        <p>{!! html_entity_decode($popularArticle->description) !!}</p>
                                                    </div>
                                                    
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                        <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-6">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width2 img-responsive"  src="{{ asset('uploads/image/' . $popularArticle2->file_path) }}"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">{{$popularArticle2->title}}</h3>
                                                    <div class="articledesc color-white margin-b-0 showline">
                                                        <p>{!! html_entity_decode($popularArticle2->description) !!}</p>
                                                    </div>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>
                                        @foreach ($popularArticle34 as $item)
                                           <div class="masonry-grid-item col-xs-3 col-sm-3 col-md-3">
                                            <!-- Work -->
                                            <div class="work">
                                                <div class="work-overlay">
                                                    <img class="full-width3 img-responsive"  src="{{ asset('uploads/image/' . $item->file_path) }}"
                                                        alt="Portfolio Image">
                                                </div>
                                                <div class="work-content">
                                                    <h3 class="color-white margin-b-5">{{$item->title}}</h3>
                                                    <div class="articledesc color-white margin-b-0 showline">
                                                        <p>{!! html_entity_decode($item->description) !!}</p>
                                                    </div>
                                                </div>
                                                <a class="content-wrapper-link" href="#"></a>
                                            </div>
                                            <!-- End Work -->
                                        </div>  
                                        @endforeach
                                       
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
                                                        @foreach ($latestArticle as $item)
                                                        <div class='blog-post hentry index-post'>
                                                            <div class='index-post-inside-wrap'>
                                                                <div class='post-image-wrap'>
                                                                    <a class='post-image-link'
                                                                    href="{{ route('article.detail', $item->id) }}">
                                                                        <img 
                                                                            class='post-thumb'
                                                                            src="{{ asset('uploads/image/' . $item->file_path) }}" />
                                                                    </a>
                                                                </div>
                                                            
                                                                <div class='post-info'>
                                                                    <a class='post-tag'
                                                                    href="{{ route('article.detail', $item->id) }}">{{$item->category->name}}</a>
                                                                    <div class='clear'></div>
                                                                    <h2 class='post-title articledesc'>
                                                                        <a
                                                                        href="{{ route('article.detail', $item->id) }}">{{$item->title}}</a>
                                                                    </h2>
                                                                </div>
                                                                <div class='index-post-footer'>
                                                                    <div class='post-meta'>
                                                                
                                                                        <span class='post-date published'
                                                                            datetime='2016-08-23T15:00:00-07:00'>{{$item->created_at->format('M j, Y G:i')}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
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
                                        @foreach ($recommendedArticle as $recomArticle)
                                            <div class="col-thirds">
                                                <div class="media-card">
                                                    <div class="media-card-image-wrapper">
                                                        <img style="width:100%;height:222.2" src="{{ asset('uploads/image/' . $recomArticle->file_path) }}"
                                                            alt="">
                                                        <div class="media-card-meta-taxonomy">
                                                            {{$recomArticle->category->name}}
                                                        </div>
                                                    </div>
                                                    <div class="media-card-title" style=" height: 110px;">
                                                        <h2> <a href="{{ route('article.detail', $recomArticle->id) }}" style="">{{$recomArticle->title}}</a></h2>
                                                        <div class="media-card-meta-date" style="top:80%;">
                                                            {{$recomArticle->created_at->format('M j, Y G:i')}}
                                                        </div>
                                                    </div>
                                                    <div class="articledesc media-card-content showline">
                                                        <p>{!! html_entity_decode($recomArticle->description) !!}</p>
                                                    </div>
                                                    <div class="media-card-button">
                                                        <a href="{{ route('article.detail', $recomArticle->id) }}">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="extra">
                                        <a href="article">View more >></a>
                                    </div>
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
                                    <a href=''>Forums</a>
                                </h2>
                                @if ($forumLastComment->isNotEmpty())
                            
                                    <ol class="ipsDataList ipsDataList_large ipsDataList_zebra" data-role="forums">
                                        @foreach ($forumLastComment as $forumpart)
                                                
                                            <li class="cForumRow ipsDataItem ipsDataItem_responsivePhoto  ipsClearfix">

                                                <div class="ipsDataItem_icon ipsDataItem_category">
                                                    <span
                                                        class='ipsItemStatus ipsItemStatus_large cForumIcon_normal ipsItemStatus_read'><i
                                                            class="fa fa-comments"></i></span>
                                                </div>
                                                <div class="ipsDataItem_main">
                                                    <h4 class="ipsDataItem_title ipsType_break">
                                                        <a
                                                            href="{{ route('forums.show', $forumpart->id) }}">{{$forumpart->title}}</a>
                                                    </h4>
                                                    <div class='ipsType_richText ipsDataItem_meta ipsContained'
                                                        data-controller='core.front.core.lightboxedImages'>
                                                    
                                                    
                                                        <div class="item">
                                                            <blockquote>
                                                                        <p class="articledesc">{{$forumpart->comment}}</p>
                                                            </blockquote>
                                                        </div>
                                                
                                                    
                                                    </div>
                                                </div>

                                                <div class="ipsDataItem_stats ipsDataItem_statsLarge">
                                                    <dl>
                                                        <dt class="ipsDataItem_stats_number">{{$forumpart->views}}</dt>
                                                        <dd class="ipsDataItem_stats_type ipsType_light"> views</dd>
                                                    </dl>
                                                </div>
                                                <ul class="ipsDataItem_lastPoster ipsDataItem_withPhoto">
                                                    <li>
                                                        <a 
                                                            data-ipsHover
                                                            data-ipsHover-target="https://w3schools.invisionzone.com/profile/223625-arda/?do=hovercard"
                                                            class="ipsUserPhoto ipsUserPhoto_tiny" title="Go to Arda's profile">
                                                            <img  src="{{ asset('uploads/profilePic/' . $forumpart->profilepic_path) }}"
                                                                alt='Arda'>      
                                                        </a>
                                                    </li>
                                                    <li class='ipsDataItem_lastPoster__title'><a
                                                            
                                                            title='Scrollable Nav'>{{$forumpart->comment_username}}</a></li>
                                                    <li class='ipsType_light ipsType_blendLinks'>
                                                    
                                                        <a title='Go to last post'><time datetime='2021-01-11T06:28:47Z'
                                                                title='01/11/2021 06:28  AM' data-short='1 dy'>{{$forumpart->last_updated}}</time></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    
                                    </ol>                            
                                @else 
                                        @if ($lastforum->isNotEmpty())
                                        
                                            <ol class="ipsDataList ipsDataList_large ipsDataList_zebra" data-role="forums">
                                                @foreach ($lastforum as $forum)
                                                        
                                                    <li class="cForumRow ipsDataItem ipsDataItem_responsivePhoto  ipsClearfix">
        
                                                        <div class="ipsDataItem_icon ipsDataItem_category">
                                                            <span
                                                                class='ipsItemStatus ipsItemStatus_large cForumIcon_normal ipsItemStatus_read'><i
                                                                    class="fa fa-comments"></i></span>
                                                        </div>
                                                        <div class="ipsDataItem_main">
                                                            <h4 class="ipsDataItem_title ipsType_break">
                                                                <a
                                                                href="{{ route('forums.show', $forum->id) }}">{{$forum->title}}</a>
                                                            </h4>
                                                            <div class='ipsType_richText ipsDataItem_meta ipsContained'
                                                                data-controller='core.front.core.lightboxedImages'>
  
                                                            </div>
                                                        </div>
        
                                                        <div class="ipsDataItem_stats ipsDataItem_statsLarge">
                                                            <dl>
                                                                <dt class="ipsDataItem_stats_number">{{$forum->views}}</dt>
                                                                <dd class="ipsDataItem_stats_type ipsType_light"> views</dd>
                                                            </dl>
                                                        </div>
                                                        <ul class="ipsDataItem_lastPoster ipsDataItem_withPhoto">
                                                            <li>
                                                                <a 
                                                                    data-ipsHover
                                                                    data-ipsHover-target="https://w3schools.invisionzone.com/profile/223625-arda/?do=hovercard"
                                                                    class="ipsUserPhoto ipsUserPhoto_tiny">
                                                                    <img  src="{{ asset('uploads/profilePic/' . $forum->profilepic_path) }}"
                                                                        alt='Arda'>      
                                                                </a>
                                                            </li>
                                                            <li class='ipsDataItem_lastPoster__title'><a
                                                                    title='Scrollable Nav'>{{$forum->user_name}}</a></li>
                                                            <li class='ipsType_light ipsType_blendLinks'>
                                                            
                                                                <a  title='Go to last post'><time datetime='2021-01-11T06:28:47Z'
                                                                        title='01/11/2021 06:28  AM' data-short='1 dy'>{{$forum->created_at}}</time></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            
                                            </ol>
                                        @else
                                            <ol class="ipsDataList ipsDataList_large ipsDataList_zebra" data-role="forums">
                                                
                                                <li class="cForumRow">
        
                                                <div style="font-size:18px; text-align:center; margin: 20px 0px;
                                                padding-bottom: 20px;">No forum! Click <a href="{{ route('forums.create') }}">here</a> to create one now!
                                                </div>
                                                </li>
                                            
                                            </ol>  
                                            
                                        @endif
                                
                                @endif
                            </li>

                    </section>

</x-app-layout>

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
<script>
    var botmanWidget = {
        aboutText: 'aBOTology',
        introMessage: "✋ Hi! I'm aBOTology. <br> Type Hello / Hi to wake the bot up :)"
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

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
