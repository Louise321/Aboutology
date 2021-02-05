<link href="css/news/news.css" rel="stylesheet" type="text/css" />

<x-app-layout>

<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="tit-cont3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">News</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
   
    <div class="news__container">
        <div class="row">
            @foreach ($news->chunk(2) as $chunk)
                @foreach ($chunk as $items)
                    <div class="col-6" style="padding-right: 30px;">
                        <div class="card">
                            <img class="news-img" src="{{ asset('uploads/image/' . $items->file_path) }}" alt="">
                            <div class="card-header px-4 pt-4">
                                <a href="{{ route('news.userNewspage', $items->id) }}" style="text-decoration:none"> 
                                    <h5 class="news-title mb-0">{{ $items->title }}</h5>
                                </a>
                            </div>
                            <div class="module">
                                <p class=" qqwe">{{$items -> description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

      


</x-app-layout>

                      
