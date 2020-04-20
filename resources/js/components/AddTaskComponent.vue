<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
        Ajouter une tâche
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une tâche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Nom de la tâche</label>
                        <textarea name="name" id="name" rows="4" class="form-control" 
                        v-model="name"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" @click="taskStore">Créer ma tâche</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                name: ''
            }
        },

        methods: {
            taskStore() {
                axios.post('/tasks', {
                    name: this.name
                })
                     .then(response => this.$emit('task-added', response))
                     .catch(error => console.log(error));
            }
        }
    }
</script>