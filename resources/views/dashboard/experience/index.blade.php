@extends('layouts.app')
<title>Dashboard | Experience</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@section('content')
@toastr_css
<div class="container">
    <div class="border-end" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <div class="profile">
                @if(Auth::user()->avatar)
                    <p align="center"><img src = "{{ asset('/storage/images/'.Auth::user()->avatar )}}" alt="avatar" class="avatar"></p>
                @else
                    <p align="center"><img src="{{ asset('assets/pics/default.jpg')}}"></p>
                @endif 

                <p align="center">{{ Auth::user()->name }}</p>
            </div>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/home">Home</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/skill">Skills</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/education">Education</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" id="active" href="/dashboard/experience">Experience</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/portfolio">Portfolio</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/contact">Contact</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('EXPERIENCE') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table>
                        <tr>
                            <th>ID</th>
                            <th class="even">Position</th>
                            <th>Description</th>
                            <th class="even">Year Started</th>
                            <th>Year Resigned</th>
                            <th class="even">Actions</th>

                        </tr>
                        @forelse($data as $key => $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td class="even">{{ $d->position_name }}</td>
                            <td>{{ $d->description }}</td>
                            <td class="even">{{ $d->year_started }}</td>
                            <td>{{ $d->year_resigned }}</td>
                            <td class="even actions">
                                <a class="btn btn-outline-primary" href='experience/edit/{{ $d->id }}'>Edit</a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href='experience/delete/{{ $d->id }}'><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> 
                            
                        @empty
                        <tr><td>No record(s) found</td></tr>
                        @endforelse ($data as $key => $d) 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Create New Data') }}</div>
                <div class="card-body">
                    <form method="post" action="/dashboard/experience" enctype="multipart/form-data">
                        @csrf
                        <table class="create">
                            <tr>
                                <td>
                                    <div {{ $errors->has('position_name') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('position_name') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('description') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('description') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('year_started') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('year_started') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('year_resigned') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('year_resigned') }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="position_name" placeholder="Name"/></td>
                                <td><input type="text" name="description" placeholder="Description"/></td>
                                <td> <input type="text" name="year_started" placeholder="Year Started"/></td>
                                <td><input type="text" name="year_resigned" placeholder="Year Resigned"/></td>
                            </tr>
                        </table>
                        <button type="submit" class="submit btn btn-outline-secondary">Create</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@jquery
@toastr_js
@toastr_render
@endsection
