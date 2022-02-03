<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ appName() }}</title>
    <meta name="description" content="@yield('meta_description', appName())">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    @stack('after-styles')
</head>
<body>
@include('includes.partials.read-only')
@include('includes.partials.logged-in-as')
@include('includes.partials.announcements')

<div id="app" class="flex-center position-ref full-height">
    <div class="top-right links">
        @auth
            @if ($logged_in_user->isUser())
                <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
            @endif

            <a href="{{ route('frontend.user.account') }}">@lang('Account')</a>
        @else
            <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>

            @if (config('boilerplate.access.user.registration'))
                <a href="{{ route('frontend.auth.register') }}">@lang('Register')</a>
            @endif
        @endauth
    </div><!--top-right-->

    <div class="content">
        @include('includes.partials.messages')
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(count($jobs))
                        <div class="list-group">
                            @foreach($jobs as $job)
                                <a href="{{ route('frontend.show',['id' => $job->id]) }}"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3 class="mb-1">{{ $job->title }}</h3>
                                        <small>{{ date("F j, Y, g:i a",strtotime($job->published_date)) }}</small>
                                    </div>
                                    <div class="col-md-12 text-left text-muted">
                                        <b>SALARY:</b>
                                        <span><b>{{ $job->salary_details }}</b></span>
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <span class="fa fa-tags"></span>
                                        @foreach($job->tags as $tag)
                                            <span class='badge badge-primary text-left'>{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <span class="fa fa-users"></span>
                                        @foreach($job->types as $type)
                                            <span class='badge badge-primary text-left'>{{ $type->name }}</span>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <span class="fa fa-map-marked"></span>
                                        @foreach($job->countries as $country)
                                            <span class='badge badge-primary text-left'>{{ $country->country_name }}</span>
                                        @endforeach
                                    </div>
                                    <p class="mb-1">{!! substr($job->description, 0, 150) !!}</p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="list-group">
                            <span>No result found.</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <form method="GET" action="{{ route('frontend.index') }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Search</label>
                            <input type="text" name="search" class="form-control" id="exampleInputEmail1"
                                   value="{{ request()->query('search') ?? '' }}" placeholder="Enter here">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><span class="fa fa-tags"></span></label>
                            @foreach(\App\Models\Tags::all() as $tags)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tags" type="radio" id="inlineCheckbox1"
                                           value="{{ $tags->id }}" {{ request()->query('tags') == $tags->id ? 'checked': '' }}>
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $tags->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><span class="fa fa-users"></span></label>
                            @foreach(\App\Models\JobTypes::all() as $types)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="types" type="radio" id="inlineCheckbox1"
                                           value="{{ $types->id }}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $types->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <br/>
        {{ $jobs->appends(['search' => request()->query('search')])->links() }}
    </div><!--content-->
</div><!--app-->

@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
@stack('after-scripts')
</body>
</html>
