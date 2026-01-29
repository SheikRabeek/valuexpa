<template lang="">
    <div>
        <div class="container pt-5">
           <div class="row justify-content-center">
             <div class="col-lg-6 p-3">
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
                <div class="" v-show="show">
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="staticBackdropLabel">Add Careers</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-success">
                            Careers added successfully
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add New</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" value="submit" @click.prevent="submit">Save</button>
                    <div class="">
                        <router-link type="submit" class="btn btn-warning mx-2" :to="{name: 'careerupdate'}">Update Careers</router-link>
                        <router-link type="submit" class="btn btn-success" :to="{name: 'careers'}">Main Careers</router-link>
                    </div>
                </div>
                </form>
            </div>
           </div>
        </div>
        <router-view></router-view>
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
           show: false
        }
    },
    methods: {
        submit(){
            axios.post('/api/career', this.form)
            .then((res)=>{
                console.log("res from api")
                this.show = true
               
            })
            console.log(this.form)
            this.form.value = ""
        },
        
    },
    // mounted() {
    //     console.log('Component mounted');
    //     // axios.get('/api/insight').then(res=>{
    //     //     console.log(res.data)
    //     // })
    // },
}
</script>
<style lang="">
    
</style>