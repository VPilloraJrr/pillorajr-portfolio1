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
            <a class="list-group-item list-group-item-action list-group-item-light p-3"  id="top" href="/dashboard/home">Home</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" id="active" href="/dashboard/skill">Skills</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/education">Education</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/experience">Experience</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/portfolio">Portfolio</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/dashboard/contact">Contact</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Skills') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="row justify-content-center">
                        <tr>
                            <th>ID</th>
                            <th class="even">Name</th>
                            <th>Percentage</th>
                            <th class="even">Logo</th>
                            <th>Actions</th>
                        </tr>
                        @forelse($data as $key => $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td class="even">{{ $d->skill_name }}</td>
                            <td>{{ $d->percent }}</td>
                            @if($d->logo)
                            <td class="even">
                                <img src = "{{ asset('/storage/images/'.$d->logo )}}" alt="logo" class="logo">
                            </td>
                            @else
                            <td class="even"></td>
                            @endif
                            
                            <td class="actions">
                                <a class="btn btn-outline-primary" href='skill/edit/{{ $d->id }}'>Edit</a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href='skill/delete/{{ $d->id }}'><i class="fa fa-trash"></i></a>
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
                    <form method="post" action="/dashboard/skill" enctype="multipart/form-data">
                        @csrf
                        <table class="create">
                            <tr>
                                <td>
                                    <div {{ $errors->has('skill_name') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('skill_name') }}</span>
                                    </div> 
                                </td>
                                <td>
                                    <div {{ $errors->has('percent') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('percent') }}</span>
                                    </div> 
                                </td>
                                <td>
                                    <div {{ $errors->has('logo') ? 'has-error' : '' }}>
                                        <span class="text-danger" > {{ $errors->first('logo') }}</span>
                                    </div> 
                                </td>
                                <td></td>   
                            </tr>
                                <td>
                                    <input type="text" name="skill_name" placeholder="Name"/>
                                </td>
                                <td>
                                    <input type="text" name="percent" placeholder="Percentage"/>
                                </td>
                                <td>
                                    <input type="file" name="logo" />
                                </td>
                                <td>
                                    <button type="submit" class="submit btn btn-outline-secondary">Create</button>
                                </td>
                            <tr>

                            </tr>
                        </table>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
