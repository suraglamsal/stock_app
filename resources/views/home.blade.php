@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                    <div class="row justify-content-center">
                        <form action="upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="uname" class="form-label">Store keeper's Name</label>
                                <input
                                    type="text"
                                    name="uname"

                                    class="form-control"
                                    placeholder="Enter full name" />

                            </div>

                            <div class="mb-3">
                                <label for="uaddress" class="form-label">Enter Address</label>
                                <input
                                    type="text"
                                    name="uaddress"

                                    class="form-control"
                                    placeholder="Address" />
                            </div>


                            <div class="mb-3">
                                <label for="uage" class="form-label">Enter age</label>
                                <input
                                    type="text"
                                    name="uage"

                                    class="form-control"
                                    placeholder="Age in years" />
                            </div>

                            <div class="mb-3">
                                <label for="uphone" class="form-label">Enter Phone number</label>
                                <input
                                    type="text"
                                    name="uphone"

                                    class="form-control"
                                    placeholder="980000000" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Select Gender</label>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="gender"
                                        id="male"
                                        value="male" />
                                    <label class="form-check-label" for="male">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="gender"
                                        id="female"
                                        value="female" />
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="gender"
                                        id="other"
                                        value="other" />
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="ueducation" class="form-label">Enter user's  highest level of Education</label>
                                <input
                                    type="text"
                                    name="ueducation"

                                    class="form-control"
                                    placeholder="E.g. MBA ongoing" />
                            </div>

                            <div class="form-group">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                </div>
                                <div>
                                    <input type="file" name="img" class="mb-5">
                                    <br>
                                    <button type="submit"> Submit </button> </div>
                    
                            
                            
                        </div>

                        </form>
                    </div>

                    <!-- You are logged in! -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection