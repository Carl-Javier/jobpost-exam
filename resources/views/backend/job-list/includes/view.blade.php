<div class="row">
    <div class="post-date col-md-12">
        <h2 class="post-title">
            {{$jobs->title}}
        </h2>
    </div>
    <div class="post-date col-md-12">
        <h4 class="post-title">
            {{$jobs->company_name}}
        </h4>
    </div>
    <br>
    <br>
    <div class="col-md-12">
        <p>{!! $jobs->description !!}</p>
    </div>
    <div class="post-date col-md-12 text-center">
        <small>{{$jobs->published_date}}</small>
    </div>
</div>
