import Form from 'belt/workflow/js/work-requests/form';
import Table from 'belt/workflow/js/work-requests/table';
import datetime from 'belt/core/js/mixins/datetime';
import html from 'belt/workflow/js/work-requests/edit/template.html';

export default {
    mixins: [datetime],
    data() {
        return {
            form: new Form({router: this.$router}),
            table: new Table({router: this.$router}),
        }
    },
    mounted() {
        this.table.updateQueryFromRouter();
        this.table.index();
    },
    template: html,
}