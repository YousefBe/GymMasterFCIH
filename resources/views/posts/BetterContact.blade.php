@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('contact-us') }}</div>

                <div class="card-body">
                <form method="POST" action="/contact-us/send">
                        @csrf
                        <div class="form-group">
                            <small>to check delivered message login to stmp with email: mailmeplease58@gmail.com</small>
                            <small>password : justmailme <small>
                                    <h3 style="text-align: center;">Give Us your feed Back or ask about whatever you wana know , we are here for you</h3>
                                    <label for="subjecct">subject</label>
                                    <input type="text" class="form-control" name="subject">

                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="email">

                                    <label for="Massege">Message</label>
                                    <div class="input-group pt-3">
                                      <textarea class="form-control" aria-label="With textarea" name="Massege" placeholder="Type Your Message" rows="4"></textarea>
                                    </div>
                
                                   
                                  </div>
                                  <div class="form-group pt-4">
                                    <button type="submit"  class="btn btn-primary">Send!</button>  
                                  </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
