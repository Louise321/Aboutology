<link href="css/helpcenter.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>

<x-app-layout>

    <div class="wraper">
        <div style="padding:0px;">
            <img class="imgcont contaimg"
                src="https://t3.ftcdn.net/jpg/03/63/56/36/360_F_363563655_miRAA5MeYcFuOPJzarQ2Z7BmibXzjM2L.jpg"
                alt="Snow" style="width:100%;">
            <h1
                style="position:absolute;top:24.5%;left:56%;transform: translate(-50%, -50%);color: black;font-size:30px">
                Hello there, How Can We Help?</h1>
        </div>

        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search...">
                <button type="submit" class="searchButton">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>


    <h4 class="title">Frequently Asked Question</h4>


    <div class="main-content">
        <div class="home_div row">
            <div class=" col s12 m10">
                <div class="row">
                    <ul class="col s12 m12 collapsible popout" data-collapsible="accordion" style="list-style: none">
                        @foreach ($hcenter as $hcqna)

                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons">picture_in_picture</i>{{$hcqna -> question}}
                                </div>
                                <div class="collapsible-body">
                                    <p>{{$hcqna ->answer}}</p>
                                </div>
                            </li>
                        @endforeach
   
                    </ul>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
