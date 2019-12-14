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
                const what =  await Swal.fire({
                    title: 'Are you sure?',
                    // text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, do it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                });
                if (what.value) {
                    axios.patch(`/admincp/user/block-user/${this.item.id}`, {
                        status: this.item.blocked
                    })
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
                        })
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
