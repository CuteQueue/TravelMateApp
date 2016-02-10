@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$profil->user->name}} </div>
                <div class="panel-body"> <a id = "edit" href="{{ URL::to('profil/edit/' . Auth::user()->id) }}" class="btn btn-default btn-sm glyphicon glyphicon-pencil"></a>
                    <p>Location: {{$profil->location}}
                    <p>Age: {{$profil->age}} </p>  
                    <p>Hobbies: {{$profil->hobbies}}</p>
                    <p>About Me: {{$profil->about}}</p>

                    <a href="{{ URL::to('profil/delete/' . Auth::user()->id) }}" class="btn btn-default btn-sm glyphicon glyphicon-trash"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
