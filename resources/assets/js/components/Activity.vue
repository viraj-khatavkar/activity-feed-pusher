<template>
    <div class="container">
        <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Activity Dashboard</div>

        <ul class="list-group">
            <li class="list-group-item" v-for="item in feed">
                {{ item.description }}  
                <span class="pull-right">{{ item.lapse }}</span>
            </li>
        </ul>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                feed: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
            
        },
        created() {
            this.getFeed();
            this.listenForActivity();
        },
        methods: {
            getFeed() {
                var self = this;
                return axios.get('/api/activities?api_token=' + this.user.api_token, {})
                .then(function(response) {
                    self.feed = response.data.data;
                });
            },
            listenForActivity() {
                Echo.private('activity.' + this.user.id)
                    .listen('ActivityLogged', (e) => {
                        console.log(e.data.description);
                        this.feed.unshift(e.data);
                    });
            }
        }
    }
</script>
