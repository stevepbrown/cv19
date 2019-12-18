<div id="div-print-jobs">
    <h2>Employment History</h2>
    
  
    @foreach ($jobs as $job)
        <h3 id="h3-job-{{$job->JOB_ID}}">{{$job->ROLE}}{{$job->EMPLOYER}}</h3>
        <P>{{$job->EMPLOYER_DESCRIPTION->unique()}}</P>
    @endforeach
    
</div>