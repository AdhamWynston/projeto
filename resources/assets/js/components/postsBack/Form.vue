<template>
    <div>
    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#createPost"><i class="material-icons">add</i></a>

    <!-- Modal Structure -->
    <div id="createPost" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <div class="row">
                <form class="col s12" method="POST" v-on:submit.prevent="createPost" novalidate v-cloak>
                    <div class="row">
                        <label>Title:</label>
                        <input
                                v-model="newPost.title"
                                type="text"
                                class="form-control"
                                id="title"
                                placeholder="Title...">
                        <span v-for="error in errors" class="text-danger"></span>
                    </div>
                    <div class="row">
                        <label>Body:</label>
                        <textarea
                                v-model="newPost.body"
                                type="text"
                                class="form-control"
                                id="body"
                                placeholder="Body..."
                        ></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-action waves-effect waves-green btn-flat">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                url: '/api/post',
                errors: [],
                newPost: {'title':'', 'body':''},
            }
        },
        components: {
        },
        props: {
        },
        methods: {
            createPost: function(){
                var url = '/api/post'
                var input = this.newPost
                axios.post(url,input).then(response => {
                    this.newPost = ''
                    this.errors = [];
                    $('#createPost').modal('close');
                    toastr.success('Criado com sucesso!')
                console.log("Criado com sucesso!")
                }).catch(error => {
                    if (error.response.status = 422) {
                        this.errors = error.response.data;
                        console.log(this.errors);
                    }
                });
            }
        },
    }
</script>

<style>
</style>