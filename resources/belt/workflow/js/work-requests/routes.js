import list from 'belt/workflow/js/work-requests/list';
// import create from 'belt/workflow/js/work-requests/create';
// import edit  from 'belt/workflow/js/work-requests/edit';

export default [
    {path: '/work-requests', component: list, canReuse: false, name: 'work-requests'},
    // {path: '/work-requests/create', component: create, name: 'work-requests.create'},
    // {path: '/work-requests/edit/:id', component: edit, name: 'work-requests.edit'},
]