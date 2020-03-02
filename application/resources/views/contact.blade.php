@extends('layouts.layout_master')
@section('main')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if ($status == 201)
    <div class="alert alert-success">
        <p>Thank-you, your enquiry has been submitted successfully.</p>
    </div>
@else

    <form id="form-contact" class="container mt-4 was-valid" method="POST" action="/contact/create">
    {{-- CSRF token --}}
   @csrf
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label class="asterix-req" for="input-given-name">First Name</label></i>&nbsp;
            <input type="text" class="form-control" id="input-given-name" placeholder="Given name"
                name="given_name" tabindex="7" value="{{old('given_name')}}"  autofocus>
            </div>

        <div class="col-10 col-sm-6 col-md-4">    
                <label class="asterix-req" for="input-family-name">Second Name</label>
                <input type="text" class="form-control" id="input-family-name" placeholder="Family name"
                    name="family_name"  tabindex="8" value="{{old('family_name')}}">
        </div>
    </div>
    <div class="form-row mb-3">
    </div>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label class="asterix-req" for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Contact email address" name="email" tabindex="9"  value="{{old('email')}}">
        
        </div>
        <div class="col-10 col-sm-6 col-md-4">
            <label class="asterix-req" for="confirm_email">Confirm Email</label>
            <input type="text" class="form-control" id="confirm_email"
        placeholder="Re-enter email address" name="confirm_email" tabindex="10" value="{{old('confirm_email')}}"  >
        
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label for="input-telephone">Telephone</label>
            <input type="tel" class="form-control" id="input-tel" placeholder="Mobile or landline (not required), min "
        name="telephone" tabindex="11" value="{{old('telephone')}}" >
        
        </div>
    </div>
    <div id="div-source-type" class="form-row mb-3">
        <div class="col-10 col-sm-6">
            <label class="asterix-req" for="select-source-type">How did you hear about me?</label>
        <select id="traffic_source" class="custom-select" name="traffic_source" tabindex="12" form="form-contact" selected="{{old('traffic_source')}}">
                <option value=null>-- Please select one --</option>
                @foreach ($trafficSourceTypes as $item)
                <option value="{{$item->code}}">{{$item->text}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div id="div-traffic-source-other-container" class="form-row mb-3 invisible">
        <div class="col-10 col-sm-6">
        <input id="traffic_source_other" type="text" class="form-control asterix-req" placeholder="specify other" name="traffic_source_other" tabindex="13" value="{{old('traffic_source_other')}}">
        </div>
    </div>
    
    <form-group>
    <legend class="asterix-req">Enquiry</legend>
    <div class="form-row mb-3">
        <div class="col-10">
        <textarea id="text-area-msg"  name="message" form="form-contact" maxlength="500" name="message" placholder="Outline your enquiry"  wrap="hard" rows="5" cols="50" tabindex="14" value="{{old('traffic_source_other')}}"></textarea>&nbsp;
            
        </div>

    </div>
    </form-group>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6">
        <input type="checkbox" id="checkbox-consent" name="consent" tabindex="15" value="{{old('consent')}}" >
            <label class="asterix-req" for="checkbox-consent"> <a href="/ethics#section-terms" target="_parent">I consent to terms</a></label>
                </div> <br>
    
    </div>
    <div class="form-row">
        <div class="col-lg-2">
            <input class="form-control btn btn-outline-primary my-3 mx-auto" tabindex="16" role="button" type="submit" value="submit">
        </div>    
    </div>
    </form>
@endif


<!-- Button trigger modal -->
<button type="link" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    I consent to terms
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('partials.partial_terms')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Accept</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@scripts
@push('supplementary_scripts')
 <script id="script-contact">
    $("document").ready(function () {


        // Only show the 'How did you hear about me?' specify(other) when 'other'(99) selected.
        function showHideSourceOther() {

    
            $selected = $("#traffic_source option:selected");

            if ($($selected).val() == 99) {
                $("#div-traffic-source-other-container").removeClass("invisible");
            } else {
                $("#div-traffic-source-other-container").addClass("invisible");
                $("#traffic_source_other").val(null);
            };


        };



        $("#traffic_source").change(function () {
            showHideSourceOther()
        });



        $.validator.addMethod('trafficOtherRequired',

            function () {


                var $trafficSourceParent = $("#traffic_source");
                var $trafficSourceChild = $('#traffic_source_other')
                             
                // returns false if fails validation
                var $result = !($trafficSourceParent.val() == 99 && $trafficSourceChild.val().length < 1);

                return ($result);



            }, 'Please specify how you heard about me');


        $("#form-contact").validate({


                rules: {
                    "given_name": {
                        required: true,
                        minlength: 2
                    },
                    "family_name": {
                        required: true,
                        minlength: 2
                    },
                    "email": {
                        required: true


                    },
                    "confirm_email": {
                        required: true,
                        equalTo: '#email'

                    },



                    "traffic_source": {


                        number: true

                    },

                    "traffic_source_other": {

                        trafficOtherRequired: true,


                    },



                    "message": {
                        required: true,
                        minlength: 10

                    },

                    "consent": {

                        required: true

                    }
                },

                messages: {


                    "confirm_email": {


                        equalTo: "The emails provided do not match!"

                    },



                    "traffic_source": {

                        number: "Please indicate where you heard about me."

                    },

                    "message": {

                        minlength: "At least 10 characters must be entered."
                    },

                    "consent": {
                        required: "You must check the box to consent to the terms."
                    }

                }


            }

        );



        $(".error").addClass('invalid-error');

      
        showHideSourceOther();


    });
 </script>
@endpush
@endscripts
@endsection
