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


<form id="form-contact" class="container mt-4" method="POST" action="/contact/create">

    
    {{-- CSRF token --}}
@csrf

    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label for="input-given-name">First Name</label>&nbsp;
            <input type="text" class="form-control" id="input-given-name" placeholder="Given name"
                name="given_name" minlength="2" tabindex="7" autofocus required>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
        <div class="col-10 col-sm-6 col-md-4">    
                <label for="input-family-name">Second Name</label>
                <input type="text" class="form-control" id="input-family-name" placeholder="Family name"
                    name="family_name" minlength="2" tabindex="8" required>
                <div class="invalid-feedback">
                    Uh oh, error!
                </div>
        </div>
    </div>
    <div class="form-row mb-3">
        
    </div>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label for="input-email">Email</label>
            <input type="email" class="form-control" id="input-email" placeholder="Contact email address" name="email" tabindex="9" required>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
        <div class="col-10 col-sm-6 col-md-4">
            <label for="input-confirm-email">Confirm Email</label>
            <input type="email" class="form-control" id="input-confirm-email"
                placeholder="Re-enter email address" name="confirm_email" tabindex="10"  required>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6 col-md-4">
            <label for="input-telephone">Telephone</label>
            <input type="tel" class="form-control" id="input-tel" placeholder="Mobile or landline"
                name="telephone" tabindex="11" >
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
    </div>
    <div id="div-source-type" class="form-row mb-3">
        <div class="col-10 col-sm-6">
            <label for="select-source-type">How did you hear about me?</label>
            <select id="select-source-type" class="custom-select" name="traffic_source_id" tabindex="12" form="form-contact" required>

                <option value=null>-- Please select one --</option>
                @foreach ($trafficSourceTypes as $item)
                <option value="{{$item->code}}">{{$item->text}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-10 col-sm-6">
            <input id="input-source-other" type="text" class="form-control invisible" placeholder="specify other" name="traffic_source_other" tabindex="13" >
        </div>
        <div class="invalid-feedback">
            Uh oh, error!
        </div>
    </div>
    <p>Enquiry</p>
    <div class="form-row mb-3">
        <div class="col-10">
            <textarea name="message" id="text-area-msg" form="form-contact" maxlength="500" name="message" placholder="Outline your enquiry"  wrap="hard" rows="5" cols="50" tabindex="14" required></textarea>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-lg-2">
            <input class="form-control btn btn-outline-primary my-3 mx-auto" type="submit" value="Submit" tabindex="15" >
        </div>    
    </div>
</form>

{{-- This script is pushed onto the named stack & injected where the stack declaration is made (component.scripts) --}}
@push('supplementary_scripts')

<script>

$("document").ready(function () {
    
    // Enable / disable logic for traffic source (other, specify)
    
    var $selected;
    
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

    /*
      'given_name'=>'required|alpha_dash|min:2',
        'family_name'=>'required|alpha_dash|min:2',
         'email'=>'required|email|same:confirm_email',
         'confirm_email'=>'required|email|same:email',
         'traffic_source'=>'required|numeric',
         'traffic_source_other'=>'exclude_unless:traffic_source,99|required|alpha_dash|min:4',
         'telephone'=>'nullable|min:10',
         'message'=>'required|min:5|max:500'
    
     */

    $("#form-contact").validate();

});



</script>

@endpush


@endsection
