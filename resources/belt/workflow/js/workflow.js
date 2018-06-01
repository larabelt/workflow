import workRequests from 'belt/workflow/js/work-requests/routes';
import store from 'belt/core/js/store/index';

window.larabelt.workflow = _.get(window, 'larabelt.workflow', {});

export default class BeltWorkflow {

    constructor(components = []) {
        this.components = [];

        _(components).forEach((value, index) => {
            this.addComponent(value);
        });

        if ($('#belt-workflow').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/belt/workflow',
                routes: []
            });

            router.addRoutes(workRequests);

            const app = new Vue({router, store}).$mount('#belt-workflow');
        }

        let modals = new Vue({
            el: '#vue-modals'
        });
    }

    addComponent(Class) {
        this.components[Class.name] = new Class();
    }
}