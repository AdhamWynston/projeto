<template>
    <form class="col s12" method="POST" v-on:submit.prevent="submit" novalidate v-cloak>
        <div class="row">
            <div
                    class="input-field col s6"
                    :class="{ 'has-error': errors['title'] }">

                <input
                        v-model="post.title"
                        id="title"
                        type="text"
                        class="validate">
                <label for="title">Title</label>
            </div>
            <div
                    class="input-field col s12"
                    :class="{ 'has-error': errors['body'] }">
                <textarea
                        id="textarea1"
                        class="materialize-textarea"
                        v-model="post.body"></textarea>
                <label for="textarea1">Body</label>
                <span class="help-block" v-for="error of errors['body']">
                        {{ error }}
                    </span>
            </div>
        </div>
        <div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                required: true
            },
        },
        created(){

        },
        data(){
            return {
                errors: {}
            }
        },
        methods: {
            submit(){
                let formData = new FormData();
                formData.set('title', this.post.title);
                formData.set('body', this.post.body);

                this.$dispatch('submitted', formData);

            }
        },
        events: {
            'formErrors'(errors){
                this.errors = errors;
            }
        }
    }
</script>

<style>
</style>