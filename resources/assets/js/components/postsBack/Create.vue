<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Criar Post</legend>

            <crud-post :post="post"></crud-post>

            <div class="text-center mrg-top-1em">
                <router-link class="btn waves-effect waves-light" to="/post">Sobre</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                url: '/api/post',
                post: {
                    title: '',
                    body: '',
                }
            }
        },
        events: {
            'submitted'(post){
                this.teste(post);
            }
        },
        methods: {
            teste(formData){
                this.$http.post(this.url,formData)
                    .then(response => {
                        console.log("Criado com sucesso!")
                        this.resetForm();
                    }).catch(response => {
                    let errors = response.body;
                    this.$broadcast('formErrors', errors);
                });
            }
        },
        resetForm(){
            this.post = {
                title: '',
                body: '',
            }
        }
    }
</script>

<style>
</style>