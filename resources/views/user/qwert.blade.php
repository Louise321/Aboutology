<link href="css/setting.css" rel="stylesheet">
<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
<link rel="canonical" href="https://demo.adminkit.io/pages-settings.html" />

<!-- BEGIN SETTINGS -->
<script src="js/settings.js"></script>
<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>

<title>Demo</title>

<x-app-layout>

    <div class="wrapper">
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Settings</h1>
                    <div class="container">
                        <ul class="nav nav-stacked nav-pills" id="tabMenu">
                            <li class=""><a class="list-group-item list-group-item-action active" href="#Galleries" data-toggle="tab">Galleries</a></li>
                            <li><a class="list-group-item list-group-item-action" href="#Agg" data-toggle="tab">Agg</a></li>
                            <li><a class="list-group-item list-group-item-action" href="#Ahh" data-toggle="tab">Ahh</a></li>
                            <li><a class="list-group-item list-group-item-action" href="#Add" data-toggle="tab">Add</a></li>
                        </ul>
                        </div>

                        <div class="tab-content">
                        <div class="tab-pane active" id="Galleries">Home</div>
                        <div class="tab-pane" id="Agg">MDKFMDKMF</div>
                        <div class="tab-pane" id="Ahh">POPOPOP</div>
                        <div class="tab-pane" id="Add">
                            
                            <!-- Check if error -->
                            @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Check if feedback is successfully created -->

                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Feedback</b></h5>
                                            
                                            <form method="POST" action="{{ route('qwert.store') }}"> 
                                                 @csrf 
                                                <div class="mb-3">
                                                    <label class="form-label" for="feedbackTitle"> Feedback Title</label>
                                                    <input type="text" class="form-control" name="feedbackTitle">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="feedbackContent">Feedback Content</label>
                                                        <textarea rows="5" class="form-control" name="feedbackContent"
                                                                placeholder="Give any feedback and suggestions"></textarea>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                            </form>

                                        </div>
                                    </div>

                        </div>

                        </div>
                </div>
            </main>
        </div>
    </div>

</x-app-layout>

<script>
$(document).ready(function () {
$('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
});
</script>
