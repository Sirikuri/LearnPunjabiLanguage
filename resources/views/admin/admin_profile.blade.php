@extends('admin.layouts.app',['page_title' => 'profile'])
@section('content')
<div class="card-body">
        <form method="POST" action="{{ route('admin_update_profile') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 pr-md-1">
                    <div class="form-group">
                        <label for="email" style="color: black">  Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                        <label for="email" style="color: black"> Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email ,old('email') }}" required autocomplete="email">
                        
                    </div>
                </div>
                <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                        <label for="password" style="color: black">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="password">
                        <small>Your password will remain same, if left empty.</small><br><br>
                    </div>
                </div>
            </div>
            
                    <button type="submit" class="btn btn-success">
                        <strong style="color: white">Update</strong>
                    </button>
        </form>
    </div>
    @endsection