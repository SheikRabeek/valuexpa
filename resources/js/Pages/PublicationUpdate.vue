<template lang="">
    <div>
       <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                <h2>Publications</h2>
                <div class="">
                     <router-link :to="{name: 'newpublication'}" class="btn btn-primary mx-2">Add new</router-link >
                </div>
            </div>
       </div>

       <div class="container py-3">
            <div class="row justify-content-evenly">
                <div class="col-lg-4 mb-3" v-for="card in cards" :key="card.id">
                    <div class="card advantage-content">
                        <div class="card-body">
                             <h6>{{ card.title }}</h6>
                             <p>{{ card.slug }}</p>
                            <div class="d-flex justify-content-between">
                                <router-link :to="{name: 'publication', params: { slug: card.slug }}" target="_blank">View</router-link>

                                <button class="btn btn-success" @click="edit(card.id)" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                <button class="btn btn-danger" @click.prevent="remove(card.id)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <router-link class="btn btn-info" :to="{name: 'dashboard'}">Dashboard</router-link>
       </div>

       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Publications</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 pt-5" name="updatePublication">
                            <div class="col-md-6">
                               <label for="title" class="form-label">Header</label>
                               <input type="text" class="form-control" name="title" v-model="form.title">
                            </div>
                            <div class="col-md-6">
                               <label for="location" class="form-label">Slug</label>
                               <input type="text" class="form-control" name="slug" v-model="form.slug">
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="subheading" class="form-label">Sub-heading</label>
                                    <textarea class="form-control" name="subheading" rows="3" v-model="form.subheading"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="form-header" class="form-label">Form header</label>
                                    <input type="text" class="form-control" name="form_header" v-model="form.form_header">
                                </div>
                                <div class="mb-3">
                                    <label for="form-subheading" class="form-label">Form sub-heading 1</label>
                                    <textarea class="form-control" name="form_subheading" rows="3" v-model="form.form_subheading"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="form-subheading2" class="form-label">Form sub-heading 2</label>
                                    <textarea class="form-control" name="form_subheading2" rows="3" v-model="form.form_subheading2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label">PDF</label>
                                    <input class="form-control" type="file" name="pdf" accept=".pdf">
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
        update() {
            let formData = new FormData(document.forms.updatePublication);
            formData.append('_method', 'PUT');

            axios({
                method: "POST",
                url: `/api/publication/` + this.idToUpDate,
                data: formData,
                headers: {"Content-Type": "multipart/form-data"},
            })
            .then((data) => {
                alert('Update');
            })
            .catch(function (error) {
                if ( error.response.data.errors )
                {
                    let errorMsg = error.response.data.message;
                    for (let prop in error.response.data.errors) {
                        errorMsg += "\n" + prop + ": " + error.response.data.errors[prop];
                    }
                    alert(errorMsg);
                }
            });
        },
        get(){
            axios.get('/api/publication')
                .then((res)=>{
                    this.cards = res.data
                })
        },
        edit(id){
            axios.get(`/api/publication/${id}`)
                .then((res)=>{
                    this.form.title = res.data.title
                    this.form.slug = res.data.slug
                    this.form.subheading = res.data.subheading
                    this.form.form_header = res.data.form_header
                    this.form.form_subheading = res.data.form_subheading
                    this.form.form_subheading2 = res.data.form_subheading2
                    this.idToUpDate = res.data.id
                })
        },
        remove(id){
            axios.delete(`/api/publication/${id}`).then((res)=>{
                this.get()
            })
        },
    },
}
</script>
<style lang="">

</style>
