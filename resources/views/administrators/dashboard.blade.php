<link href="/css/adashboard.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>

<x-admin-layout>

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Analytics</strong> Dashboard</h3>
                </div>
                <div class="col-auto ml-auto text-right mt-n1">
                    {{-- <form method="POST" id="make_pdf" action="/app/create_pdf.php">
                        <input type="hidden" name="hidden_html" id="hidden_html"/>
                        <button type="button" name="create_pdf" id="create_pdf" class="btn"><i class="fa fa-download"></i> Generate Report</button>
                    </form> --}}

                    {{-- <form method="POST" action="{{ route('report') }}">
                        <button type="button" class="btn"><i class="fa fa-download"></i> Generate Report</button>
                    </form> --}}

                </div>
            </div>


            {{-- <div class="row">
                <div class="col-md-3">
                    <div class="card" style="border-radius: 20px; background-color: #D8DDEC;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title mb-4" style="font-size: .875rem"><strong>Total Users</strong></h5>
                                </div>
                        
                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle">
                                            <i class="align-middle fas fa-users fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="mt-1" style="padding: 0 14 0;">{{$userCount->count()}}</h1>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="border-radius: 20px; background-color: #D0F0C0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title mb-4" style="font-size: .875rem">Total Articles</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle">
                                            <i class="align-middle fas fa-search fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1" style="padding: 0 14 0;">{{ $articleCount->count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="border-radius: 20px; background-color: #E6D1F2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title mb-4" style="font-size: .875rem">Total Forums</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle">
                                            <i class="align-middle far fa-file-alt fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1" style="padding: 0 14 0;">{{ $forumCount->count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="border-radius: 20px; background-color: #F9DFDB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title mb-4" style="font-size: .875rem">Total News</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle">
                                            <i class="align-middle far fa-comments fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1" style="padding: 0 14 0;">{{ $newsCount->count() }}</h1>
                       </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <!-- order-card start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Users</h6>
                            <h2 class="text-right text-white"><i class="align-middle fas fa-users fa-2x float-left"></i><span>{{$userCount->count()}}</span></h2>
                            <p class="m-b-0">This Month<span class="float-right">{{ $userCountThisM }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Articles</h6>
                            <h2 class="text-right text-white"><i class="align-middle far fa-file-alt fa-2x float-left"></i></i><span>{{ $articleCount->count() }}</span></h2>
                            <p class="m-b-0">This Month<span class="float-right">{{ $articleCountThisM }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Forums</h6>
                            <h2 class="text-right text-white"><i class="align-middle far fa-comments fa-2x float-left"></i></i><span>{{ $forumCount->count() }}</span></h2>
                            <p class="m-b-0">This Month<span class="float-right">{{ $forumCountThisM }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-red order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total News</h6>
                            <h2 class="text-right text-white"><i class="align-middle fas fa-newspaper fa-2x float-left"></i><span>{{ $newsCount->count() }}</span></h2>
                            <p class="m-b-0">This Month<span class="float-right">{{ $newsCountThisM }}</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">           
                    <h3 style="font-size: 16px"><strong>New Users Growth</strong></h3>             
                </div>

                <div class="col-md-6">           
                    <h3 style="font-size: 16px"><strong>No. Of Forum Created Per Month</strong></h3>      
                </div>

            </div>

            <div id="testing">
                <div class="row">

                    <div class="col-md-6" id="lineChart" style="width: 100%;">                        
                    </div>
                    
                    {{-- <div  class="col-md-6" id="comboChart" style="width: 100%;">
                    </div> --}}

                    <div class="col-md-6" id="areaChart" style="width: 100%; height: 300px">
                    </div>

                </div>

                <br>

                <div class="col-md-12">
                    <h3 style="font-size: 16px"><strong>Top 10 Most Viewed Articles</strong></h3>
                </div>
                
                <div class="col-md-12" id="barChart" style="width: 100%; height: 300px">
                </div>


            </div>

            <br>

            <div class="row">

                <div class="col-md-6">           
                    <h3 style="font-size: 16px"><strong>Article Category (%)</strong></h3>             
                </div>

                <div class="col-md-6">           
                    <h3 style="font-size: 16px"><strong>Top 5 Most Viewed Forum</strong></h3>             
                </div>

            </div>

            <div class="row">

                {{-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title" style="font-size: 16px"><strong>Most Viewed Article</strong></h1>
                        </div>
            
                        <table class="table fixed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:5%;">Rank</th>
                                    <th style="width:30%">Name</th>
                                    <th style="width:15%">Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rank as $index => $ranks)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $ranks->title }}</td>
                                        <td>{{ $ranks->views }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}

                <div class="col-md-6" id="pieChart">
                </div>

                <div class="col-md-6">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h5 class="card-title" style="font-size: 16px"><strong>Most Viewed Forum</strong></h1>
                        </div> --}}
            
                        <table class="table fixed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:5%;">Rank</th>
                                    <th style="width:30%">Name</th>
                                    <th style="width:10%">Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($frank as $index => $ranks)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $ranks->title }}</td>
                                        <td>{{ $ranks->views }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

        </div>

    </main> 

</x-admin-layout>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Register Users Count'],
 
                @php
                    foreach($users as $user) {
                        echo "['".$user->month_name."', ".$user->count."],";
                    }
                @endphp
        ]);
 
        var options = {
            // title: 'New Users Growth',
            titlePosition: 'none',
            curveType: 'function',
            width: '100%',
            legend: { position: 'bottom' },
            vAxis: {
                gridlines: {
                    color: 'transparent'
                }
            }
        };
        
          var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
 
          chart.draw(data, options);
        }

        $(window).resize(function(){
        drawChart();
        });
        
</script>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
        ['Article Title', 'Views'],

        @php
            foreach($articles as $article) {
                echo "['".$article->title."', ".$article->views."],";
            }
        @endphp
    ]);

    var options = {
        // title: 'Viewed Articles',
        titlePosition: 'none',
        seriesType: 'bars',
        width: '100%',
        vAxis: {
                gridlines: {
                    color: 'transparent'
                }
            },
        chartArea: {
            top: '50',
            height: '40%' 
            }

    };
    var chart = new google.visualization.ComboChart(document.getElementById('barChart'));
    chart.draw(data, (options));
    }

    $(window).resize(function(){
        drawVisualization();
        });

