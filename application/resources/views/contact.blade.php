@extends('layouts.layout_master')
@section('main')

@php
    
/* Facilitate programmatic insertion of old msg 
using js by asigning a non null (php)
variable */

$oldMessage = old('message','n/a');


@endphp

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
                <label class="asterix-req" for="family-name">Second Name</label>
                <input type="text" class="form-control" id="family-name" placeholder="Family name"
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
            <label class="asterix-req" for="traffic_source_code">How did you hear about me?</label>
        <select id="traffic_source_code" class="custom-select" name="traffic_source_code" tabindex="12" form="form-contact" selected="{{old('traffic_source_code')}}">
                <option value=null>-- Please select one --</option>
                @foreach ($trafficSourceTypes as $item)
                    @if (old('traffic_source_code') == $item->code)
                        <option value={{$item->code}} selected>{{$item->text}}</option>
                    @else
                        <option value={{$item->code}}>{{$item->text}}</option>
                    @endif
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
        <textarea id="message" name="message" form="form-contact" maxlength="500"  placholder="Outline your enquiry"  wrap="hard" rows="6" tabindex="14" value="{{old('message')}}" class="w-100"></textarea>
            
        </div>
    </div>
    </form-group>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6">
            {{-- Button trigger modal --}}
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#termsModalTarget">Consent to terms</button>
           <input type="checkbox" id="consent" name="consent" tabindex="15" value="true" aria-label="Checkbox for terms" class="m-2 p-0"
        
           {{-- Conditionally set the check attribute --}}
           @if(old('consent') =='true')
            checked
           @endif
           >
        </div>
    </div>   
    <div class="form-row">
            <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-3 offset-xl-4">
                <input class="form-control btn btn-outline-primary my-3 " tabindex="16" role="button" type="submit" value="submit">
            </div>    
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="termsModalTarget" tabindex="-1" role="dialog" aria-labelledby="termsModalTargetTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ethical Practice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('partials.partial_terms')
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-terms-accept" class="btn btn-secondary" data-dismiss="modal">Accept</button>
        </div>
      </div>
    </div>
  </div>
  </form>
@endif



  


@scripts
@push('supplementary_scripts')
 <script id="script-contact">
    $("document").ready(function () {

        

        // Only show the 'How did you hear about me?' specify(other) when 'other'(99) selected.
        function showHideSourceOther() {
 
          

            var selected = $("#traffic_source_code option:selected");

            
            if ($(selected).val() == 99) {
                $("#div-traffic-source-other-container").removeClass("invisible");
                $("#traffic_source_other").val({{old('traffic_source_other',null)}});
            
            } else {
                $("#div-traffic-source-other-container").addClass("invisible");
                $("#traffic_source_other").val(null);
            };


        };

        function repopulateMessage(){

              // Will always return a string
            var oldMessage = '{{$oldMessage}}';

            if (oldMessage != 'n/a') {

                $('#message').text(oldMessage);
                return true;

            }

            return false;


        }


      


        $.validator.addMethod('trafficOtherRequired',

            function () {


                var trafficSourceParent = $("#traffic_source_code");
                var trafficSourceChild = $('#traffic_source_other')
                             
                // returns false if fails validation
                var result = !(trafficSourceParent.val() == 99 && trafficSourceChild.val().length < 1);

                return (result);



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



                    "traffic_source_code": {


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



                    "traffic_source_code": {

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

        $("#traffic_source_code").change(function () {
            showHideSourceOther()
        });

   
        $("#traffic_source_code").trigger('change');

        // since the textarea input type does not support a 'value' attribute, 
        // any repopulation has to be done programmatically
        repopulateMessage();
      



       

       


    });
 </script>
@endpush
@endscripts
@endsection
