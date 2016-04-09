
{{-- 
*
*   This generic view can display as a table, the application data
*   
*   You need to pass the following data:
*
*   $data - Associative container with table header names as keys, and rows as values
*   $entityName - The name of a single entity displayed
*   $perPage - The number of rows showed on current page
*   $page - The current page
*   $dataCount - The number of total existing records
*   $actions - A array with the actions the admin can perform on each records
*   $locale - The locale of the displayed data
*
--}}

@extends('admin.layout')

@section('content')
<div class="container">
@if (count($data) > 0)
    
    <div class="table-responsive" style="margin-top:60px">
        <h3> {{ $entityName }} table </h3>
        
        @if (isset ($locale))
            <h3> Language: {{$locale}} (<a href="{{ $locale == 'en' ? '?lang=ro' : '?lang=en' }}">switch</a>) </h3>
        @endif
        
        <br>
        <h3><a href="{{ Request::URL() }}/add"> Add new </a></h3>
        <h5> Page {{ $page }} </h5>
        <table class="table table-striped table-hover">
            
            <thead>
                @foreach($data[0] as $thead => $value)
                    <th>{{ $thead }}</th>
                @endforeach
                <th>Actions</th>
            </thead>
            
            <tbody>
                @foreach($data as $table_row)
                    <tr>
                        @foreach($table_row as $table_cell)
                            <td>{{ $table_cell }}</td>
                        @endforeach
                        <td>
                            @foreach($actions as $action) 
                                <a href = "{{Request::url()}}/{{$action}}/{{$table_row['id']}}">{{$action}}</a>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        @for($i = 1; $i <= ($dataCount - 1) / $perPage + 1; ++$i)
            <a href="{{ Request::url() }}?perPage={{ $perPage }}&page={{ $i }}">{{ $i }}</a>
        @endfor
    </div>
@else

    <h2 style = "margin-top:120px"> There are no {{ $entityName }} </h2>
    <h2 style = "margin-top:30px"> Why don't you <a href = "{{Request::url()}}/add">add</a> some?
    
@endif
</div>
@endsection