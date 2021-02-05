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

                    <h1 class="h3 mb-3">Settings</h1>

                    <div class="row">
                        <div class="col-md-3 col-xl-2">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Profile Settings</h5>
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
                                    <a class="list-group-item list-group-item-action" data-toggle="tab" 
                                        href="#notification" role="tab">
                                        Notifications
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
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="inputUsername">Username</label>
                                                            <input type="text" class="form-control" id="inputUsername"
                                                                placeholder="Username">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="inputUsername">Biography</label>
                                                            <textarea rows="2" class="form-control" id="inputBio"
                                                                placeholder="Tell something about yourself"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="text-center">
                                                            <img alt="Charles Hall" src="img/avatar.jpg"
                                                                class="rounded-circle img-responsive mt-2" width="128"
                                                                height="128" />
                                                            <div class="mt-2">
                                                                <span class="btn btn-primary"><i
                                                                        class="fas fa-upload"></i> Upload</span>
                                                            </div>
                                                            <small>For best results, use an image at least 128px by
                                                                128px in .jpg format</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>

                                        </div>
                                    </div>

                                    <div class="card">
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
                                    </div>
                                </div>


                                <!-- Security -->
                                <div class="tab-pane fade" id="security" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Two-Factor Authentication</b></h5>

                                            <!-- <div class="mb-3">
                                                    <label class="form-label" for="emailAuthentication">Email Authentication</label>
                                                    <button type="button" class="btn btn-sm btn-one btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" id="emailAuthentication">
                                                        <div class="handle"></div>
                                                    </button>
                                                </div> -->
                                            
                                            @if(! auth()->user()->two_factor_secret)
                                            
                                                You have not enable 2fa

                                                <form method="POST" action="{{url('../user/two-factor-authentication')}}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label" for="QRcodeAuthentication">QR Code Authentication</label>
                                                        <button type="submit" class="btn btn-primary security-btn">
                                                            Enable
                                                        </button>
                                                        <!-- <button type="button" class="btn btn-sm btn-one btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off" id="QRcodeAuthentication">
                                                            <div class="handle"></div>
                                                        </button> -->
                                                    </div>
                                                </form>

                                            @else

                                                

                                                <form method="POST" action="{{url('../user/two-factor-authentication')}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="mb-3">
                                                        <label class="form-label" for="QRcodeAuthentication"><b>QR Code Authentication</b></label>
                                                        <button type="submit" class="btn btn-primary security-btn">
                                                            Disable
                                                        </button>
                                                        <!-- <button type="button" class="btn btn-sm btn-one btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="on" id="QRcodeAuthentication">
                                                            <div class="handle"></div>
                                                        </button> -->
                                                    </div>
                                                </form>
                                            
                                            @endif    

                                            @if(session('status') == 'two-factor-authentication-enabled')

                                                <p> You have now enabled 2fa, 
                                                    please scan the following QR code 
                                                    into your phone authenticator application.
                                                </p>
                                                {!! auth()->user()->twoFactorQrCodeSvg() !!}

                                                <br>

                                                <p style="padding-top:20px;">Please store these recovery codes in a secure location.</p>

                                                <br>

                                                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                                    {{ trim($code) }} <br>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>


                                    <div class="card">
										<div class="card-body">
                                            <h5 class="card-title"><b>Two-Factor Authentication</b></h5>
                                            <form>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													<small><a href="#">Forgot your password?</a></small>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>
								</div>
					
                                


                                <!-- Notification -->
                                <div class="tab-pane fade" id="notification" role="tabpanel">
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
                                </div>
                                

                                <!-- preference -->

                                <div class="tab-pane fade" id="preference" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Notification</b></h5>

                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label" for="c">Cat</label>
                                                    <input type="checkbox" id="c">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="c">Cat</label>
                                                    <input type="checkbox" id="c">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
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
