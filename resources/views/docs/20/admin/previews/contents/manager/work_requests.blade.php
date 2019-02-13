<section>
    <div class="row">
        <div class="col-lg-12">
            <div id="belt-app-pre-main">
                <div id="belt-work-requests-alerts"><!----></div>
            </div>

            <div id="belt-workflow">
                <div>
                    <div>
                        <section class="content-header">
                            <ol class="breadcrumb">
                                <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li><a href="/admin/belt/workflow/work-requests" class="router-link-active">Work Request Manager</a></li>
                            </ol>
                            <h1><span>Work Request Manager</span>
                                <small></small>
                            </h1>
                        </section>
                    </div>
                    <section class="content">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="filter-set clearfix">
                                    <div class="pull-left"><span><div class="form-group filter pull-left"><label>Filter <!----></label> <div class="form-group"><div class="input-group"><input placeholder="filter" class="form-control"> <!----></div></div></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter"><div class="form-group"><label>Is Open</label> <select title="item is_open" class="form-control"><option value=""></option><option value="1">Yes</option><option value="0">No</option></select></div></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter"><div class="form-group"><label>Workflow</label> <select title="item subtype" class="form-control"><option value=""></option><option value="event-approval">Event Approval</option><option value="place-approval">Place Approval</option><option
                                                                value="team-approval">Team Approval</option></select></div></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter"><div class="form-group"><label>Item Type</label> <select title="item workable_type" class="form-control"><option value=""></option><option value="events">events</option><option value="places">places</option><option value="teams">teams</option></select></div></div></span></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by work_requests.id"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>Is Open</th>
                                            <th>Workflow</th>
                                            <th>Primary Item</th>
                                            <th>Status</th>
                                            <th>Created <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by work_requests.created_at"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>Updated <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by work_requests.updated_at"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>121</td>
                                            <td class="text-center"><i class="fa fa-check-square"></i></td>
                                            <td>Place Approval</td>
                                            <td><a href="/admin/belt/spot/places/edit/338">Pier 22 Restaurant Patio Catering</a></td>
                                            <td>review</td>
                                            <td>11/30/2018 12:42 PM</td>
                                            <td>11/30/2018 12:42 PM</td>
                                            <td class="text-right"><span><div class="btn-group"><button class="btn btn-primary btn-xs" type="button"><span>publish</span></button><button type="button" class="btn btn-primary btn-xs"><span>reject</span></button></div></span></td>
                                        </tr>
                                        <tr>
                                            <td>124</td>
                                            <td class="text-center"><i class="fa fa-check-square"></i></td>
                                            <td>Event Approval</td>
                                            <td><a href="/admin/belt/spot/events/edit/1800">TreeUmph! Early Bird Special</a></td>
                                            <td>review</td>
                                            <td>12/06/2018 2:40 PM</td>
                                            <td>12/06/2018 2:40 PM</td>
                                            <td class="text-right"><span><div class="btn-group"><button class="btn btn-primary btn-xs" type="button"><span>publish</span></button><button type="button" class="btn btn-primary btn-xs"><span>reject</span></button></div></span></td>
                                        </tr>
                                        <tr>
                                            <td>125</td>
                                            <td class="text-center"><i class="fa fa-check-square"></i></td>
                                            <td>Place Approval</td>
                                            <td><a href="/admin/belt/spot/places/edit/299">Manatee County Agricultural Museum</a></td>
                                            <td>review</td>
                                            <td>12/12/2018 10:51 AM</td>
                                            <td>12/12/2018 10:51 AM</td>
                                            <td class="text-right"><span><div class="btn-group"><button class="btn btn-primary btn-xs" type="button"><span>publish</span></button><button type="button" class="btn btn-primary btn-xs"><span>reject</span></button></div></span></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Is Open</th>
                                            <th>Workflow</th>
                                            <th>Primary Item</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div><!----></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</section>