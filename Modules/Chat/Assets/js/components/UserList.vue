<template>
    <ul class="user-list columns">
        <li class="left clearfix column" v-for="user in users[0]">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font" style="font-size: 12px">
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
