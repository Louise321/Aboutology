<link href="css/setting.css" rel="stylesheet">
<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
<link rel="canonical" href="https://demo.adminkit.io/pages-settings.html" />

<!-- BEGIN SETTINGS -->
<script src="js/settings.js"></script>
<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-120946860-10', {
        'anonymize_ip': true
    });

</script>

<title>Settings</title>

<x-app-layout>

    <div class="wrapper">
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    <h1 style="padding-bottom:20px">Settings</h1>

                    <div class="row">
                        <div class="col-md-3 col-xl-2">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0" style="font-size:22px; padding-bottom:20px;">Profile Settings</h5>
                                </div>

                                <div class="list-group list-group-flush" role="tablist">
                                    <a class="list-group-item list-group-item-action active" data-toggle="tab"
                                        href="#account" role="tab">
                                        Account
                                    </a>
                                    <a class="list-group-item list-group-item-action" data-toggle="tab"
                                        href="#security" role="tab">
                                        Security
                                    </a>
                                    {{-- <a class="list-group-item list-group-item-action" data-toggle="tab" 
                                        href="#notification" role="tab">
                                        Notifications --}}
                                    </a>
                                    <a class="list-group-item list-group-item-action" data-toggle="tab" 
                                        href="#preference" role="tab">
                                        Preference
                                    </a>
                                   <!-- <a class="list-group-item list-group-item-action" data-toggle="tab" 
                                        href="#feedback" role="tab">
                                        Feedback
                                    </a>
                                     <a class="list-group-item list-group-item-action" data-toggle="list" href="#"
                                        role="tab">
                                        Widgets
                                    </a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#"
                                        role="tab">
                                        Your data
                                    </a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#"
                                        role="tab">
                                        Delete account
                                    </a> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 col-xl-10">
                            <div class="tab-content">

                                <!-- Profile -->

                                <div class="tab-pane fade show active" id="account" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0"><b>Public info</b></h5>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <br />
                                        @endif

                                        @if (Session::has('updated_profile'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('updated_profile') }}
                                            </div>
                                        @endif


                                        <div class="card-body">
                                            <form method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">

                                                @csrf
                                                @method('PATCH')

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="inputUsername">Username</label>
                                                            <input type="text" class="form-control" id="inputUsername"
                                                                placeholder="Username" value="{{ $profile['fullname'] }}" name="name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="inputUsername">Biography</label>
                                                            <textarea rows="2" class="form-control" id="inputBio"
                                                                placeholder="Tell something about yourself" name="desc">{{ $profile['short_desc'] }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="inputDOB">Date of Birth</label>
                                                            <input type="text" class="form-control" id="inputDOB"
                                                                value="{{ $profile['date_of_birth'] }}"  name="dob">
                                                        </div>
                                                        <div class="mb-3" style="padding-bottom:20px;">
                                                            <label class="form-label" for="inputAddress">Phone Number</label>
                                                            <input type="text" class="form-control" id="inputPhone"
                                                                placeholder="e.g. 011-12345678" value="{{ $profile['phone'] }}" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="text-center">
                                                            <img alt="" src="{{asset('uploads/profilePic/'.$profile->profilepic_path)}}"
                                                                class="rounded-circle img-responsive mt-2" width="128"
                                                                height="128" />
                                                            <input type="file" name="profilepic_path" value="{{ $profile->profilepic_path }}">
                                                            {{-- <div class="mt-2">
                                                                <span class="btn btn-primary"><i
                                                                      class="fas fa-upload"></i> Upload</span>
                                                            </div> --}}
                                                            <small>For best results, use an image at least 128px by
                                                                128px in .jpg format</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>

                                        </div>
                                    </div>

                                    {{-- <div class="card">
                                        <div class="card-header">

                                            <h5 class="card-title mb-0"><b>Private info</b></h5>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="inputFirstName">First
                                                            name</label>
                                                        <input type="text" class="form-control" id="inputFirstName"
                                                            placeholder="First name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="inputLastName">Last name</label>
                                                        <input type="text" class="form-control" id="inputLastName"
                                                            placeholder="Last name">
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4"
                                                        placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="inputAddress">Phone Number</label>
                                                    <input type="text" class="form-control" id="inputPhone"
                                                        placeholder="e.g. 011-12345678">
                                                </div>
                                                <!-- <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="inputAddress2">Address 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Apartment, studio, or floor">
                                                </div> -->
                                                <div class="row">
                                                    <!-- <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="inputCity">City</label>
                                                        <input type="text" class="form-control" id="inputCity">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label" for="inputState">State</label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>...</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-2">
                                                        <label class="form-label" for="inputZip">Zip</label>
                                                        <input type="text" class="form-control" id="inputZip">
                                                    </div> -->
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div> --}}
                                </div>


                                <!-- Security -->
                                <div class="tab-pane fade" id="security" role="tabpanel">

                                    <div class="card">
										<div class="card-body">
                                            <h5 class="card-title"><b>Change Password</b></h5>

                                            @if (Session::has('updated'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ Session::get('updated') }}
                                                </div>
                                            @endif

                                            @if (Session::has('message'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif

                                            @if (count($errors))
                                                @foreach ($errors->all() as $error)
                                                    <p class="alert alert-danger">{{$error}}</p>
                                                @endforeach
                                            @endif 

                                            
                                            <form action="{{ route('update-password.update', $users->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')

                                            
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent" name="oldpassword">
													<small>
                                                        <p class="forgot-pass">    
                                                            @if (Route::has('password.request'))
                                                                <a href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                            @endif
                                                        </p>
                                                    </small>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew" name="newpassword">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2" name="password_confirmation">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>
                                            {{-- @endforeach --}}

										</div>
									</div>
								</div>
					
                                


                                <!-- Notification -->
                                {{-- <div class="tab-pane fade" id="notification" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Notification</b></h5>

                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label" for="calenderNotification">Calender Notification</label>
                                                    <button type="button" class="btn btn-sm btn-one btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" id="calenderNotification">
                                                        <div class="handle"></div>
                                                    </button>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="forumNotification">Forum Notification</label>
                                                    <button type="button" class="btn btn-sm btn-one btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" id="forumNotification">
                                                        <div class="handle"></div>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                

                                <!-- preference -->

                                <div class="tab-pane fade" id="preference" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>User Preference</b></h5>
                                          <br/><br>
                                            @foreach ($userPref as $item)
                                                @if ($item->subscription == 1)
                                                    <a class="updatePreferenceStatus" 
                                                        href="javascript:void(0)"
                                                        style="margin:10px 15px 10px 0" id="userPref-{{ $item->id }}"
                                                        userPref-id="{{ $item->id }}"><i
                                                        class="fas fa-check-square" aria-hidden="true"
                                                        status="Active"></i></a>{{$item->name}} <br/>
                                                @else
                                                <a class="updatePreferenceStatus" 
                                                        href="javascript:void(0)"
                                                        style="margin:10px 15px 10px 0" id="userPref-{{ $item->id }}"
                                                        userPref-id="{{ $item->id }}"><i
                                                            class="far fa-square" aria-hidden="true"
                                                            status="Inactive"></i></a>{{$item->name}} <br/>

                                                @endif
                                            @endforeach 
                                          

                                        </div>
                                    </div>
                                </div>

                                <!-- end -->

                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
      setTimeout(function(){
        if(localStorage.getItem('popState') !== 'shown'){
          window.notyf.open({
            type: "success",
            message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
            duration: 10000,
            ripple: true,
            dismissible: false,
            position: {
              x: "left",
              y: "bottom"
            }
          });
  
          localStorage.setItem('popState','shown');
        }
      }, 15000);
    });
</script>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script language="JavaScript" type="text/javascript">
    $(document).on("click",".updatePreferenceStatus",function(){
        var status = $(this).children("i").attr("status");
        var banner_id = parseInt($(this).attr("userPref-id"));
        console.log("status",status,"banner_id",banner_id)
$.ajax({

        type: "GET",
        dataType: "json",
        url: '/update-user-preference-status',
        data: {'status': status, 'banner_id': banner_id},
        success: function(data){
            if(data.status==0){
                 $("#userPref-"+data.banner_id).html("<i class='far fa-square' aria-hidden='true' status='Inactive'></i>"); 
            }else if(data.status==1){
                 $("#userPref-"+data.banner_id).html("<i class='fas fa-check-square' aria-hidden='true' status='Active'></i>");
        }
    },
        error:function(resp){
            console.log(resp);
            alert("Error");

        }

        });
  
});    
</script>