@extends('layouts.app')
<title>Skill Management | Edit</title>
<style>
    
    .submit{
        margin-top: 20px;
        padding-left:100px;
        padding-right:100px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    div button {
        margin-left: 10px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Edit Skills</div>
                <div class="card-body">    
                    <form action = "/dashboard/skill/edit/<?php echo $data[0]->id; ?>" method = "post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        
                        <table class="create">
                            <tr>
                                <td>
                                    <span class="text-danger" > {{ $errors->first('skill_name') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Skill Name:</td>
                                <td>
                                    <input type = 'text' name = 'skill_name' value = '<?php echo $data[0]->skill_name; ?>'/> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-danger" > {{ $errors->first('percent') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Percent:</td>
                                <td>
                                    <input type = 'text' name = 'percent' value = '<?php echo $data[0]->percent; ?>'/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <span class="text-danger" > {{ $errors->first('logo') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Logo:</td>
                                @if($data[0]->logo)
                                <td>
                                    <img id="original" src="{{ url('storage/images/'.$data[0]->logo) }}" height="70" width="70">
                                </td> 
                                @endif
                                <td>
                                    <input type = 'file' name = 'logo' id='logo' class='form-control' placeholder='' value='{{ $data[0]->logo }}'/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = '2' align="center">
                                    <input class="submit btn btn-primary" type = 'submit' value = "Update Skill"  />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <br />
        <div>
            <button class="btn btn-secondary" onclick="goBack()">Go Back</button>
        </div>
    </div>
    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@endsection