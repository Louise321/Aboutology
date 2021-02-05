{{--
<link href="css/article/bootstrap.min.css" rel="stylesheet"> --}}
{{--
<link href="css/article/font-awesome.min.css" rel="stylesheet"> --}}
{{--
<link href="css/article/lightbox.css" rel="stylesheet">
<link href="css/article/animate.min.css" rel="stylesheet"> --}}
<link href="/css/article/test.css" rel="stylesheet">
{{--
<link href="css/article/responsive.css" rel="stylesheet"> --}}
<link rel="shortcut icon" href="images/ico/favicon.ico">

<x-app-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Article</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="blog" class="padding-top">
        <div class="container2">
            <div class="row">

                <div class="col-md-3 col-sm-5" style="padding-left: 30px; padding-right: 50px;">
                    <div class="sidebar2 blog-sidebar">
                        <div class="sidebar2-item categories">
                            <h3>Categories</h3>

                            <ul class="nav2 navbar-stacked">

                                <li><a href="{{ route('article') }}">All<span class="pull-right"></span></a></li>

                                @foreach ($cat as $category)
                                    <li><a href="{{ route('article-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                class="pull-right"></span></a></li>
                                @endforeach

                            </ul>

                        </div>

                        <div class="sidebar2-item  recent">
                            <h3>Recent Posts</h3>

                            @foreach ($data as $latest)
                                <div class="media">
                                    <div class="pull-left">
                                        <a href="{{ route('article.detail', $latest->id) }}"><img class="img-recent" src="img/cat.png" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h4><a href="{{ route('article.detail', $latest->id) }}">{{ $latest->title }}</a></h4>
                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>


                <div class="col-md-9 col-sm-7" style="padding-right: 30px;">
                    <div class="row">

                        @foreach ($article->chunk(2) as $chunk)
                            @foreach ($chunk as $articled)

                                <div class="col-md-6 col-sm-12 blog-padding-right">

                                    <div class="single-blog two-column">
                                        <div class="post-thumb">
                                            <a href="{{ route('article.detail', $articled->id) }}">
                                                <img src="{{ asset('uploads/image/' . $articled->file_path) }}" class="img-responsive" alt="" style="height: 300"></a>
                                            <div class="post-overlay">
                                            </div>
                                        </div>

                                        <div class="post-content overflow">
                                            <h2 class="post-title bold">
                                                <a
                                                    href="{{ route('article.detail', $articled->id) }}">{{ $articled->title }}</a>
                                            </h2>
                                            <h3 class="articledate">{{ date_format($articled->created_at, 'jS M Y') }}
                                            </h3>

                                            <div class="articledesc">
                                            <p>{!! html_entity_decode($articled->description) !!}</p>
                                            </div>

                                            {{-- <a href="#" class="read-more">View More</a> --}}
                                            <div class="post-bottom overflow">
                                                <ul class="nav nav-justified post-nav">
                                                    <li><a href="#"><i class="fas fa-eye"></i>{{ $articled->views }}</a></li>
                                                    
                                                    <form method="POST" action="/article/{{ $articled->id }}/like">
                                                        @csrf
                                                        {{-- <li><a href="{{ $articled->isLikedBy(current_user()) ? 'text-blue' : 'text-gray' }}"> --}}
                                                        <div class="{{ $articled->isLikedBy(auth()->user()) ? 'text-blue' : 'text-gray' }}">    
                                                            <li>
                                                                <button class="fas fa-thumbs-up">{{ $articled->likes ?: 0 }}</button>
                                                            </li>
                                                        </div>

                                                    </form>

                                                    <form method="POST" action="/article/{{ $articled->id }}/like">
                                                        @csrf
                                                        @method('DELETE')

                                                        {{-- <li><a href="{{ $articled->isDislikedBy(current_user()) ? 'text-blue' : 'text-gray' }}"> --}}

                                                        <div class="{{ $articled->isDislikedBy(auth()->user()) ? 'text-blue' : 'text-gray' }}">    
                                                            <li>
                                                                <button class="fas fa-thumbs-down">{{ $articled->dislikes ?: 0 }}</button>
                                                            </li>
                                                        </div>
                                                        
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        @endforeach

                        {!! $article->links('pagination::bootstrap-4') !!}

                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--/#blog-->

</x-app-layout>

{{-- <script type="text/javascript">
    $(document).ready(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
            var id = $(this).parents(".panel").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);

            $.ajax({
               type:'POST',
               url:'/like',
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                    $(cObj).removeClass("like-post");
                  }else{
                    $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                    $(cObj).addClass("like-post");
                  }
               }
            });

        });      

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script> --}}