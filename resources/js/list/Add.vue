<template>
    <div>
        <h3 class="text-center">Add Item</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addItem">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" required class="form-control" v-model="item.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" required class="form-control" v-model="item.description">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add Item</button>
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
        methods: {
            addItem() {
                this.axios
                    .post('/api/lists', this.item)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
