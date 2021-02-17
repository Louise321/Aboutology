<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link href="https://thememakker.com/templates/oreo/html/light/assets/css/timeline.css" rel="stylesheet">

<x-app-layout>

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Profile Page!
                </div>
            </div>
        </div>
    </div> --}}

    <main class="content" style="padding:0px 10px 5px 10px">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="tit-cont3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        <div class="card" style="width:100%">
                            <div class="user__profile">
                                 {{-- <img class="avatar" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s" alt="Ash" /> --}}
                                  <img class="avatar" src="{{asset('uploads/profilePic/'.$profiledata->profilepic_path)}}"> 
                                 <div class="username">{{$profiledata -> fullname}}</div>
                                <!-- <div class="bio"> Senior UI Designer </div> -->
                                 <div class="description"> Short bio: {{$profiledata->short_desc}}</div>
                            </div>
                        </div>
                    </div>
                   <div class="col-xl-5 col-lg-5">
                        <div class="card" style="width:100%">
                            <div class="gridCont">
                                <div class="gridIt">
                                    <span class="number">{{$forumcount}}</span><br/>
                                    <span class="wording">forums</span>  
                                </div>
                                <div class="gridIt">
                                <span class="number">{{$commentcount}}</span><br/>
                                    <span class="wording">comments</span>    
                                </div>
                                <div class="gridIt"> 
                                    <span class="number"> {{$viewcount}}</span><br/>
                                    <span class="wording">views</span>  
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="card" style="padding:0px 15px">
                            <ul class="nav nav-tabs" style="padding-left:0px">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane body active" id="about">
                                    <small class="text-muted">Email address: </small>
                                    <p>{{$userEmail}}</p>
                                    <hr>

                                    @if ($profiledata->phone !="")
                                        <small class="text-muted">Phone: </small>
                                        <p>{{$profiledata -> phone}}</p>
                                        <hr>
                                        <small class="text-muted">Birth Date: </small>
                                        <p>{{$profiledata -> date_of_birth}}</p>
                                        <hr>
                                        <small class="text-muted">Join Date: </small>
                                        <p>{{$profiledata -> created_at ->format('Y-m-d')}}</p>
                                    @else
                                        
                                        <small class="text-muted">Birth Date: </small>
                                        <p>{{$profiledata -> date_of_birth}}</p>
                                        <hr>
                                        <small class="text-muted">Join Date: </small>
                                        <p>{{$profiledata -> created_at ->format('Y-m-d')}}</p>
                                    @endif
                                   
                                </div>
                            
                            </div>
                        </div>
                        <div class="card">
                            <ul class="nav nav-tabs" style="padding-left: 20px;">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#recentSearch">Recent Search</a></li>
                            </ul>
                            
                            <div class="body">                               
                                <ul style="font-size:15px;">

                                    @foreach ($searches as $item)
                                        @if($item->properties['searchFor'] != null)
                                        <li style='padding:10px'><a href="{{ route('knowledge.search') }}">{{$item -> properties['searchFor']}}</a> <br>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <ul class="nav nav-tabs" style="padding-left: 20px;">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#timeline">Timeline</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="timeline">
                                <div class="card">
                                    <div class="body" style="padding:25px 30px 10px">
                                        <ul class="cbp_tmtimeline">
                                             <li>
                                                <time class="cbp_tmtime" > <span class="large" style="padding-top:7px">Now</span></time>
                                                <div class="cbp_tmicon">                                                
                                                <div class="position-relative">
                                                    <i class="timelineicon-align align-middle" data-feather="activity"></i>
                                                </div>                                           
                                             </div>
                                                <div class="cbp_tmlabel empty"> <span>No Activity</span> </div>
                                            </li>
<!--                                            <li>
                                                <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>03:45 AM</span> <span>Today</span></time>
                                                <div class="cbp_tmicon">
                                                <div class="position-relative">
                                                    <i class="timelineicon-align align-middle " data-feather="plus-square"></i>
                                                </div> 
                                                </div>
                                                <div class="cbp_tmlabel">
                                                    <h2><a href="javascript:void(0);">Art Ramadani</a> <span>posted a status update</span></h2>
                                                    <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>01:22 PM</span> <span>Yesterday</span></time>
                                                <div class="cbp_tmicon">
                                                <div class="position-relative">
                                                    <i class="timelineicon-align align-middle " data-feather="calendar"></i>
                                                </div> </div>
                                                <div class="cbp_tmlabel">
                                                    <h2><a href="javascript:void(0);">Job Meeting</a></h2>
                                                    <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Two weeks ago</span></time>
                                                <div class="cbp_tmicon bg-blush">
                                                <div class="position-relative">
                                                    <i class="timelineicon-align align-middle " data-feather="map-pin"></i>
                                                </div></div>
                                                <div class="cbp_tmlabel">
                                                    <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>checked in at</span> <a href="javascript:void(0);">New York</a></h2>
                                                        <p>
                                                            "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."                                    
                                                            <br>
                                                            <small>
                                                                - Isabella
                                                            </small>
                                                        </p>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12">
                                                            <div class="map m-t-10">
                                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477011208!2d-74.11976308802028!3d40.69740344230033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1508039335245" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                                                            </div>
                                                        </div>
                                                    </div>							
                                                </div>
                                            </li>
                                            <li>
                                                <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Month ago</span></time>
                                                <div class="cbp_tmicon">
                                                <div class="position-relative">
                                                    <i class="timelineicon-align align-middle " data-feather="message-circle"></i>
                                                </div></div>
                                                <div class="cbp_tmlabel">
                                                    <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>commented on your forum</span></h2>
                                                   <p> Great place, feeling like in home. </p>           
                                                </div>
                                            </li>
 -->

                                            @foreach ($timeline as $item)
                                                @if($item->description == "createdForum")
                                                <li>
                                                    <time class="cbp_tmtime" >{{$item -> created_at->format('M j, Y G:i')}}</time>
                                                    <div class="cbp_tmicon">
                                                    <div class="position-relative">
                                                        <i class="timelineicon-align align-middle " data-feather="plus-square"></i>
                                                    </div></div>
                                                    <div class="cbp_tmlabel">
                                                        <h2>You have created a <a href="{{ route('forums.show', $item->properties['forum_title']) }}">forum </a></h2>           
                                                        <p>{{$item -> properties['forum_title']}} </p>  
                                                    </div>
                                                </li>
                                                @elseif($item->description == "Commented on forums")
                                                <li>
                                                    <time class="cbp_tmtime" >{{$item -> created_at->format('M j, Y G:i')}}</time>
                                                    <div class="cbp_tmicon">
                                                    <div class="position-relative">
                                                        <i class="timelineicon-align align-middle " data-feather="message-circle"></i>
                                                    </div></div>
                                                    <div class="cbp_tmlabel">
                                                    <h2>You have commented on a <a href="{{ route('forums.show', $item->properties['forum_id']) }}">forum</a></h2>           
                                                    <p>{{$item -> properties['commented']}} </p>               
                                                </div>
                                                </li>
                                                @else
                                                {{-- <li>
                                                    <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden">25/12/2017</span> <span class="large">Now</span></time>
                                                    <div class="cbp_tmicon">                                                
                                                    <div class="position-relative">
                                                        <i class="timelineicon-align align-middle  " data-feather="activity"></i>
                                                    </div>                                           
                                                </div>
                                                    <div class="cbp_tmlabel empty"> <span>No Activity</span> </div>
                                                </li> --}}
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

<!--                             <div role="tabpanel" class="tab-pane" id="rewards">
                                <div class="card">
                                    
                                    <div class="pic">
                                        <div class="without-overlay contain">
                                    </div>
    
                                    <div class="with-overlay contain">
                                        Dunkin Donut
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    
                                    <div class="pic">
                                        <div class="without-overlay contain"></div>
    
                                        <div class="with-overlay contain">  Dunkin Donut </div>
                                    </div>
                                </div>
                                <div class="card">
                                    
                                    <div class="pic2222" 
                                    style="min-width:100%;	background-repeat: no-repeat; background-size: cover;
    
                                    background:url('https://www.thehotsip.com/image/cache/catalog/Main-Banner-5-1920x800.jpg');">
                                        <div class="without-overlay contain"></div>
    
                                        <div class="with-overlay contain">  Coffee </div>
                                        
                                    </div>
                                </div>
                             
                            </div> -->
                    </div>
                </div>
        </div>
    </main>

</x-app-layout>