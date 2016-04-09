
{{-- 
*
*   This generic view can modify (edit or add) application data
*
*   You need to pass the following data:
*
*   $metadata - Array with the fields name. Each of array's elements must be a associative container with
*   the following keys:
*       - 'type' - The type of the field which can be {'string', 'text', 'number', 'date', 'time', 'enum', 'image'}
*       - 'label' - The displayed name of the field
*       - 'name' - The input's name
*       - 'value' - (Optional) The value of the input
*   $action - The post action name
*   $entityName - The name of the modified entity
*   $entityId - (Optional) The id of the modified entity. If not defined, a new entity is created
*   $title - The page title
*
--}}

@extends('admin.layout')

@section('content')

<div class="container" style="margin-top:75px; margin-bottom:100px; width:500px">
    
    <h3 style = "margin-bottom: 50px"> {{ $title }} </h3>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form class="form-horiziontal" role="form" method="post" action="{{URL::to('administration-dashboard')}}/{{$entityName}}/modify" enctype="multipart/form-data">
        
        <input type="hidden" name="_token" value= "{{ csrf_token() }}">
        
        @if(isset($values['id']))
            <input type="hidden" name="id" value="{{ $values['id'] }}">
        @endif
        
        @foreach($metadata as $name => $field)
            <div class="form-group">
              <label> {{ $field['label'] }} </label>
                @if ($field['type'] == "text")
                    <textarea class="form-control" name="{{ $name }}">{{ $values[$name] or "" }}</textarea>
                @elseif ($field['type'] == "enum")
                    <select class="form-control" name="{{ $name }}">
                    @foreach ($field['options'] as $id => $option)
                        <option value="{{ $id }}"> {{ $option }} </option>
                    @endforeach
                    </select>
                @elseif($field['type'] == "image")    
                    <input type="file" accept="image/*" class="form-control" name="{{ $name }}" value="{{ $values[$name] or ''}}">
                @else
                    <input type="{{ $field['type'] }}" class="form-control" name="{{ $name }}" value="{{ $values[$name] or "" }}">
                @endif
            </div>
        @endforeach
        <button type="submit" class="btn btn-default">Save</button>
    </form>
    
</div>

@endsection
