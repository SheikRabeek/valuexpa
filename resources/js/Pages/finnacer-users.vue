<template lang="">
    <div>
        <div class="container pt-5">
            <div class="mt-5 pt-5">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>Admin</td>
                    <td><div class="btn btn-primary" @click="remove(user.id)">Detele</div></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios"
export default {
    data() {
        return {
            user:[]
        }
    },

     mounted() {
        axios.get("api/user").then((res) => {
            this.user = res.data;
            console.log(res.data);
        });
    },

    methods: {
         remove(id){
            axios.delete(`/api/register/${id}`).then((res)=>{
                console.log('delete', res.data)
                this.get()
            })
        },
    },
}
</script>
<style lang="">
    
</style>