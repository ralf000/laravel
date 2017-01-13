@extends('layouts.layout')

@section('content')
    <div class="row">

        <div class="col-lg-12">

            <h1>Contact form Tutorial from <a href="http://bootstrapious.com">Bootstrapious.com</a></h1>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <p class="lead">This is a demo for our tutorial dedicated to crafting working Bootstrap contact form with
                PHP and AJAX background.</p>


            <form id="contact-form" method="post" action="{{ route('contact') }}" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Firstname *</label>
                                <input id="form_name" type="text" name="name" value="{{ old('name') }}" class="form-control"
                                       placeholder="Please enter your firstname *"
                                       data-error="Firstname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Lastname *</label>
                                <input id="form_lastname" type="text" name="surname" value="{{ old('surname') }}" class="form-control"
                                       placeholder="Please enter your lastname *"
                                       data-error="Lastname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" value="{{ old('email') }}" class="form-control"
                                       placeholder="Please enter your email *"
                                       data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_phone">Phone</label>
                                <input id="form_phone" type="tel" name="phone" value="{{ old('phone') }}" class="form-control"
                                       placeholder="Please enter your phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control"
                                          placeholder="Message for me *" rows="4"
                                          data-error="Please,leave us a message.">{{ old('message') }}</textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted"><strong>*</strong> These fields are required. Contact form template by
                                <a href="http://bootstrapious.com" target="_blank">Bootstrapious</a>.</p>
                        </div>
                    </div>
                </div>

            </form>

        </div><!-- /.8 -->

    </div> <!-- /.row-->

@endsection