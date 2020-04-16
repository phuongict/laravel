<template>

</template>

<script>
    export default {
        name: "index",
        data() {
            return {
                item: {}
            };
        },
        methods: {
            changeStatus(id, event){
                this.sendRequest(`/admincp/order/change-status/${id}`, {
                    status: event.target.value
                });
            },
            sendRequest(url, params, type = null){
                axios.patch(url, params)
                    .then(response => {
                        toastr.success(response.data.success);
                    })
                    .catch(error => {
                        let errors = '';
                        if (typeof error.response.data === 'object') {
                            errors = _.flatten(_.toArray(error.response.data.errors)).join(', ');
                        } else {
                            errors = 'Something went wrong. Please try again.';
                        }
                        toastr.error(errors);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
