@php
    $can['workRequests'] = $auth->can(['create','update','delete'], Belt\Workflow\WorkRequest::class);
@endphp

@if($can['workRequests'])
    <li id="core-admin-sidebar-left-work-requests"><a href="/admin/belt/core/work-requests?is_open=1"><i class="fa fa-tasks"></i> <span>Work Requests</span></a></li>
@endif