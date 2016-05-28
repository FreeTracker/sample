@extends('layouts.base')
@section('content')
    @include('layouts.navbar', ['navigate'=> 'index', 'breadcrumbs' => ['0' => 'tracker_index', '1' => '']])
    <div class="row">
        @foreach($torrents as $torrent)
            <div class="col-xs-6 col-md-4 col-lg-4">
                <div class="course-card">
                    <section class="course-cover">

                    </section>
                    <section class="course-information">
                        <h2><a href="/tracker/show/{{$torrent->torrent_id}}">{{$torrent->torrent_name}}</a></h2>
                        <div class="additional-inforamtion">
                            <div class="row course-statistic">
                                <div class="col-xs-4 students"><i class="fa fa-search"></i></i> {{$torrent->view}}</div>
                                <div class="col-xs-4 students"><i class="fa fa-comment"></i> 0</div>
                                <div class="col-xs-4 students"><i class="fa fa-magnet"></i> {{$torrent->count}}</div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endforeach
    </div>
@stop
@section('pagination')
    @include('layouts.paginate',['paginate'=>$torrents->appends(Request::except('page'))])
@stop

