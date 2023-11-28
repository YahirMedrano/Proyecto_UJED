<template>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-blod text-primary">Usuarios</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in userstable" :key="user.id">
                            <td>{{ user.id }}</td> 
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.role.name }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</template>

<script> 
    export default {
        props: {
            title: {
                type: String,
                required: true
            },
            body: {
                type: String,
                required: true
            },
            users: {
                type: [Object, Array],
                required: true
            }
        },
        data() {
            return{
                name : '',
                userstable : this.users
            }
        }
    };
</script>