@extends('layouts.main')
@section('title', 'All Contacts')

@auth
    @section('content')
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-title">
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0">All Contacts</h2>
                                    <div class="ml-auto">
                                        <a href="{{ route('contacts.create') }}" class="btn btn-success"><i
                                                class="fa fa-plus-circle"></i> Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <form>
                                            <div class="row">
                                                <div class="col">
                                                    <select id="filter_company_id" name="company_id" class="custom-select">

                                                        @foreach ($companies as $id => $name)
                                                            <option {{ $id == request('company_id') ? 'selected' : '' }}
                                                                value="{{ $id }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    @if ($message = session('message'))
                                        <div class="alert alert-success">{{ $message }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($contacts as $index => $contact)
                                            <tr>
                                                <th scope="row">{{ $index + $contacts->firstitem() }}</th>
                                                <td>{{ $contact->first_name }}</td>
                                                <td>{{ $contact->last_name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->company->name }}</td>
                                                <td width="150">
                                                    <a href="{{ route('contacts.byid', $contact->id) }}"
                                                        class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                                        class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="{{ route('contacts.destroy', $contact->id) }}"
                                                        class="btn-delete btn btn-sm btn-circle btn-outline-danger"
                                                        title="Delete"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <form id="form-delete" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </tbody>
                                </table>

                                {{ $contacts->appends(request()->only('company_id'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
@endauth

@guest
    @section('content')
        <div style="text-align:center" class="card container">
            <h1 style=" color: rgb( 115, 115, 226)">WELCOME</h1>
            <h2>Login or Register to start</h2>
        </div>
    @endsection
@endguest
