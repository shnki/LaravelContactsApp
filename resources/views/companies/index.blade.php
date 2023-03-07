@extends('layouts.main')
@section('title', 'Companies')
@auth
    @section('content')
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-title">
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0">Companies</h2>
                                    <div class="ml-auto">
                                        <a href="{{ route('companies.create') }}" class="btn btn-success"><i
                                                class="fa fa-plus-circle"></i> Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <select style="display: none" id="filter_company_id" name="company_id" class="custom-select">

                                        <option> </option>
                                </select>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <form>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <input name="search" id="search" value="{{ request('search') }}"
                                                            type="text" class="form-control" placeholder="Search..."
                                                            aria-label="Search..." aria-describedby="button-addon2" />
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" id="btn-clear"
                                                                type="button">
                                                                <i class="fa fa-refresh"></i>
                                                            </button>
                                                            <button class="btn btn-outline-secondary" type="submit"
                                                                id="button-addon2">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    @if ($message = session('message'))
                                        <div class="alert alert-success">{{ $message }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($companies as $index => $company)
                                            <tr>

                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->address }}</td>
                                                <td>{{ $company->email }}</td>
                                                <td>{{ $company->website }}</td>
                                                <td width="150">
                                                    <a href="{{route('company.view',$company->id)}}" class="btn btn-sm btn-circle btn-outline-info"
                                                        title="Show"><i class="fa fa-eye"></i></a>

                                                    <a href="#" class="btn btn-sm btn-circle btn-outline-secondary"
                                                        title="Edit"><i class="fa fa-edit"></i></a>

                                                        <a href="{{ route('company.destroy', $company->id) }}"
                                                            class="btn-delete btn btn-sm btn-circle btn-outline-danger"
                                                            title="Delete"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <form id="form-delete" method="POST" style="display: none">
                                                @method('DELETE')

                                                @csrf
                                            </form>
    

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
                {{ $companies->appends(request()->only('id'))->links() }}

            </div>
        </main>
    @endsection

@endauth
