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
<form id="form-contact" class="container mt-4 was-valid" method="POST" action="/contact/create">
{{-- CSRF token --}}
@csrf
<div class="form-row mb-3">
    <div class="col-10 col-sm-6 col-md-4">
        <label for="input-given-name">First Name</label>&nbsp;
        <input type="text" class="form-control" id="input-given-name" placeholder="Given name"
            name="given_name" tabindex="7" autofocus required>
        
       
    </div>

    <div class="col-10 col-sm-6 col-md-4">    
            <label for="input-family-name">Second Name</label>
            <input type="text" class="form-control" id="input-family-name" placeholder="Family name"
                name="family_name"  tabindex="8">
    </div>
</div>
<div class="form-row mb-3">
</div>
<div class="form-row mb-3">
    <div class="col-10 col-sm-6 col-md-4">
        <label for="input-email">Email</label>
        <input type="text" class="form-control" id="input-email" placeholder="Contact email address" name="email" tabindex="9">
       
    </div>
    <div class="col-10 col-sm-6 col-md-4">
        <label for="input-confirm-email">Confirm Email</label>
        <input type="text" class="form-control" id="input-confirm-email"
            placeholder="Re-enter email address" name="confirm_email" tabindex="10"  >
       
    </div>
</div>
<div class="form-row mb-3">
    <div class="col-10 col-sm-6 col-md-4">
        <label for="input-telephone">Telephone</label>
        <input type="tel" class="form-control" id="input-tel" placeholder="Mobile or landline"
            name="telephone" tabindex="11" >
       
    </div>
</div>
<div id="div-source-type" class="form-row mb-3">
    <div class="col-10 col-sm-6">
        <label for="select-source-type">How did you hear about me?</label>
        <select id="select-source-type" class="custom-select" name="traffic_source" tabindex="12" form="form-contact" >
            <option value=null>-- Please select one --</option>
            @foreach ($trafficSourceTypes as $item)
            <option value="{{$item->code}}">{{$item->text}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row mb-3">
    <div class="col-10 col-sm-6">
        <input id="input-source-other" type="text" class="form-control invisible" placeholder="specify other" name="traffic_source_other" tabindex="13">
    </div>
</div>
<p>Enquiry</p>
<div class="form-row mb-3">
    <div class="col-10">
        <textarea id="text-area-msg"  name="message" form="form-contact" maxlength="500" name="message" placholder="Outline your enquiry"  wrap="hard" rows="5" cols="50" tabindex="14" ></textarea>
        
    </div>

</div>
<div class="form-row mb-3">
    <div class="col-10 col-sm-6">
        <input type="checkbox" id="checkbox-consent" name="consent" tabindex="15" >
        <label for="checkbox-consent"> I consent to terms</label>
    
    </div> <br>
  
</div>
<div class="form-row">
    <div class="col-lg-2">
        <input class="form-control btn btn-outline-primary my-3 mx-auto" type="submit" value="Submit" tabindex="16" role="button">
    </div>    
</div>
</form>
@scripts
@push('supplementary_scripts')
 <script id="script-contact">
    $("document").ready(function() {
     $("#select-source-type").change(function(){
                             $selected = $("#select-source-type option:selected");
                             if ($($selected).val() == 99) {
                                 $("#input-source-other").removeClass("invisible");
                             }
                             else {
                                 $("#input-source-other").addClass("invisible");
                                 $("#input-source-other").val(null);
                             };
                         });
    
        $("#form-contact").validate({
        debug: true,
        rules:{
            "given_name":{
                required:true,
                minlength:2
            },
            "family_name":{
                required:true,
                minlength:2
            },
            "email":{
                required:true,
              
           
            },
           
            "traffic_source":{

               
                number:true
                
            },

            "message":{
                required:true,
                minlength:10

            },

            "consent": {

                required:true

            }
            


            

        },

        messages:{

            "email":{
                equalTo: "The emails provided do not match!"

            },

            "traffic_source":{

                number: "Please indicate where you heard about me."

            },

            "message":{

                minlength: "At least 10 characters must be entered."
            },

            "consent": {
               required: "You must check the box to consent to the terms."
            }

        }

        
    });
    
    $(".error").addClass('invalid-error');

    
});
 </script>
@endpush
@endscripts
@endsection
