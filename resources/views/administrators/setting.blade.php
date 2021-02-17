<link href="/css/setting.css" rel="stylesheet">
<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
<link rel="canonical" href="https://demo.adminkit.io/pages-settings.html" />

<!-- BEGIN SETTINGS -->
<script src="js/settings.js"></script>
<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>


<title>Users</title>

<x-admin-layout>

<div class="wrapper">
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    {{-- <h1 class="h3 mb-3">Users</h1> --}}

                    <div class="row">
                        

                        <div class="col-md-12 col-xl-12">
                            <div class="tab-content">

                                <!-- Profile -->

                                <div class="tab-pane fade show active" id="account" role="tabpanel">
                                    @if (Session::has('deleted'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('deleted') }}
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Users</b></h5>

                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th style="width:7%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>
                                                            <form action="{{ route('userRecord.delete', $item->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                    
                                                                <button type="submit" title="delete"
                                                                    style="border: none; background-color:transparent;">
                                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody> 
                                                
                                              
                                            </table>
                                          
                                        </div>
                                    
                                    </div>
                                    {!! $users->links('pagination::bootstrap-4') !!}
                                </div>


                                <!-- Categories -->
                                {{-- <div class="tab-pane fade" id="w" role="tabpanel">
                                    

								</div> --}}
                               

                                <!-- preference -->

                                {{-- <div class="tab-pane fade" id="p" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Notification</b></h5>
                                            @foreach($category_list->chunk(2) as $chunk)
                                            <div class="row">
                                                @foreach($chunk as $item)
                                  
                                                    <div class="col-md-6">
                                                        <tr class="abc">
                                                            <td><input style="margin:0;width:25%" type="checkbox" name="category[]" value="{{ $item->id }}"></td>
                                                            <td> {{ $item->name }}</td>
                                                        </tr>
                                                    </div>

                                                @endforeach
                                            </div>
                                        @endforeach


                                        </div>
                                    </div>
                                </div> --}}

                                <!-- end -->

                            </div>
                        </div>

                </div>
            </main>
        </div>
    </div>

    </x-admin-layout>
