<template lang="html">
    <div>
        <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                <h2 class="">Insights</h2>
                <div class="">
                    <router-link :to="{name: 'newinsight'}" class="btn btn-primary mx-2">Add new</router-link>
                </div>
            </div>
        </div>

        <div class="container py-3">
            <div class="row justify-content-evenly">
                <div class="col-lg-4" v-for="card in cards" :key="card.id">
                    <div class="card advantage-content">
                        <div class="card-body">
                            <h6>{{ card.slug }}</h6>
                            <p>{{ card.body.substring(0, 200) + "...." }}</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success " @click="edit(card.id)" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit
                                </button>
                                <button class="btn btn-danger " @click="remove(card.id)"> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 pt-5 ">
<!--                            <div class="col-md-6 ">-->
<!--                                <div class="mb-3">-->
<!--                                    <label for="image" class="form-label">upload image</label>-->
<!--                                    <input class="form-control" type="file" @change="onChange" name="image">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" v-model="form.slug">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Title</label>
                                    <input class="form-control" name="title" type="text" v-model="form.title">
                                </div>
                                
                                
                                
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="body" class="form-label">Body-Context</label>
                                    <textarea class="form-control" name="body" rows="3" v-model="form.body"></textarea>
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="tag1" class="form-label">Tag1</label>
                                    <textarea class="form-control" name="tag1" rows="3" v-model="form.tag1"></textarea>
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="tag2" class="form-label">Tag2</label>
                                    <textarea class="form-control" name="tag2" rows="3" v-model="form.tag2"></textarea>
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="tag3" class="form-label">Tag3</label>
                                    <textarea class="form-control" name="tag3" rows="3" v-model="form.tag3"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-1</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head1"
                                           placeholder="paragraph-1 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph1"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-2</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head2"
                                           placeholder="paragraph-2 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph2"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-3</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head3"
                                           placeholder="paragraph-3 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph3"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-4</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head4"
                                           placeholder="paragraph-4 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph4"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-5</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head5"
                                           placeholder="paragraph-5 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph5"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-6</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head6"
                                           placeholder="paragraph-6 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph6"></textarea>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="paragraph" class="form-label">Paragraph-7</label>
                                    <input type="text" class="form-control mb-3" name="slug" v-model="form.head7"
                                           placeholder="paragraph-7 Heading">
                                    <textarea class="form-control" name="paragraph" rows="3"
                                              v-model="form.paragraph7"></textarea>
                                              
                                </div>
                                
                            </div>

                            <div class="col-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" value="submit" @click.prevent="update">
                                    Save
                                </button>
                                <button type="button" class="btn-primary btn px-3" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
import Form from 'vform'
import {objectToFormData} from 'object-to-formdata'

export default {
    data() {
        return {
            form: new Form({
                image: null,
                slug: null,
                title: null,
                body: null,
                tag1: null,
                tag2: null,
                tag3: null,
                head1: null,
                paragraph1: null,
                head2: null,
                paragraph2: null,
                head3: null,
                paragraph3: null,
                head4: null,
                paragraph4: null,
                head5: null,
                paragraph5: null,
                head6: null,
                paragraph6: null,
                head7: null,
                paragraph7: null,
            }),
            cards: [],
            idToUpDate: null
        }
    },

    mounted() {
        axios.get('/api/insight')
            .then((res) => {
                this.cards = res.data
            })
    },

    methods: {
        update(id) {
            axios.put(`/api/insight/` + this.idToUpDate, this.form).then((res) => {
                this.get();
                this.idToUpDate = null
            })
            this.$router.push('update-insight')
        },
        // onChange(e){
        //   let image =  this.form.image.length;
        //    return image;
        // },
        get() {
            axios.get('/api/insight')
                .then((res) => {
                    this.cards = res.data
                })
        },
        edit(id) {
            axios.get(`/api/insight/${id}`)
                .then((res) => {
                    this.form.slug = res.data.slug
                    this.form.title = res.data.title
                    this.form.body = res.data.body
                    this.form.image = res.data.image
                    this.form.head1 = res.data.head1
                    this.form.tag1 = res.data.tag1
                    this.form.tag2 = res.data.tag2
                    this.form.tag3 = res.data.tag3
                    this.form.paragraph1 = res.data.paragraph1
                    this.form.head2 = res.data.head2
                    this.form.paragraph2 = res.data.paragraph2
                    this.form.head3 = res.data.head3
                    this.form.paragraph3 = res.data.paragraph3
                    this.form.head4 = res.data.head4
                    this.form.paragraph4 = res.data.paragraph4
                    this.form.head5 = res.data.head5
                    this.form.paragraph5 = res.data.paragraph5
                    this.form.head6 = res.data.head6
                    this.form.paragraph6 = res.data.paragraph6
                    this.form.head7 = res.data.head7
                    this.form.paragraph7 = res.data.paragraph7
                    this.idToUpDate = res.data.id
                });
        },

        remove(id) {
            axios.delete(`/api/insight/${id}`).then((res) => {
                this.get()
            })
        },

    },
}
</script>
<style lang="">

</style>
