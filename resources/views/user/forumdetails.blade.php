<link rel="stylesheet" href="{{ asset('css/forum/forumdetails.css') }}">
<!-- <link href="css/forum/forumdetails.css" rel="stylesheet"> -->

<x-app-layout>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Knowledgebase</a></li>
            <li class="breadcrumb-item"><a href="#">Forum</a></li>
        </ol>
    </nav>

    <div class="rela-block page-container">
        <div class="rela-block gutter-container">
            <div class="rela-block forum-container">
                <div class="rela-inline author-info">
                    <div class="forum-title" style="padding-bottom:20px;">{{ $forum->title }}</div>
                        <div class="row">
                            <div class="rela-block info">{{ $forum->user->name }}</div> 
                            {{-- <div class="rela-block info"><span>Author info here</span></div>  --}}
                            <div class="rela-block info"><span>{{ date_format($forum->created_at, 'd/m/Y') }}</span></div>
                        </div>
                    </div>

                    <div v-html="forumText" class="forum-cont" style="padding-top:50px;">
                        {!! html_entity_decode($forum->content) !!}
                    </div>
                

                    <div class="post-bottom overflow">
                        <ul class="nav nav-justified post-nav">
                            <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>58 Likes</a></li>
                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i>30 Comments</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i>1008 Views</a></li>
                        </ul>
                    </div>

                    <!-- <div v-html="forumText" class="forum-cont">
                        There is only one true "Sandwich Cubano" - 
                        that classic combination of roast pork, ham, 
                        Swiss cheese, mustard, and pickles, pressed on a la 
                        plancha until the exterior is toasty and the interior 
                        is warm and melted. For the classic "Cubano," there's
                        no better place to go than that most classic Cuban 
                        restaurant, the hall of mirrors that is the unofficial 
                        capitol of Cuban Miami: Versailles. 
                    </div>  -->
               

                    
            <div class="rela-block forum-container">
                <section class="content-item" id="comments">
                    <div class="container">   
                        <div class="row">
                            <div class="col-sm-12">   
                                
                            
                                <h3>4 comments</h3>
                             
                                @foreach($forum->comments as $comment)
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $comment->user->name }}</h4>
                                        <p>{{ $comment->comment }}</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <div class="row">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </div>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <div class="row">
                                                <li class=""><a href="">Like</a></li>
                                                <li class=""><a href="">Reply</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                                <!-- <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <div class="row">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </div>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <div class="row">
                                                <li class=""><a href="">Like</a></li>
                                                <li class=""><a href="">Reply</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <div class="row">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </div>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <div class="row">
                                                <li class=""><a href="">Like</a></li>
                                                <li class=""><a href="">Reply</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <div class="row">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </div>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <div class="row">
                                                <li class=""><a href="">Like</a></li>
                                                <li class=""><a href="">Reply</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <div class="row">
                                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                                <li><i class="fa fa-thumbs-up"></i>13</li>
                                            </div>
                                        </ul>
                                        <ul class="list-unstyled list-inline media-detail pull-right">
                                            <div class="row">
                                                <li class=""><a href="">Like</a></li>
                                                <li class=""><a href="">Reply</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div> -->

                                <h2 class="pull-left">New Comment</h2>

                                <form method="post" action="{{ route('comment.add') }}">
                                    @csrf    
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-3 col-lg-2 hidden-xs">
                                                <img class="img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                            </div>
                                            <div class="form-group  col-sm-10">
                                                <textarea class="form-control" placeholder="Your message" type="text" name="comment_content"></textarea>
                                                <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                            </div>
                                        </div>  	
                                    </fieldset>
                                    <button type="submit" class="sbtn pull-right" value="Add Comment" >Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="related-cont">
            <div class="rela-block forum-container">
                <div class="sidebar2-item  recent">
                    <h3>Related Forums</h3>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="img-recent2" src="img/cat.png" alt=""></a>
                        </div>
                        <div class="media-body" style="margin-top: 8; margin-left: 20;">
                            <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                            <p>posted on  07 March 2014</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="img-recent2" src="img/cat.png" alt=""></a>
                        </div>
                        <div class="media-body" style="margin-top: 8; margin-left: 20;">
                            <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                            <p>posted on  07 March 2014</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="img-recent2" src="img/cat.png" alt=""></a>
                        </div>
                        <div class="media-body " style="margin-top: 8; margin-left: 20;">
                            <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                            <p>posted on  07 March 2014</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
                                
