@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$profil->user->name}} </div>
                <div class="panel-body"> <a id = "edit" href="{{ URL::to('editProfil/' . Auth::user()->id) }}" class="btn btn-default btn-sm glyphicon glyphicon-pencil"></a>
                    
                    <p>Alter: {{$profil->age}} </p>  
                    <p>Hobbies: {{$profil->hobbies}}</p>
                    <p>About Me: {{$profil->about}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
