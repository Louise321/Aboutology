<link href="/css/article/test.css" rel="stylesheet">
<link rel="shortcut icon" href="images/ico/favicon.ico">

{{-- @extends('administrators.home')

@section('content') --}}

<x-admin-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title" style="margin-left: 7; margin-top: 5;">News</h1>
                        </div>
                    </div>

                    <div class="addnew">
                        <div class="button-style">
                            <a href="{{ route('news.create') }}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add News
                            </a>
                        </div>
                    </div>                        
                    <div class="input-group">
                        <input class="form-control mr-2" type="input" placeholder="search.." id="search"/>
                    </div>
                   
                    <div class="select-container">
                        <select id="category_id">
                          <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                            @foreach ($cat_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                  {{--   <!-- Search function -->
                     <!-- <form action="{{ route('news.index') }}" method="GET" role="search">

                        <div class="input-group">
                            <span class="input-group-btn mr-5 mt-1">
                                <button class="btn btn-info" type="submit" title="Search">
                                    <span class="fas fa-search"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects"
                                id="term">
                            <a href="{{ route('news.index') }}" class=" mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
                            </a>
                        </div>
                    </form> -->  --}}

                </div>
            </div>
        </div>
    </section>
 


    <div class="col-12 col-xl-12"
        style="margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px;">
        <div class="card">

            @if (Session::has('deleted'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('deleted') }}
                </div>
            @endif
            <div id="news_data">
                @include('administrators.news.sample.news_page') 
                <input hidden id="showuntilthissection"/>    
            </div>            
        </div>
    </div>
<!-- NEWS SEARCH -->

      

</x-admin-layout>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script language="JavaScript" type="text/javascript">

      
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreNews(page);
        });

        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreNews(1);
        });

        $('#category_id').on('change', function() {
            getMoreNews();
        });

    });


    function getMoreNews(page) {
      var search = $('#search').val();
        console.log("Search query:",search);
        
        // Search on based of country
        var selectedCategory = $("#category_id option:selected").val();
        console.log("Category id:",selectedCategory);

        
      $.ajax({
        type: "GET",
        data: {
          'term':search,
          'category': selectedCategory,
        },
        url: "{{ route('news.index') }}" + "?page=" + page,
        success:function(data) {
            
            var input = data;

            var fields = input.split('<div id="news_data">');
          
            var partA = fields[0];
            var partB = fields[1];
            
            var field2 = partB.split('<input hidden id="showuntilthissection"/>');
            var result = field2[0];
          $('#news_data').html(result);
        }
      });
    }

</script>
<script>


</script>
<script>


</script>