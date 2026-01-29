<template lang="">
    <div>
       <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                <h2>Form Contacts</h2>
            </div>
       </div>

       <div class="container py-3">
            <table class="table">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Company</th>
                    <th scope="col">Message</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                <tr class="mb-3" v-for="card in cards" :key="card.id">
                     <td>{{ card.date }}</td>
                     <td>{{ card.name }}</td>
                     <td>{{ card.email }}</td>
                     <td>{{ card.phone }}</td>
                     <td>{{ card.company }}</td>
                     <td>{{ card.message }}</td>
                     <td><a href="#" @click.prevent="remove(card.id)">Delete</a></td>
                </tr>
            </table>

            <router-link class="btn btn-info" :to="{name: 'dashboard'}">Dashboard</router-link>
       </div>
    </div>
</template>
<script>
import axios from "axios"
export default {
    data() {
        return {
            cards:[]
        }
    },
    mounted() {
        this.get()
    },
    methods: {
        get(){
            axios.get('/api/form/contact')
                .then((res)=>{
                    this.cards = res.data
                })
        },
        remove(id){
            axios.delete(`/api/form/contact/${id}`).then((res)=>{
                this.get()
            })
        },
    },
}
</script>
<style lang="">

</style>
