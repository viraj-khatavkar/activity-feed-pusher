<template>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Task List</div> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ task.title }}
                                </div>
                            </div>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                    <input type="text" class="form-control" v-model="comment" placeholder="Write a comment..."
                                        @keyup.enter="submit"
                                    >
                            </li>
                            <li class="list-group-item" v-for="comment in comments">
                                {{ comment.body }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['user', 'task'],
        data() {
            return {
                comment: '',
                comments: this.task.comments
            }
        },
        mounted() {
            
        },
        created() {
            
        },
        methods: {
            submit() {
                axios.post('/api/tasks/'+ this.task.id +'/comments/store?api_token=' + this.user.api_token, {
                    comment: this.comment
                }).
                then((comment) => {
                    console.log(comment);
                    this.comments.push(comment.data);
                    this.comment = '';
                });
            }
        }
    }
</script>
