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
            async changeStatus(item) {
                this.item = JSON.parse(item);

                this.sendRequest(`/admincp/slide/change-status/${this.item.id}`, {
                    status: this.item.status
                });
            },
            sendRequest(url, params){
                axios.patch(url, params)
                    .then(response => {
                        swal.fire(
                            'Success!',
                            response.data.success,
                            'success'
                        ).then(() => {
                            window.location.reload();
                        })
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
