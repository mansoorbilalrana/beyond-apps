<template>
    <div>
        <h3 class="text-center">Edit Item</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateItem">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required  v-model="item.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" required v-model="item.description">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Item</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                item: {}
            }
        },
        created() {
            this.axios
                .get(`/api/lists/${this.$route.params.id}`)
                .then((response) => {
                    this.item = response.data;
                });
        },
        methods: {
            updateItem() {
                this.axios
                    .put(`/api/lists/${this.$route.params.id}`, this.item)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
