<x-admin-layout>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <ul class="nav nav-pills card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="opened-tab" data-toggle="tab" href="#opened" role="tab"
                                    aria-controls="opened" aria-selected="true">Opened Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="closed-tab" data-toggle="tab" href="#closed" role="tab"
                                    aria-controls="closed" aria-selected="false">Closed Request </a>
                            </li>

                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="opened" role="tabpanel"
                                aria-labelledby="opened-tab">
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Date / Time</th>
                                                <th>Status</th>
                                                <th class="text-center">View Ticket</th>
                                            </tr>
                                        </thead>
                                        @foreach($feedback_opened as $feedOpen)
                                            <tbody>
                                                <tr>
                                                    <td>{{$feedOpen -> id}}</td>
                                                    <td>{{$feedOpen -> title}}</td>
                                                    <td>{{$feedOpen -> created_at}}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill badge-primary">{{$feedOpen -> status}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="feedview" class="btn btn-primary btn-sm"><i
                                                                class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="closed" role="tabpanel" aria-labelledby="closed-tab">
                                <div class="table-responsive">
                                    <table id="default_order2" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Subject</th>
                                                <th>Date / Time</th>
                                                <th>Status</th>
                                                <th class="text-center">View Ticket</th>
                                            </tr>
                                        </thead>
                                        @foreach($feedback_closed as $feedClosed)
                                            <tbody>
                                                <tr>
                                                    <td>{{$feedClosed -> id}}</td>
                                                    <td>{{$feedClosed -> title}}</td>
                                                    <td>{{$feedClosed -> created_at}}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill badge-success">{{$feedClosed -> status}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="feedview" class="btn btn-success btn-sm"><i
                                                                class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
