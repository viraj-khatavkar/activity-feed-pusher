<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tasks</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" placeholder="Task title" v-model="title" autocomplete="off" @keyup.enter="add()"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-for="task in tasks">
            <task :task="task" :user="user"></task>
        </div >
            
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                title: '',
                tasks: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
            
        },
        created() {
            this.taskList();
        },
        methods: {
            add() {
                var self = this;
                axios.post('/api/tasks/store?api_token=' + this.user.api_token, {
                    title: this.title
                }).
                then(function(task) {
                    console.log(task);
                    self.tasks.push(task.data);
                });
            },
            taskList() {
                var self = this;
                axios.get('/api/tasks?api_token=' + this.user.api_token, {})
                .then(function(response) {
                    self.tasks = response.data;
                });
            },
            delete(id) {
                console.log(id);
                var self = this;
                axios.post('/api/tasks/delete?api_token=' + this.user.api_token, {
                    id: id
                }).
                then(function(task) {
                    console.log(task);
                });
            }
        }
    }
</script>
