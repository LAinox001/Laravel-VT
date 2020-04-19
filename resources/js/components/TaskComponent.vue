<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><a href="127.0.0.1:8000/login">Login</a></li>
                    <li class="list-group-item"><a href="127.0.0.1:8000/register">Register</a></li>
                    <li class="list-group-item"><a href="127.0.0.1:8000/posts">Nos Articles</a></li>
                    <li class="list-group-item"><a href="127.0.0.1:8000/posts/create">Créer un article</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
