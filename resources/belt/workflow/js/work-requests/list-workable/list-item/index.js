import shared from 'belt/workflow/js/work-requests/list-workable/list-item/shared';
import actionItem from 'belt/workflow/js/work-requests/list-workable/list-item/action';
import html from 'belt/workflow/js/work-requests/list-workable/list-item/template.html';

export default {
    mixins: [shared],
    props: {
        work_request_id: null,
        work_request_data: {},
    },
    mounted() {
        if (this.work_request_data) {
            this.workRequest.setData(this.work_request_data);
        } else {
            this.workRequest.show(this.work_request_id);
        }
    },
    components: {
        actionItem,
    },
    template: html,
}