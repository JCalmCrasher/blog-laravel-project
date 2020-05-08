@extends('layouts.layout')

@section('title')
  Larablog - About Us
@endsection

@section('container')
  @parent
  @section('banner-title')
      About Us
  @endsection

  @section('banner-detail')
      We are the outlet you turn to to get the latest, hottest gists, news from entertainment, tech, sports, name it
  @endsection

  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2 class="display-4">What We Do</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
      </div>
    </div>
    <!-- /.row -->

  </div>
@endsection