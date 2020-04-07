
@extends('layout')

@section('content')
<<<<<<< Updated upstream
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <center>
    <table class="table table-striped" border="1px" style="margin: 50px;">
      <thead>
        <tr>
          <td>ID</td>
          <td>Traveller Name</td>
          <td>Travel City</td>
          <td>Travel Description</td>
        </tr>
      </thead>
      <tbody>
        @foreach($travels as $travel)
        <tr>
          <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->id}}</a></td>
          <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->name}}</a></td>
          <td>{{$travel->city}}</td>
          <td>{{$travel->description}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </center>
<div>
=======

<!-- Main -->
					<div id="main">
                        <center>
                        <table class="table table-striped" border="1px" style="margin: 50px;" >
                          <thead>
                              <tr>
                                <td>ID</td>
                                <td>Traveller Name</td>
                                <td>Travel City</td>
                                <td>Travel Description</td>
                             </tr>
                          </thead>
                          <tbody>
                              @foreach($travels as $travel)
                              <tr>
                                  <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->id}}</a></td>
                                  <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->name}}</a></td>
                                  <td>{{$travel->city}}</td>
                                  <td>{{$travel->description}}</td>
                               </tr>
                              @endforeach
                          </tbody>
                        </table>
                        </center>
						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<span class="date">April 25, 2017</span>
									<h2><a href="#">Penny in Thailand</a></a></h2>
									<p>Thailand, the fatanstic city. I really enjoy it a lot!!!!</p>
								</header>
								<a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a>
								<ul class="actions special">
									<li><a href="#" class="button large">Full Story</a></li>
								</ul>

							</article>


						<!-- Posts -->
							<section class="posts">
								<article>
									<header>
										<span class="date">April 24, 2017</span>
										<h2><a href="#">User A</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
									<p>Travelnotes from User A</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 22, 2017</span>
										<h2><a href="#">User B</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
									<p>Travelnotes from User B</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 18, 2017</span>
										<h2><a href="#">User C</h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a>
									<p>Travelnotes from User C</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 14, 2017</span>
										<h2><a href="#">User D<br />
										nulla imperdiet</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a>
									<p>Travelnotes from User D</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>

							</section>
                    </div>

>>>>>>> Stashed changes
@endsection
