@extends('frontend.layouts.master')

@section('title')
Menovahub-Profile

@endsection

@section('style')

@endsection

@section('content')
<div class="container rounded bg-white mt-4 mb-4">
    <div class="row justify-content-md-center">

        <div class="col-md-8 border border-light">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle " width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-8 border border-light">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12 mb-3"><label class="labels">Name</label><input type="text" id = 'name' name = 'name' class="form-control" placeholder="first name" ></div>
                    <div class="col-md-12 mb-3"><label class="labels">Email </label><input type="text" id = 'email' name = 'email' class="form-control" placeholder="enter email" ></div>
                    <div class="col-md-12 mb-3"><label class="labels">Mobile Number</label><input type="text" id = 'phone' name = 'phone' class="form-control" placeholder="enter phone number" ></div>
                    <div class="col-md-12 mb-3"><label class="labels">State</label><input type="text" id = 'state' name = 'state' class="form-control" placeholder="enter address line 2" ></div>
                </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
    </div>
       
    </div>
</div>
@endsection

@section('script')
@endsection
