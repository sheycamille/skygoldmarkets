@extends('layouts.front')

@section('title', 'Contact Us')

@section('contact-menu-item', 'uk-active')

@section('content')

    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 in-breadcrumb">
                    <ul class="uk-breadcrumb uk-float-right">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Company</a></li>
                        <li><span>Contact</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->

    <main>
        <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center in-contact-6">

                    <div class="uk-width-3-5@m">
                        <div class="uk-grid uk-child-width-1-3@m uk-margin-medium-top uk-text-center" data-uk-grid>
                            <div>
                                <h5 class="uk-margin-remove-bottom">Address</h5>
                                <p class="uk-margin-small-top">
                                    @lang('message.contact.london_office'): 20-22 Wenlock Road, London, England, N1 7GU.
                                </p>
                            </div>
                            <div>
                                <h5 class="uk-margin-remove-bottom">Email</h5>
                                <p class="uk-margin-small-top uk-margin-remove-bottom">support@skygoldmarkets.com</p>
                                <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-top">for public
                                    inquiries</p>
                            </div>
                            <div>
                                <h5 class="uk-margin-remove-bottom">Call</h5>
                                <a href="tel:+18028519171">(+1) 781 499 2351 (US & Canada)</a>
                                <br>
                                <a href="tel:+61894672610">(+61) 894 672 610 (Australia)</a>
                                <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-top">Mon - Fri, 9am
                                    - 5pm</p>
                            </div>
                        </div>
                        <hr class="uk-margin-medium">
                        <h4 class="uk-margin-remove-bottom uk-text-muted uk-text-center">Have a questions?</h4>
                        <h1 class="uk-margin-small-top uk-text-center">Let's <span class="in-highlight">get in touch</span>
                        </h1>
                        <form id="contact-form" class="uk-form uk-grid-small uk-margin-medium-top" data-uk-grid
                            action="{{ route('sendcontactmessage') }}">
                            <div class="uk-width-1-2@s uk-inline">
                                <span class="uk-form-icon fas fa-user fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="name" name="name" type="text"
                                    placeholder="@lang('message.contact.name')">
                            </div>
                            <div class="uk-width-1-2@s
uk-inline">
                                <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="email" name="email" type="email"
                                    placeholder="@lang('message.contact.email')">
                            </div>
                            <div class="uk-width-1-1 uk-inline">
                                <span class="uk-form-icon fas fa-pen fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="subject" name="subject" type="text"
                                    placeholder="Subject">
                            </div>
                            <div class="uk-width-1-1">
                                <textarea class="uk-textarea uk-border-rounded" id="message" name="message" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div class="uk-width-1-1">
                                <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" id="sendemail"
                                    type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
@endsection
