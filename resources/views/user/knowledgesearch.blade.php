<link rel="stylesheet" href="{{ asset('css/knowledge.css') }}">


<x-app-layout>

    <div class="wraper">
        <main class="page-main">
            <div>
                <h1 style="position:relative;color:#f2f2f2;font-size:30px;justify-content:center;display:flex;padding-bottom:20px;">
                    How Can We Help You Today?
                </h1>
            </div>

           
            <div class="search">
                <form action="{{ route('knowledge.search') }}" method="GET">
                    <input class="searchTerm" type="text" name="search"
                        placeholder="Search the Knowledge Based" required>
                       
                    <button type="submit" class="searchButton">
                        <i class="fas fa-search"></i>
                    </button>

                </form>
            </div>
        </main>
    </div>

     <!-- ------------------News-------------------------  -->

    <div class="row_h">
        <div class="col-one">
            <h1 class="heading" style="padding-top:50px;">News</h1>
        </div>
    </div>

    <div class="row">
        <div class="news">

            @if($posts->isNotEmpty())
            @foreach ($posts->chunk(3) as $chunk)
                @foreach ($chunk as $post)
                    <div class="column" style="padding-bottom:20px;">
                        <div class="news-card" >
                            <div class="news-card-image-wrapper">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg"
                                    alt="sample6">
                                <div class="date"><span class="day">01</span><span class="month">Dec</span></div>
                                <i class="ion-checkmark"> </i>
                            </div>

                            <figcaption>
                                <h3>{{ $post->title }}</h3>
                                <p>
                                    {{ $post->description }}
                                </p>
                                <button>Read More</button>
                            </figcaption><a href="#"></a>
                        </div>
                    </div>
                @endforeach
                @endforeach

            @else 
                <div>
                    <h3 style=position:absolute;left:40%;bottom:40px;font-size:30px;justify-content:center;display:flex;padding-top:20px;>No posts found</h3>
                </div>
            @endif

                </div>
            </div>
        
    


</x-app-layout>