</script>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        var record234={!! json_encode($foru234) !!};
            console.log("TEST234",record234);
        var record1={!! json_encode($foru) !!};
            console.log("TEST1",record1);

        var abc;
        if(record234.length > record1.length){
            console.log("234 lnger")
            abc = record234.length
        }else{
            console.log("1 longer")
            abc = record1.length

        }
        for (var i=0; i<abc;i++){
            if(record1[i].month_name === record234[i].month_name){
                console.log("tatattatat");
                record234[i].forumcount = record1[i].count;
                console.log("ABCDE",record234);
            }else{
                console.log("booooo");
                record234[i].forumcount =0;

            }
        }
   

    var data = google.visualization.arrayToDataTable([
        ['Month', 'Forum Counts','Comments'],
    
         @php
             foreach($forums as $forum) {
                echo "['".$forum->month_name."', ".$forum->count.", ".$forum->ccount."],";
            } 
           
        @endphp 
        
    ]);

    var options = {
        // title: 'No. Of Forum Created Per Month',
        titlePosition: 'none',
        seriesType: 'bars',
        series: {1: {type: 'line'}},
        chartArea: {width: "65%"},
        vAxis: {
                gridlines: {
                    color: 'transparent'
                }
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('comboChart'));
    chart.draw(data, (options));
    }

    $(window).resize(function(){
        drawVisualization();
        });

</script>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Forum Count'],

        @php
            foreach($foru as $forum) {
                echo "['".$forum->month_name."', ".$forum->count."],";
            }
        @endphp
    ]);

    var options = {
        // title: 'Viewed Articles',
        titlePosition: 'none',
        width: '100%',
        hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
        vAxis: {
                gridlines: {
                    color: 'transparent'
                },
                minValue: 0

            },
        // chartArea: {
        //     top: '50',
        //     height: '40%' 
        //     }

    };
    var chart = new google.visualization.AreaChart(document.getElementById('areaChart'));
    chart.draw(data, (options));
    }

    $(window).resize(function(){
        drawVisualization();
        });

</script>

<script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var record={!! json_encode($data) !!};
            console.log(record);

            // Create our data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category Name');
            data.addColumn('number', 'Total_Signup');
            for(var k in record){
                var v = record[k];
            
                data.addRow([k,v]);
            console.log(v);
            }
            var options = {
            // title: '% Article Category',
            titlePosition: 'none',
            is3D: true,
            chartArea:{width:"100%"},
            legend: {'position':'right','alignment':'center'},
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
            chart.draw(data, options);
        }

        $(window).resize(function(){
            drawChart();
        });

</script>