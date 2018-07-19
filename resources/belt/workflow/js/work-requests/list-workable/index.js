import Table from 'belt/workflow/js/work-requests/table';
import listItem from 'belt/workflow/js/work-requests/list-workable/list-item';
import html from 'belt/workflow/js/work-requests/list-workable/template.html';

export default {
    props: {
        entity_id: {
            default: function () {
                return this.$parent.entity_id;
            }
        },
        entity_type: {
            default: function () {
                return this.$parent.entity_type;
            }
        },
    },
    data() {
        return {
            table: new Table({router: this.$router}),
        }
    },
    computed: {
        allowed() {
            if (!this.entity_id || !this.entity_type) {
                return false;
            }
            return true;
        },
        isSuper() {
            return _.get(window, 'larabelt.auth.super');
        },
        show() {
            return this.table.items.length;
        },
    },
    mounted() {
        if (this.allowed) {
            this.table.updateQuery({
                is_open: true,
                workable_id: this.entity_id,
                workable_type: this.entity_type,
            });
            this.table.index();
        }
    },
    components: {
        listItem,
    },
    template: html,
}