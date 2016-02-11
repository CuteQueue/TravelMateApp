@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">

            @if ($errors->any())
                <ul class = "alert-danger">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif

           <!-- {!! Form::open(['url' => 'profil/edit/'. Auth::user()->id]) !!} -->
           {!! Form::model($profil, array('url' => array('profil/edit'))) !!}

            <h2 class="form-signup-heading">Edit Profil</h2>

                <!--Body Form Input-->
                <div class = "form-group">
                    {!! Form::label('location', 'Location') !!}
                    {!! Form::text('location', null, array('class'=>'form-control', 'placeholder'=>'Location')) !!}
                </div>
                <div class = "form-group">
                    {!! Form::label('age', 'Date of Birth') !!}
                    <div class="input-group date datetimepicker"  data-date-format="YYYY-MM-DD">
                    {!! Form::text('age', null, array('class'=>'form-control', 'placeholder'=>'Date of Birth')) !!}          
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <div class = "form-group">
                    {!! Form::label('hobbies', 'Hobbies') !!}
                    {!! Form::text('hobbies', null, array('class'=>'form-control', 'placeholder'=>'Hobbies')) !!}
                </div>
                <div class = "form-group">
                    {!! Form::label('about', 'About Me') !!}
                    {!! Form::textarea('about', null, array('class'=>'form-control', 'placeholder'=>'About Me')) !!}
                </div>

                <!--Update Profil-->
                <div class = "form-group">
                    </br>
                    {!! Form::submit('Save', ['class'=>'btn btn-primary form-control'])!!}
                </div>
            {!! Form::close() !!}

            
    </div>
</div>
@endsection