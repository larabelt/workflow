import 'belt/workflow/js/bootstrap/inputs';
import 'belt/workflow/js/bootstrap/filters';
import 'belt/workflow/js/bootstrap/functions';
import 'belt/workflow/js/bootstrap/mixins';
import 'belt/workflow/js/bootstrap/tiles';

import workRequestAlerts from 'belt/workflow/js/work-requests/list-workable';
import workRequests from 'belt/workflow/js/work-requests/routes';
import store from 'belt/core/js/store/index';

window.larabelt.workflow = _.get(window, 'larabelt.workflow', {});

export default class BeltWorkflow {

    constructor(components = []) {

        if ($('#belt-workflow').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/belt/workflow',
                routes: []
            });

            router.addRoutes(workRequests);

            new Vue({router, store}).$mount('#belt-workflow');
        }

        if ($('#belt-work-requests-alerts').length > 0) {
            Vue.component('work-requests-alerts', workRequestAlerts);
            new Vue({store, el: '#belt-app-pre-main'});
        }
x
    }

}