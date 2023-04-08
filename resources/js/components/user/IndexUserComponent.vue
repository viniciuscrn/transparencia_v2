<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th><i class="fas fa-user-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users: []
        }

    },
    mounted() {
        this.getUsers()
    },
    methods: {
        async getUsers() {
            fetch('/api/user')
                .then(response => {
                    return response.json()
                })
                .then(response => {
                    this.users = response
                })
        }
    }
}
</script>
