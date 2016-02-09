@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Edit Profil</h4></div>
                <div class="panel-body"> 
                    {!! Form::label('title', 'Location') !!}
                    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Location')) !!}
                    </br>
                    {!! Form::label('title', 'Date of Birth') !!}
                    <div class="input-group date datetimepicker"  data-date-format="YYYY-MM-DD">
                    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Date of Birth')) !!}          
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    </br>
                    {!! Form::label('title', 'Hobbies') !!}
                    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Hobbies')) !!}
                    </br>
                    {!! Form::label('title', 'About Me') !!}
                    {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'About Me')) !!}

                    </br>
                    {!! Form::submit('Save', array('class'=>'btn btn-default btn-large'))!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection