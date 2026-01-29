<template lang="">
    <div>
        <div class="container-fluid careers-banner">
            <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h1><b>Join Our Team</b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3 my-3 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-10 col-sm-12 my-3">
                    <h3 class="color-blue">Descriptions:</h3>
                    <p class="py-2">{{card.description}}</p>
                </div>
                <div class="col-12 col-lg-8 col-md-10 col-sm-12 my-3">
                    <h3 class="color-blue">Responsibility:</h3>
                     <p class="py-2">{{card.responsibility}}</p>
                </div>
                <div class="col-12 col-lg-8 col-md-10 col-sm-12 my-3">
                    <h3 class="color-blue">Qualifications:</h3>
                     <p class="py-2">{{card.qualification}}</p>
                </div>
                <div class="col-12 col-lg-8 col-md-10 col-sm-12 my-3">
                    <h3 class="color-blue">Contact:</h3>
                <address>{{card.contact}}</address>
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>
<script>
    import Footer from "../components/Footer.vue"
import axios from "axios";
export default {
     components:{
        Footer,
    },
    data() {
        return {
            card: [],
        };
    },
    methods: {
        async loadData() {
            let title = this.$route.params.title;

            axios.get("/api/careers/" + title).then((res) => {
                this.card = res.data;
                console.log(res.data);
            });
        },
    },
    mounted() {
        this.loadData();
    },
};
</script>
<style lang="">
    
</style>