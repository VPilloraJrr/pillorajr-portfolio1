@extends('layouts.app')
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
            <a class="list-group-item list-group-item-action list-group-item-light p-3" id="active" href="/dashboard/education">Education</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/experience">Experience</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/portfolio">Portfolio</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/contact">Contact</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('EDUCATION') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table>
                        <tr>
                            <th>ID</th>
                            <th class="even">School Name</th>
                            <th>Year Started</th>
                            <th class="even">Year Graduated</th>
                            <th>School Logo</th>
                            <th class="even">Actions</th>
                        </tr>
                        @forelse($data as $key => $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td class="even">{{ $d->school_name }}</td>
                            <td>{{ $d->year_started }}</td>
                            <td class="even">{{ $d->year_graduated }}</td>
                            @if($d->logo)
                                <td >
                                    <img src = "{{ asset('/storage/images/'.$d->logo )}}" alt="logo" class="logo">
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td class="even actions">
                                <a class="btn btn-outline-primary" href='education/edit/{{ $d->id }}'>Edit</a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href='education/delete/{{ $d->id }}'><i class="fa fa-trash"></i></a>
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
                    <form method="post" action="/dashboard/education" enctype="multipart/form-data">
                        @csrf
                        <table class="create">
                            <tr>
                                <td>
                                    <div {{ $errors->has('school_name') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('school_name') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('year_started') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('year_started') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('year_graduated') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('year_graduated') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div {{ $errors->has('logo') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('logo') }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="school_name" placeholder="Name"/></td>
                                <td><input type="text" name="year_started" placeholder="Year Started"/></td>
                                <td><input type="text" name="year_graduated" placeholder="Year Graduated"/></td>
                                <td><input type="file" name="logo" /></td>
                            </tr>
                        </table>
                        <button type="submit" class="submit btn btn-outline-secondary">Create</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
