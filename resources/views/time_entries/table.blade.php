<table class="table table-responsive" id="timeEntries-table">
    <thead>
        <th>Body</th>
        <th>Project Id</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($timeEntries as $timeEntry)
        <tr>
            <td>{!! $timeEntry->body !!}</td>
            <td>{!! $timeEntry->project_id !!}</td>
            <td>{!! $timeEntry->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['timeEntries.destroy', $timeEntry->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('timeEntries.show', [$timeEntry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('timeEntries.edit', [$timeEntry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>