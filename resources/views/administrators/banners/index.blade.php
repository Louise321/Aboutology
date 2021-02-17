<link rel="shortcut icon" href="images/ico/favicon.ico">
<link href="/css/banner.css" rel="stylesheet">
<x-admin-layout>
    <div id="content" style="margin:25px">
        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                <div class="container3">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title" style="margin-left: 7; margin-top: 5;">Banners</h1>
                            </div>
                        </div>
    
                        <div class="addnew">
                            <div class="button-style">
                                <a href="{{ route('banners.add_banner') }}">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
                                </a>
                            </div>
                        </div>
    
                    </div>
                    @if (Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif
                    @if (Session::has('deleted'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('deleted') }}
                        </div>
                    @endif
                    @if (Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>


        <div class="col-12 col-md-12" style="margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px;">
            <div class="card">
    
                <table class="table fixed table-striped">
                    <thead>
                        <tr>
                            <th>Banner ID</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Title</th>
                            <th>Alt</th>
                            <th style="width:7%">Actions</th>
                            <th style="width:7%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="center">{{ $banner['id'] }}</td>
                                <td class="center">{{ $banner['image'] }}

                                    {{-- <img style="width:150px" src="{{asset('images/banner_images/'.$banner['image']) }}"> --}}


                                </td>
                                <td class="center">{{ $banner['link'] }}</td>
                                <td class="center">{{ $banner['title'] }}</td>
                                <td class="center">{{ $banner['alt'] }}</td>

                                <td class="center">
                                    <a href="{{ route('banners.edit_banner', $banner['id']) }}"
                                        class="btn btn-primary btn-mini" style="width: 50px;margin:10px;
                                        height: 25px;">  <i class="fas fa-edit  fa-lg"></i></a>
                                            <form method="POST" action="{{ route('banners.destroy', $banner['id']) }}"
                                            style="width: 50px;height:15px">
                                                @csrf
                                                @method('DELETE')
    
                                                {{-- <button type="submit" title="delete"
                                                    style="border: none; background-color:transparent;">
                                                    Delete
                                                </button> --}}
                                                <button id="delBanner" type="submit"
                                                class="btn btn-danger btn-mini" 
                                                style="width: 50px;margin:10px;
                                                height: 25px;
                                                color:white;">
                                                <i class="fas fa-trash-alt fa-lg"></i><button>
                                            </a>
      
                                            </form>
                                </td>
                                <td class="center">
                                    @if ($banner['status'] == 1)
                                    <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}"
                                        banner-id="{{ $banner['id'] }}" href="javascript:void(0)"><i
                                            class="fas fa-toggle-on fa-2x" aria-hidden="true"
                                            status="Active"></i></a>
                                    @else
                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}"
                                            banner-id="{{ $banner['id'] }}" href="javascript:void(0)"><i
                                                class="fas fa-toggle-off fa-2x " aria-hidden="true"
                                                status="Inactive"a>
                                    @endif
                                </td>

                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            {!! $banners->links('pagination::bootstrap-4') !!}
    
        </div>
 
</x-admin-layout>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script language="JavaScript" type="text/javascript">
    $(document).on("click",".updateBannerStatus",function(){
        var status = $(this).children("i").attr("status");
        var banner_id = parseInt($(this).attr("banner-id"));
        console.log("status",status,"banner_id",banner_id)

    $.ajax({

        type: "GET",
        dataType: "json",
        url: '/update-banner-status',
        data: {'status': status, 'banner_id': banner_id},
        success: function(data){
            if(data.status==0){
                 $("#banner-"+data.banner_id).html("<i class='fas fa-toggle-off fa-2x' aria-hidden='true' status='Inactive'></i>"); 
            }else if(data.status==1){
                 $("#banner-"+data.banner_id).html("<i class='fas fa-toggle-on fa-2x' aria-hidden='true' status='Active'></i>");
        }
    },
        error:function(resp){
            alert("Error");

        }

        });
});    
</script>
