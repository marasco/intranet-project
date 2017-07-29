@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Time Entry
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($timeEntry, ['route' => ['timeEntries.update', $timeEntry->id], 'method' => 'patch']) !!}

                        @include('time_entries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection