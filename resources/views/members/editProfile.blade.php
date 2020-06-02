@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                <form method="POST" action="/member/Profile/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div style="width: 30%; float:left;">
                            <div>
                                <label for="image">image</label>
                                     @if($user->image =='default.jpg' )
                                        <img src="{{asset('storage/uploads/' .$user->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                                     @else
                                        <img src="{{asset('storage/' .$user->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                                     @endif
                                <input type="File" name="image" class="py-2">
                            </div>
                         </div>
                         
                         <div style="width: 70%; float:right">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('New Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('New E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="oldpassword" type="password" class="form-control" name="OldPass" required autocomplete="Old-password">
    
                                    @error('oldpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >
    

                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="Weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Weight" type="integer" value="{{$user->Weight}}" class="form-control" name="Weight">
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label for="Age" class="col-md-4 col-form-label text-md-right">{{ __('age') }}</label>
    
                                <div class="col-md-6">
                                    <input id="age" type="string" value="{{$user->age}}" class="form-control" name="age" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('height') }}</label>
    
                                <div class="col-md-6">
                                <input id="height" type="integer" value="{{$user->height}}" class="form-control" name="height" >
                                </div>
                            </div>
                            
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                         </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection













