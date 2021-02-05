<link href="css/setting.css" rel="stylesheet">
<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
<link rel="canonical" href="https://demo.adminkit.io/pages-settings.html" />

<!-- BEGIN SETTINGS -->
<script src="js/settings.js"></script>
<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>


<title>Settings</title>

<x-admin-layout>

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

                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 col-xl-10">
                            <div class="tab-content">

                                <!-- Profile -->

                                <div class="tab-pane fade show active" id="account" role="tabpanel">
                                <div class="container">
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Sorry !</strong> There were some problems with your input.<br><br>
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                            @if(session('success'))
                                            <div class="alert alert-success">
                                            {{ session('success') }}
                                            </div> 
                                            @endif

                                    <h3 class="jumbotron"><i class="glyphicon glyphicon-upload"></i> Laravel Multiple File Upload</h3> 
                                    <form method="post" action="{{url('upload_data')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                            <div class="input-group control-group increment" >
                                            <input type="file" name="filename[]" class="form-control">
                                            <div class="input-group-btn"> 
                                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                            </div>
                                            <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="filename[]" class="form-control">
                                                <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                            </div>
                                            </div>
                                            <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
                                    </form>
                                    <br><hr>

                                    <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr><th>#</th>
                                            <th>Picture</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $image)
                                        <tr><td>{{$image->id}}</td>
                                            <td> <?php foreach (json_decode($image->filename)as $picture) { ?>
                                                    <img src="{{ asset('/image/'.$picture) }}" style="height:120px; width:200px"/>
                                                    <?php } ?>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    </div>
                                </div>


                                <!-- Security -->
                                <div class="tab-pane fade" id="security" role="tabpanel">
                                    <div class="card">
                                        
                                    </div>
                                    <div class="card">
										abc
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

    </x-admin-layout>
