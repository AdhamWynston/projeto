<template>

    <div>
        <div>
            <a class="fixo button is-large is-danger is-loading" v-show="loading">Loading</a>
        </div>
        <div class="container">
            <h1 class="title">{{title}}</h1>
            <div class="row">
                <div class="input-field">
                    <div class="col s6">
                        <input type="text" class="input is-expanded" placeholder="Procure pelo título" v-model="search">
                    </div>
                    <div class="col s3">
                        <a class="btn blue" @click="searchBreweries">Search</a>
                    </div>
                </div>
            </div>
            <div class="row col s5">

            </div>
        </div>
        <div class="row centered">
            <div class="col s10">
                <table class="highlight responsive-table">
                    <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Mais</th>
                    <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="post in posts">
                        <td>{{post.id}}</td>
                        <td>{{post.title}}</td>
                        <td>{{post.body}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'app',

    }
</script>

<style>
    .fixo{float: right; margin-right: 10px; margin-top: 0px; z-index: 1000;}
</style>