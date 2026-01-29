<template lang="">
    <div>
        <div class="container pt-5">
         <div class="d-flex justify-content-between mt-5">
                <h2>New publication</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 p-3">
                    <form class="row g-3 pt-5" name="newPublication">
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
                            <button type="submit" class="btn btn-primary" value="submit" @click.prevent="submit">Save</button>

                            <div>
                                <router-link type="submit" class="btn btn-warning mx-2" :to="{name: 'publicationupdate'}">Update publication</router-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
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
            }
        }
    },
    methods: {
        submit()
        {
            axios({
                method: "POST",
                url: '/api/publication',
                data: new FormData(document.forms.newPublication),
                headers: {"Content-Type": "multipart/form-data"},
            })
            .then((data) => {
                this.$router.push({name: "publicationupdate"})
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
    },
}
</script>
<style lang="">

</style>
