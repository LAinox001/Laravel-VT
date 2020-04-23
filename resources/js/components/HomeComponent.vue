<template>
    <div class="container" v-if="show==true">
        <h1>Bienvenue sur notre site test de Laravel et Vue.JS {{ show }}</h1>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                show: true
            }
        },

        mounted() {
            console.log('HomeComponent mounted.');
            this.checkUrl();
        },

        methods: {
            checkUrl(){
                var currentUrl = window.location.pathname;
                console.log(currentUrl);
                // var regex = '/[0-9]+/';
                if(currentUrl == '/posts'){
                    this.show = false;
                    console.log(show);
                }
                else{
                    this.show = true;
                    console.log(show);
                }
            }
        },
        
    }

    // || '/posts/edit' . regex
</script>
