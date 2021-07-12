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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Skills') }}</div>

                <div class="card-body">
                    <table class="row justify-content-center">
                        <tr>
                            <th>ID</th>
                            <th class="even">Name</th>
                            <th>Percentage of Knowledge</th>
                            <th class="even">Logo</th>
                        </tr>
                        @forelse($data as $key => $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td class="even">{{ $d->skill_name }}</td>
                            <td>{{ $d->percent }}</td>
                            <td class="even">{{ $d->logo }}</td>
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
                        <input type="text" name="skill_name" placeholder="Name"/>
                        <input type="text" name="percent" placeholder="Percentage"/>
                        <input type="file" name="logo" />
                        <button type="submit" class="submit">Create</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
