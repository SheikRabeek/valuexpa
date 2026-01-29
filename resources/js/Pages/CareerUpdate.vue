<template lang="">
    <div>
       <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                <h2 class="">Careers</h2>
                <div class="">
                     <router-link  :to="{name: 'newcareer'}" class="btn btn-primary mx-2">Add new </router-link >
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row justify-content-evenly">
                <div class="col-lg-4" v-for="card in cards" :key="card.id">
                    <div class="card advantage-content">
                        <div class="card-body">
                             <h6>{{card.title}}</h6>
                             <p>{{ card.description.substring(0,200)+"...." }}</p>
                        <div class="d-flex justify-content-between">
                            <button  class="btn btn-success " @click="edit(card.id)" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit</button>
                            <button class="btn btn-danger " @click.prevent="remove(card.id)"> Delete</button>
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Careers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form class="row g-3 pt-5 " >
                <div class="col-md-6">
                    <label for="title" class="form-label">job Title</label>
                    <input type="text" class="form-control" name="title"   v-model="form.title">
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label">job Location</label>
                    <input type="text" class="form-control" name="location"   v-model="form.location">
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description"  rows="3"  v-model="form.description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="responsibility" class="form-label">Responsibilities</label>
                        <textarea class="form-control" name="responsibility"  rows="3" v-model="form.responsibility"></textarea>
                    </div>
                    <div class="qualification">
                        <label for="paragraph" class="form-label">Required Qualifications</label>
                        <textarea class="form-control" name="qualification"  rows="3" v-model="form.qualification"></textarea>
                    </div>
                    <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Team</label>
                    <input type="text" class="form-control" name="contact"   v-model="form.contact">
                </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" value="submit" @click.prevent="update">Save</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios"
export default {
     data() {
        return {
            form:{
             title: null,
             location: null,
             contact: null,
             responsibility: null,
             qualification: null,
             description:null
            },
            cards:[],
            idToUpDate:null
        }
    },

    mounted() {
        axios.get('/api/career')
        .then((res)=>{
            console.log(res.data)
            this.cards = res.data
        })
    },

    methods: {
        update(id) {
            axios.put(`/api/career/`+ this.idToUpDate, this.form)
            .then((res)=>{
                console.log("res", res.data)
                this.get()
                this.idToUpDate = null
            })
        },

        get(){
            axios.get('/api/career')
            .then((res)=>{
                this.cards = res.data
            })
        },
        edit(id){
            axios.get(`/api/career/${id}`)
            .then((res)=>{
                this.form.title = res.data.title
                this.form.location = res.data.location
                this.form.contact = res.data.contact
                this.form.responsibility = res.data.responsibility
                this.form.qualification = res.data.qualification
                this.form.description = res.data.description
                this.idToUpDate = res.data.id
            })
        },
        
        remove(id){
            axios.delete(`/api/career/${id}`).then((res)=>{
                console.log('delete', res.data)
                this.get()
            })
        },

    },
}
</script>
<style lang="">
    
</style>