<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <add-task @task-added="refresh"></add-task>
                <ul class="list-group">
                    <li class="list-group-item" v-for="task in tasks.data" :key="task.id"><a href="#">{{ task.name }}</a></li>
                </ul>
                <pagination :data="tasks" @pagination-change-page="getResults" class="mt-5"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                tasks: {}
            }
        },

        created(){
            axios.get('/tasks')
                 .then(response => this.tasks = response.data)
                 .catch(error => console.log(error));
        },

        methods: {
            getResults(page=1){
                axios.get('/tasks?page=' + page)
                     .then(response => {
                         this.tasks = response.data;
                     })
            },

            refresh(){
                this.tasks = tasks.data;
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
