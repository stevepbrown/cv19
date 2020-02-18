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


<form class="was-validated" method="POST" action="/contact/create" novalidate>

    
    {{-- CSRF token --}}
@csrf

            <div class="form-group mb-3">
                <label for="input-given-name">First Name</label>&nbsp;
            <input type="text" class="form-control" id="input-given-name"  placeholder="Given name" name="given_name"  required>
                <div class="invalid-feedback">
                        Uh oh, error!
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="input-family-name">Second Name</label>
                <input type="text" class="form-control" id="input-family-name" placeholder="Family name" name="family_name" required>
                <div class="invalid-feedback">
                    Uh oh, error!
                </div>
                </div>
        
       
                <div class="form-row mb-3">
                    <div class="col-sm-6 col-md-4">
                        <label for="input-email">Email</label>
                        <input type="email" class="form-control" id="input-email" placeholder="Contact email address"  name="email" required>
                        <div class="invalid-feedback">
                            Uh oh, error!
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="input-confirm-email">Email</label>
                        <input type="email" class="form-control" id="input-confirm-email" placeholder="Re-enter email address" name="confirm_email" required>
                        <div class="invalid-feedback">
                            Uh oh, error!
                        </div>
                    </div>
                </div>
          
                
            <div class="form-group mb-3">
                <label for="input-telephone">Telephone</label>
                <input type="tel" class="form-control" id="input-tel" placeholder="Mobile or landline"  name="telephone">
                <div class="invalid-feedback">
                    Uh oh, error!
                </div>
            </div>


     
     
        <div id="div-source-type"  class="form-row mb-3">

            <div class="form-group col-12 md-6">
            <label for="select-source-type">How did you hear about me?</label>
            <select id="select-source-type" class="custom-select" name="traffic_source_id" required>
                
                <option value=null>-- Please select one --</option>
                @foreach ($trafficSourceTypes as $item)
                   <option value="{{$item->code}}">{{$item->text}}</option> 
                @endforeach

            </select>
            </div>
            <div class="col-12 md-6 form-group">
                <input id="input-source-other" type="text" class="form-control invisible" placeholder="specify other" name="traffic_source_other">
            </div>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
        <div class="form-group">
            <label for="message">Enquiry</label>
            <input type="text-area" id="input-textarea-msg" name="message">
        </div>

        <div class="form-group"></div>
        <input class="form-control btn btn-outline-primary my-3 mx-auto" type="submit" value="Submit">
        </div>
</form>

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

});



</script>

@endpush


@endsection
