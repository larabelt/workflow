import Form from 'belt/workflow/js/work-requests/form';

export default {
    namespaced: true,
    state () {
        return {
            form: new Form(),
        }
    },
    mutations: {
        form: (state, form) => state.form = form,
    },
    actions: {
        load: ({commit, dispatch, state}, workRequestID) => {
            return new Promise((resolve, reject) => {
                state.form.show(workRequestID)
                    .then(response => {
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    })
            });
        },
        form: (context, form) => context.commit('form', form),
    },
    getters: {
        form: state => state.form,
    }
};