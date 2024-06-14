@extends('admin.layouts.master')
@section('title','Turf')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Turf</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Turf</h5>
                </div>
                <div class="card-body">
                    <form method="POST" data-parsley-validate="" id="addEditForm" role="form" >
                        @csrf
                        <input type="hidden" id="edit_value" value="{{$turf->id}}" name="edit_value">
                        <input type="hidden" id="state_id" value="{{$turf->state_id}}" name="state_id">
                        <input type="hidden" id="city_id" value="{{$turf->city_id}}" name="city_id">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$turf->name}}"
                                           placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="mobile_no" class="form-label">Mobile No</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                           value="{{$turf->mobile_no}}"
                                           placeholder="Mobile No">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{$turf->email}}"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="contact_person_name" class="form-label">Contact Person Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact_person_name"
                                           name="contact_person_name"
                                           value="{{$turf->contact_person_name}}"
                                           placeholder="Contact Person Name">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                           value="{{$turf->address}}"
                                           placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="area" class="form-label">Area</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="area" name="area"
                                           value="{{$turf->area}}"
                                           placeholder="Area">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="pincode" class="form-label">Pincode</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="pincode" name="pincode"
                                           value="{{$turf->pincode}}"
                                           placeholder="Pincode">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="state" class="form-label">State<span
                                        class="text-danger"></span></label>
                                <input type="text" class="form-control tt-input"
                                       placeholder="State" id="state"
                                       name="state" autocomplete="off" spellcheck="false" dir="auto"
                                       value="{{$turf->state}}"
                                       style="position: relative; vertical-align: top; background-color: transparent;">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="city" class="form-label">City<span
                                        class="text-danger"></span></label>
                                <input type="text" class="form-control tt-input"
                                       placeholder="City" id="city"
                                       value="{{$turf->city}}"
                                       name="city" autocomplete="off" spellcheck="false" dir="auto"
                                       style="position: relative; vertical-align: top; background-color: transparent;">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="location" name="location"
                                           value="{{$turf->location}}"
                                           placeholder="Location">
                                    <input type="hidden" id="latitude" value="{{$turf->latitude}}" name="latitude"/>
                                    <input type="hidden" id="longitude" value="{{$turf->longitude}}" name="longitude"/>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div id="map-canvas" style="height:300px;"></div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="facility_provided" class="form-label">Facility Provided</label>
                                <div class="form-group">
                                    <textarea class="form-control" id="facility_provided"
                                              name="facility_provided"
                                              placeholder="Facility Provided">{{$turf->facility_provided}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="video_link" class="form-label">Video Link</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           value="{{$turf->video_link}}"
                                           id="video_link" name="video_link"
                                           placeholder="Video Link">
                                </div>
                            </div>
                            @for($i=1;$i<=5;$i++)
                                @php($turfImage = App\Models\TurfImage::where('user_id', $turf->id)->where('key', $i)->first())
                                <div class="col-lg-6 mb-3">
                                    <label for="image_{{$i}}" class="form-label">Image {{$i}}</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control dropify"
                                               @if($turfImage)
                                                   data-default-file="{{asset($turfImage->image)}}"
                                               @endif
                                               id="image_{{$i}}" name="images[{{$i}}]"
                                        >
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="text-end">
                            <button type="submit"
                                    class="btn btn-success btn-sm">{{trans('messages.save')}}</button>
                            <a href="{{ route('admin.company.index') }}"
                               class="btn btn-danger btn-sm">{{trans('messages.cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_API_KEY")}}&libraries=places"
        async defer integrity=""></script>
    <script src="{{URL::asset('assets/custom-js/initMap.js')}}?v={{ time() }}"></script>
    <script>
        let form_url = '/company'
        let redirect_url = '/company'
        autoCompleteState()
    </script>
    <script src="{{ asset('assets/custom-js/custom/form.js') }}"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                initMap()
            }, 1000)
            setTimeout(function () {
                $('#address').attr('autocomplete', 'new-password')
                $('#state').trigger('change')
                $('#city').trigger('change')
                addMarker('{{ $turf->latitude }}', '{{ $turf->longitude }}', '{{ $turf->location }}')
            }, 1100)
        })
    </script>
@endsection