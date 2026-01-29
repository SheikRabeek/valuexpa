<template lang="">
    <div>
        <div class="container pt-5">
            <div class=" d-flex justify-content-between mt-5">
                 <h2 class="">Dashboard</h2>
                 <button @click="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-lg-4 mb-4">
                    <img src="/img/in-img-1.png" alt="">
                    <h3 class="py-4"><b>Insights</b></h3>
                    <p>Use the link below to navigate to insights page
                        to update,edit,save or delete content from insights
                    </p>
                    <router-link :to="{name: 'insightupdate'}" class="btn btn-success"> Update insights</router-link>

                </div>
                <div class="col-lg-4 mb-4">
                    <img src="/img/in-img-3.png" alt="">
                    <h3 class="py-4"><b>Careers</b></h3>
                    <p>Use the link below to navigate to Careers page
                        to update,edit,save or delete content from insights
                    </p>
                    <router-link :to="{name: 'careerupdate'}" class="btn btn-success"> update Careers</router-link>
                </div>
                <div class="col-lg-4 mb-4">
                    <img src="/img/in-img-4.png" alt="">
                    <h3 class="py-4"><b>Publications</b></h3>
                    <p>Use the link below to navigate to Publications page
                        to update,edit,save or delete content from publications
                    </p>
                    <router-link :to="{name: 'publicationupdate'}" class="btn btn-success">Update Publications</router-link>
                </div>
                <div class="col-lg-4 mb-4">
                    <img src="/img/in-img-5.png" alt="">
                    <h3 class="py-4"><b>Form Publications</b></h3>
                    <p>Use the link below to navigate to Form Publications page</p>
                    <router-link :to="{name: 'formpublication'}" class="btn btn-success">View Forms</router-link>
                </div>
                <div class="col-lg-4 mb-4">
                    <img src="/img/in-img-5.png" alt="">
                    <h3 class="py-4"><b>Form Contact</b></h3>
                    <p>Use the link below to navigate to Form Contact page</p>
                    <router-link :to="{name: 'formcontact'}" class="btn btn-success">View Forms</router-link>
                </div>
            </div>
        </div>
    </div>
    <router-view></router-view>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            user: null
        };
    },

    methods: {
        logout() {
            axios.get("/api/logout").then(() => {
                window.location.reload();
            });
        },
    },

    mounted() {
        axios.get("/api/user").then((res) => {
            this.user = res.data;
            console.log(res.data);
        });
    },


};
</script>
<style lang=""></style>
