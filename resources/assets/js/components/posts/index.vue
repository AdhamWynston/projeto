<template>
    <div>
    Email: {{ email }}
    </div>
</template>

<script>
    export default {
    computed: {
        user (){
            const { name, email} = this.$store.state.user
            return `O usuario logado é ${name} e possui o email ${email}.`
        }
    }
    };
</script>

<style lang="css" scoped>
</style>