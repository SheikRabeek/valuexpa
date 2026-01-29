<template lang="html">
    <div>
        <div class="container pt-5">
           <div class="row justify-content-center">
             <div class="col-lg-12 p-3">
                <form class="row g-3 pt-5 " >
                <div class="col-md-6 ">
                  <div class="mb-3">
                    <label for="image" class="form-label" >upload image</label>
                    <input class="form-control" type="file" @change="onChange" name="image"  >
                </div>
                </div>
                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug"   v-model="form.slug">
                </div>
                <div class="row align-content-center">
                    <div class="mb-3 col-6">
                        <label for="body" class="form-label">Title</label>
                        <input class="form-control" name="title"  type="text"  v-model="form.title">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="body" class="form-label">Body-Context</label>
                        <textarea class="form-control" name="body"  rows="3"  v-model="form.body"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="tag1" class="form-label">Tag-1</label>
                        <textarea class="form-control" name="tag1"  rows="3"  v-model="form.tag1"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="tag2" class="form-label">Tag-2</label>
                        <textarea class="form-control" name="tag2"  rows="3"  v-model="form.tag2"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="tag3" class="form-label">Tag-3</label>
                        <textarea class="form-control" name="tag3"  rows="3"  v-model="form.tag3"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-1</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head1" placeholder="paragraph-1 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph1"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-2</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head2" placeholder="paragraph-2 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph2"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-3</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head3" placeholder="paragraph-3 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph3"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-4</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head4" placeholder="paragraph-4 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph4"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-5</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head5" placeholder="paragraph-5 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph5"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-6</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head6" placeholder="paragraph-6 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph6"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="paragraph" class="form-label">Paragraph-7</label>
                        <input type="text" class="form-control" name="slug"   v-model="form.head7" placeholder="paragraph-7 Heading">
                        <textarea class="form-control" name="paragraph"  rows="3" v-model="form.paragraph7"></textarea>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" value="submit" @click.prevent="submit">Save</button>
                    <div class="">
                        <router-link type="submit" class="btn btn-warning mx-2" :to="{name: 'insightupdate'}">Update Insight</router-link>
                        <router-link type="submit" class="btn btn-success" :to="{name: 'insights'}">Main Insights</router-link>
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
    import Form from 'vform'
    import {objectToFormData} from 'object-to-formdata'

export default {
    components: {
    // QuillEditor
  },
    data() {
        return {
            form: new Form({
             image:null,
             slug:'',
             title:'',
             body: '',
             head1:'',
             tag1:'',
             tag2:'',
             tag3:'',
             paragraph1: '',
             head2:'',
             paragraph2: '',
             head3:'',
             paragraph3: '',
             head4:'',
             paragraph4: '',
             head5:'',
             paragraph5: '',
             head6:'',
             paragraph6: '',
             head7:'',
             paragraph7: '',
            }),
           show: false
        }
    },
    methods: {
        onChange(e){
           const file = e.target.files[0]
           this.form.image = file
            console.log("selected file", file)
        },
        submit(){
            this.form.post('/api/insight', {
                transfromRequest: [function(data, headers){
                    return objectToFormData(data)
                }],
                onUploadProgress: e =>{
                    console.log(e,)
                }
            }).then(({data})=>{
                // console.log(data)
            })
            this.$router.push('update-insight')
        },

    },

}
</script>
<style lang="">

</style>
