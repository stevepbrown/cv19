    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <meta name="author" content="Steve Brown">
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta name="description" content="{{$description}}">
    @foreach ($links as $link)
  
      <link id="{{$link['attr_id']}}"
        type="{{$link['link_type']}}"
        rel="{{$link['rel']}}"
        href="{{$link['href']}}"
        {{$media= $link['media']?? $link['media'] ?? null}}>
        
    @endforeach



