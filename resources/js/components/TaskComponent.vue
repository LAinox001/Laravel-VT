<template>
    <div class="container" v-if="show==true">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <add-task @task-added="refresh"></add-task>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center" v-for="task in tasks.data" :key="task.id"><a href="#">{{ task.name }}</a>
                            <!-- Button trigger modal -->
                            <div>
                                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#editModal"
                                @click="getTask(task.id)">
                                Editer la tâche
                                </button>
                                <button type="button" class="btn btn-danger" @click="deleteTask(task.id)">Supprimer</button>
                            </div>
                    </li>
                    <edit-task v-bind:taskToEdit="taskToEdit" @task-updated="refresh"></edit-task>
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
                tasks: {},
                taskToEdit: '',
                show: true
            }
        },

        mounted() {
            console.log('TaskComponent mounted.');
            this.checkUrl();
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

            refresh(tasks){
                this.tasks = tasks.data;
            },

            getTask(id) {
                axios.get('/tasks/edit/' + id)
                     .then(response => this.taskToEdit = response.data)
                     .catch(error => console.log(error));
            },

            deleteTask(id){
                axios.delete('/tasks/' + id)
                     .then(response => this.tasks = response.data)
                     .catch(error => console.log(error));
            },

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
</script>
