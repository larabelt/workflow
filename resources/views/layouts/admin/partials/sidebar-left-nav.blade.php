@php
    $can['workRequests'] = $auth->can(['create','update','delete'], Belt\Workflow\WorkRequest::class);
@endphp

@if($can['workRequests'])
    <li id="workflow-admin-sidebar-left-work-requests"><a href="/admin/belt/workflow/work-requests?is_open=1"><i class="fa fa-tasks"></i> <span>Work Requests</span></a></li>
@endif