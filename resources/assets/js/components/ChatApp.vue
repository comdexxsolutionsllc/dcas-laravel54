<template>
    <div id="chatApp" @chat-loaded="getAuth">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>
                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form @messagesent="addMessage" :user="auth"></chat-form>
                    </div>
                    <div class="panel-footer">
                        <user-list :users="users"></user-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import ChatForm from './ChatForm.vue'
    import ChatMessages from './ChatMessages.vue'
    import UserList from './UserList.vue'

    export default {
        components: {
            ChatMessages,
            ChatForm,
            UserList
        },

        mounted() {
            this.auth = this.getAuth();
        },

        data() {
            return {
                auth: '',
                messages: [],
                users: []
            }
        },

        methods: {
            getAuth() {
                window.axios.post('/chat/auth').then(response => {
                    this.auth = response.data;
                }).catch(function (error) {
                    console.log('/chat/auth event: ' + error);
                });
            },

            fetchMessages() {
                window.axios.get('/chat/messages').then(response => {
                    this.messages = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            addMessage(message) {
                this.messages.push(message);

                window.axios.post('/chat/messages', message).then(response => {
                }).catch(function (error) {
                    console.log(error);
                });
            },

            fetchUsers() {
                window.axios.get('/chat/users').then(response => {
                    this.users = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>