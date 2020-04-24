@extends('layouts.layout')

@section('title')
  Larablog - Services
@endsection

@section('container')
  @parent

  @section('banner-title')
      Our Services
  @endsection

  @section('banner-detail')
      We offer the best services available, don't miss out; our flash sales is on
  @endsection

  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2 class="display-4">What We Do</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
      </div>
      <div class="col-md-4 mb-5">
        <h2 class="display-4" style="font-size:40px">Contact Us</h2>
        <hr>
        <address>
          <strong>Start Bootstrap</strong>
          <br>3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          (123) 456-7890
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">name@example.com</a>
        </address>
      </div>
    </div>
    <!-- /.row -->
  </div>
@endsection