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
                this.sendRequest(`/admincp/product/change-status/${id}`, {
                    status: event.target.value
                });
            },
            changeFeature(item) {
                this.item = JSON.parse(item);
                this.sendRequest(`/admincp/product/change-feature/${this.item.id}`, {
                    featured: this.item.featured
                }, 1);
            },
            sendRequest(url, params, type = null){
                axios.patch(url, params)
                    .then(response => {
                        swal.fire(
                            'Success!',
                            response.data.success,
                            'success'
                        ).then(() => {
                            if(type != null)
                                window.location.reload();
                        });
                    })
                    .catch(error => {
                        let errors = '';
                        if (typeof error.response.data === 'object') {
                            errors = _.flatten(_.toArray(error.response.data.errors)).join(', ');
                        } else {
                            errors = 'Something went wrong. Please try again.';
                        }
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: errors
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>
