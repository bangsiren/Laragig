
@if(count($listings) == 0)
  <h1>No Listings Found</h1>
@endif
<h1>{{$header}}</h1>
@foreach($listings as $listing)
 <h2>
  <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
 </h2>
 <p>{{$listing['description']}}</p>
@endforeach