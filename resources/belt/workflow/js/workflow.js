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

            const app = new Vue({router, store}).$mount('#belt-workflow');
        }

        if ($('#belt-work-requests-alerts').length > 0) {
            Vue.component('work-requests-alerts', workRequestAlerts);
            new Vue({store, el: '#belt-app-pre-main'});
        }

    }

}