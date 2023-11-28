<template>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-blod text-primary">Roles</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Usuarios</th>
                            <th># de usuarios</th>
                            <th># de permisos</th>,
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in rolestable" :key="role.id">
                            <td>{{ role.id }}</td> 
                            <td>{{ role.name }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-blod text-primary">Agregar Rol</h6>
            </div>
            <div class="card-body">
                <input type="text" name="name" v-model="name">
                <button type="button" @click="addelement"> Agregar</button>
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
            roles: {
                type: [Object, Array],
                required: true
            }
        },
        data() {
            return{
                name : '',
                rolestable : this.roles
            }
        },
        methods : {
            addelement() {
                let next_el = this.rolestable.length + 1;

                var formdata = new FormData();
                formdata.append('name', this.name)

                //Libreria para hacer llamadas Async
                axios.post('crear-rol', formdata)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });

                this.rolestable.push({id: next_el, name: this.name});
            }
        }
    };
</script>