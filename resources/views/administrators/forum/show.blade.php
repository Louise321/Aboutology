<link rel="stylesheet" href="{{ asset('css/forum/forumdetails.css') }}">
<!-- <link href="css/forum/forumdetails.css" rel="stylesheet"> -->

<x-app-layout>

    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Knowledgebase</a></li>
            <li class="breadcrumb-item"><a href="{{ route('forums.index') }}">Forum</a></li>
        </ol>
    </nav> -->

    <div class="rela-block page-container">
        <div class="rela-block gutter-container">
            <div class="rela-block forum-container">
                <div class="rela-inline author-info" style="padding-bottom: 20px;">
                    <div class="forum-title" style="padding-bottom:20px;">{{ $forum->title }}</div>
                        <div class="row">
                            <div class="rela-block info">{{ $forum->user->name }}</div> 
                            <div class="rela-block info"><span>{{ date_format($forum->created_at, 'd/m/Y') }}</span></div>
                        </div>
                    </div>

                    <img src="{{ asset('uploads/image/' . $forum->file_path) }}" class="img-responsive" alt=""></a>

                    <div v-html="forumText" class="forum-cont" style="padding-top:50px;">
                        {!! html_entity_decode($forum->content) !!}
                    </div>
                

                    <div class="post-bottom overflow">
                        <ul class="nav nav-justified post-nav">
                            <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>58 Likes</a></li>
                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i>30 Comments</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i>{{ $forum->views }}</a></li>
                        </ul>
                    </div>
                    
            <div class="rela-block forum-container">
                <section class="content-item" id="comments">
                    <div class="container">   
                        <div class="row">
                            <div class="col-sm-12">   
                                
                            
                                <h3>{{ $commentCount->count(), ' comments' }}</h3>
                             
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

    </div>

</x-app-layout>
                                
