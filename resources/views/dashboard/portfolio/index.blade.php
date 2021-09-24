@extends('layouts.app')
<title>Dashboard | Portfolio </title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@section('content')

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
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/experience">Experience</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" id="active" href="/dashboard/portfolio">Portfolio</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/contact">Contact</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('PORTFOLIO') }}</div>

                <div class="card-body">

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                     
                    <table>
                        <tr>
                            <th>ID</th>
                            <th class="even">Project Name</th>
                            <th>Client</th>
                            <th class="even">Description</th>
                            <th>Screenshot</th>
                            <th class="even">Actions</th>
                        </tr>
                        @forelse($data as $key => $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td class="even">{{ $d->project_name }}</td>
                            <td>{{ $d->client }}</td>
                            <td class="even">{{ $d->description }}</td>
                            @if($d->screenshot)
                                <td >
                                    <img src = "{{ asset('/storage/images/'.$d->screenshot )}}" alt="screenshot" class="screenshot">
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td class="even actions">
                                <a class="btn btn-outline-primary" href='portfolio/edit/{{ $d->id }}'>Edit</a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href='portfolio/delete/{{ $d->id }}'><i class="fa fa-trash"></i></a>
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
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">{{ __('Create New Data') }}</div>
                <div class="card-body">
                    <form method="post" action="/dashboard/portfolio" enctype="multipart/form-data">
                        @csrf
                        <table class="create">
                            <tr>
                                <td>
                                    <div {{ $errors->has('project_name') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('project_name') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('client') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('client') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('description') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('description') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('screenshot') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('screenshot') }}</span>
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="text" name="project_name" placeholder="Name"/></td>
                                <td><input type="text" name="client" placeholder="Client"/></td>
                                <td><input type="text" name="description" placeholder="Description"/></td>
                                <td><input type="file" name="screenshot" /></td>
                                
                            </tr>
                        </table>
                        <button type="submit" class="submit btn btn-outline-secondary">Create</button>
                    </form>
                </div>
        </div>
        </div>
    </div>
</div>
@jquery
@toastr_js
@toastr_render
@endsection
