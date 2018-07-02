@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.product.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'Tên sản phẩm', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('link', 'Link sản phẩm', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('link', old('link'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('image', 'Ảnh sản phẩm', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('image') !!}
        {!! Form::hidden('image_w', 4096) !!}
        {!! Form::hidden('image_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('active', 'Trạng thái', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('active','') !!}
        {!! Form::checkbox('active', 1, true) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('priority', 'Độ ưu tiên', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('priority', old('priority'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('is_feature', 'Có đại diện không', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('is_feature','') !!}
        {!! Form::checkbox('is_feature', 1, false) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection