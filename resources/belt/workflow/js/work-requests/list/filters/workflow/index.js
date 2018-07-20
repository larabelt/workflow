import filter from 'belt/core/js/filters/base';
import Table from 'belt/workflow/js/work-requests/table';
import html from 'belt/workflow/js/work-requests/list/filters/workflow/template.html';

export default {
    mixins: [filter],
    props: {},
    data() {
        return {
            groupedItems: new Table(),
            subtype: null,
        }
    },
    computed: {
        options() {
            let options = {
                '': '',
            };
            let items = _.uniqBy(this.groupedItems.items, 'subtype');
            items = _.sortBy(items, [function (o) {
                return o.subtype ? o.subtype : 1;
            }]);
            _.forEach(items, (item) => {
                options[item.subtype] = item.workflow.name;
            });
            return options;
        },
        show() {
            return _.size(this.options) > 2;
        }
    },
    mounted() {
        this.table.updateQueryFromRouter();
        this.groupedItems.updateQuery({
            groupBy: 'work_requests.subtype',
        });
        this.subtype = this.table.query.subtype;
        this.groupedItems.index();
    },
    watch: {
        'table.query.subtype': function (subtype) {
            if (subtype) {
                this.subtype = subtype;
            }
        }
    },
    methods: {
        change() {
            delete this.table.query.subtype;
            if (this.subtype) {
                this.table.updateQuery({subtype: this.subtype});
            }
            this.$emit('filter-workflow-update');
        },
    },
    template: html
}