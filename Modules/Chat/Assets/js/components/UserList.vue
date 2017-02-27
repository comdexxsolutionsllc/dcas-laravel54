<template>
    <ul class="user-list">
        <li class="left clearfix" v-for="user in users[0]">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ user.name }}
                    </strong>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['users'],
        created() {
            return this.users;
        },
        watch: {
            users: {
                handler: function (val, oldVal) {
                    return this.users;
                },
                deep: true
            }
        },
    }
</script>
