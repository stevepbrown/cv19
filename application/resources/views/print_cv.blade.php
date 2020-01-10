@extends('layouts.layout_print')
@section('main')

<h1 class="display-3">Steve Brown <br/> Curriculum Vitae</h1>
<div id="div-print-spiel">
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias soluta inventore pariatur, voluptate, fugiat similique suscipit eveniet possimus dolorem commodi adipisci explicabo et nobis ullam voluptates amet mollitia? Veritatis, magnam. Sunt tempora itaque maiores sapiente est. Architecto veniam velit alias quo fugiat labore quasi perferendis eveniet libero dolorum! Optio hic rem laudantium voluptatibus magnam maiores, quo reprehenderit aliquam harum modi voluptatem cum culpa perferendis repudiandae voluptas beatae aspernatur totam officiis ducimus. Unde blanditiis doloremque, corrupti nisi magnam doloribus ullam est accusantium incidunt esse alias quod optio reprehenderit temporibus at possimus tempora harum? Debitis eos est velit distinctio saepe autem culpa!
</div>

<div id="div-data-container">
@include('partials.print.partial_print_skills')
@include('partials.print.partial_print_qualifications')
@include('partials.print.partial_print_jobs')
</div>
@endsection


