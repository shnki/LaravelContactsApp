@extends('layouts.main')
@section('title', 'Add Company')
@section('content')

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">


                        <div class="card-header card-title">
                            <strong>Add New Company</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('companies.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Company Name</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ old('name') }}" name="name"
                                                    id="name"
                                                    class="form-control @error('name')
                      is-invalid
                      @enderror">

                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-md-3 col-form-label">Address</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ old('address') }}" name="address"
                                                    id="address"
                                                    class="form-control @error('address')
                      is-invalid
                      @enderror">

                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ old('email') }}" name="email"
                                                    id="email"
                                                    class="form-control @error('email')
                      is-invalid
                      @enderror">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="website" class="col-md-3 col-form-label">website</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ old('website') }}" name="website"
                                                    id="website"
                                                    class="form-control @error('website')
                      is-invalid
                      @enderror">
                                                @error('website')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-9 offset-md-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <a href="{{ route('contacts.index') }}"
                                                    class="btn btn-outline-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
