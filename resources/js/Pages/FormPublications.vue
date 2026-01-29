<template lang="">
    <div>
       <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                <h2>Form Publications</h2>
            </div>
       </div>

       <div class="container py-3">
            <table class="table">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Company</th>
                    <th scope="col">Publication</th>
                </tr>
                <tr class="mb-3" v-for="card in cards" :key="card.id">
                     <td>{{ card.name }}</td>
                     <td>{{ card.email }}</td>
                     <td>{{ card.phone }}</td>
                     <td>{{ card.company }}</td>
                     <td><router-link :to="{name: 'publication', params: { slug: card.publication.slug }}" target="_blank">{{ card.publication.title }}</router-link></td>
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
            form: {
                title: null,
                slug: null,
                subheading: null,
                form_header: null,
                form_subheading: null,
                form_subheading2: null
            },
            cards:[],
            idToUpDate: null
        }
    },
    mounted() {
        this.get()
    },
    methods: {
        get(){
            axios.get('/api/form/publication')
                .then((res)=>{
                    this.cards = res.data
                })
        },
    },
}
</script>
<style lang="">

</style>
