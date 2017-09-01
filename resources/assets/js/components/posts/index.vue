<template>
    <table class="highlight bordered">
        <thead>
        <tr>
            <th>title</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="i in 10">
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, at?</td>
            <td><a href="#" class="tooltipped waves-circle waves-light btn-floating blue" data-tooltip="Visualizar cliente" data-position="top" data-delay="50"></a></td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: 'posts-index',
        data (){
         return {

         };
        }
    };
</script>

<style lang="css" scoped>
</style>