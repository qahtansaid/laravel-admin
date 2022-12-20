@extends('admin::index', ['header' => strip_tags($header)])

@section('content')
    <div class="row" id="bredcumb">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <img src="/dastone/assets/images/FormTriase.png" class="img-fluid" style="height:7vw" alt="...">
                    {{-- <div class="col">
                        <h4 class="page-title">{!! $header ?: trans('admin.title') !!}
                            <small>{!! $description ?: trans('admin.description') !!}</small></h4>
                            @if ($breadcrumb)
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                                @foreach($breadcrumb as $item)
                                    @if($loop->last)
                                        <li class="breadcrumb-item active">
                                            @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                                <i class="fa fa-{{ $item['icon'] }}"></i>
                                            @endif
                                            {{ $item['text'] }}
                                        </li>
                                    @else
                                    <li>
                                        @if (\Illuminate\Support\Arr::has($item, 'url'))
                                            <a href="{{ admin_url(\Illuminate\Support\Arr::get($item, 'url')) }}">
                                                @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                                    <i class="fa fa-{{ $item['icon'] }}"></i>
                                                @endif
                                                {{ $item['text'] }}
                                            </a>
                                        @else
                                            @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                                <i class="fa fa-{{ $item['icon'] }}"></i>
                                            @endif
                                            {{ $item['text'] }}
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                            </ol>
                            @elseif(config('admin.enable_default_breadcrumb'))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                                @for($i = 2; $i <= count(Request::segments()); $i++)
                                    <li>
                                    {{ucfirst(Request::segment($i))}}
                                    </li>
                                @endfor
                            </ol>
                            @endif
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                            <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                            <span class="" id="Select_date">Jan 11</span>
                            <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i data-feather="download" class="align-self-center icon-xs"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    

    {{-- <section class="content"> --}}

        @include('admin::partials.alerts')
        @include('admin::partials.exception')
        @include('admin::partials.toastr')

        @if($_view_)
            @include($_view_['view'], $_view_['data'])
        @else
            {!! $_content_ !!}
        @endif

    {{-- </section> --}}
@endsection
