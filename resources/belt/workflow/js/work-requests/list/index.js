import Table from 'belt/workflow/js/work-requests/table';
import filterSearch from 'belt/core/js/inputs/filter-search';
import filterIsOpen from 'belt/workflow/js/work-requests/list/filters/is_open';
import filterType from 'belt/workflow/js/work-requests/list/filters/type';
import filterWorkflow from 'belt/workflow/js/work-requests/list/filters/workflow';
import listItem from 'belt/workflow/js/work-requests/list/list-item';
import html from 'belt/workflow/js/work-requests/list/template.html';

export default {

    components: {
        index: {
            data() {
                return {
                    table: new Table({router: this.$router}),
                }
            },
            mounted() {
                this.table.updateQueryFromRouter();
                this.table.index();
            },
            methods: {
                filter: _.debounce(function (query) {
                    if (query) {
                        query.page = 1;
                        this.table.updateQuery(query);
                    }

                    this.table.index()
                        .then(() => {
                            this.table.pushQueryToHistory();
                            this.table.pushQueryToRouter();
                        });
                }, 300),
            },
            components: {
                filterSearch,
                filterIsOpen,
                filterType,
                filterWorkflow,
                listItem,
            },
            template: html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Work Request Manager</span>
                <li><router-link :to="{ name: 'work-requests' }">Work Request Manager</router-link></li>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}