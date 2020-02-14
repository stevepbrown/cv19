@extends('layouts.layout_master')



@section('main')


<form class="needs-validation" method="POST" action="/contact/create" novalidate>

    
    {{-- CSRF token --}}
@csrf

        


            <div class="form-group mb-3">
                <label for="input-given-name">First Name</label>&nbsp;
            <input type="text" class="form-control" id="input-given-name"  placeholder="Given name" name="given_name" value="wibble">
                <div class="invalid-feedback">
                        Uh oh, error!
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="input-family-name">Second Name</label>
                <input type="text" class="form-control" id="input-family-name" placeholder="Family name" name="family_name" >
                <div class="invalid-feedback">
                    Uh oh, error!
                </div>
                </div>
        
       
                <div class="form-row mb-3">
                    <div class="col-sm-6 col-md-4">
                        <label for="input-email">Email</label>
                        <input type="email" class="form-control" id="input-email" placeholder="Contact email address"  name="" >
                        <div class="invalid-feedback">
                            Uh oh, error!
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="input-confirm-email">Email</label>
                        <input type="email" class="form-control" id="input-confirm-email" placeholder="Re-enter email address">
                        <div class="invalid-feedback">
                            Uh oh, error!
                        </div>
                    </div>
                </div>
          
                
            <div class="form-group mb-3">
                <label for="input-telephone">Telephone</label>
                <input type="tel" class="form-control" id="input-tel" placeholder="Mobile or landline" >
                <div class="invalid-feedback">
                    Uh oh, error!
                </div>
            </div>


     
     
        <div id="div-source-type"  class="form-row mb-3">

            <div class="form-group col-12 md-6">
            <label for="select-source-type">How did you hear about me?</label>
            <select id="select-source-type" class="custom-select">
                
                <option value=null>-- Please select one --</option>
                @foreach ($trafficSourceTypes as $item)
                   <option value="{{$item->code}}">{{$item->text}}</option> 
                @endforeach

            </select>
            </div>
            <div class="col-12 md-6 form-group">
                <input id="input-source-other" type="text" class="form-control" placeholder="specify other">
            </div>
            <div class="invalid-feedback">
                Uh oh, error!
            </div>
        </div>
        <div class="form-group"></div>
        <input class="form-control btn btn-outline-primary my-3 mx-auto" type="submit" value="Submit">
        </div>
</form>


@endsection
