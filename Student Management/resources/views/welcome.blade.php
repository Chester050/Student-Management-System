@extends('layouts.layout')


          @section('content')

          @php

      echo date('hs');
          @endphp
        <div class="container">
          <form method="POST" action="/dashboard">
            <div class="mb-3 mt-3">
                @csrf
              <input type="text" class="form-control w-50 mx-auto my-5" id="email" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">

              <input type="password" class="form-control w-50 m-auto" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
            <div class="form-check mb-3">
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Login</button>
              </div>
          </form>
        </div>
{{--
        <div class='container d-flex justify-content-center mt-5'>
        @if($id == 'Admin')
            <script>
                alert('Hello User');
                </script>
            @else
            <h2> You are not</h2>
        @endif
        </div> --}}



        @endsection

