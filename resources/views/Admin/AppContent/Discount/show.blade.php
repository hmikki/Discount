@extends('AhmedPanel.crud.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.show')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        @foreach($Fields as $field)
                                            @if($field["type"] == 'text')
                                                <tr>
                                                    <th style="border-top: none !important;">{{__('crud.'.$lang.'.'.$field["name"])}}</th>
                                                    <td style="border-top: none !important;">{{$Object[$field["name"]]}}</td>
                                                </tr>
                                            @elseif($field["type"] == 'image')
                                                <tr>
                                                    <th style="border-top: none !important;">{{__('crud.'.$lang.'.'.$field["name"])}}</th>
                                                    <td style="border-top: none !important;"><img src="{{asset($Object[$field["name"]])}}" height="70px" width="70px"></td>
                                                </tr>
                                            @elseif($field["type"] == 'url')
                                                <tr>
                                                    <th style="border-top: none !important;">{{__('crud.'.$lang.'.'.$field["name"])}}</th>
                                                    <td style="border-top: none !important;"><a href="{{$Object[$field["name"]]}}">{{$Object[$field["name"]]}}</a></td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th style="border-top: none !important;">{{__('crud.'.$lang.'.'.$field["name"])}}</th>
                                                    <td style="border-top: none !important;">{{$Object[$field["name"]]}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th class="text-center" style="border-top: none !important;">{{__('crud.'.$lang.'.qrcode')}}</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="border-top: none !important;">{!! $Object->getQrcode() !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
