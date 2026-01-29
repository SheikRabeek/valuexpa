<template lang="html">
<a href="https://www.glassdoor.co.in/Overview/Working-at-ValueXPA-EI_IE7297621.11,19.htm">
<img alt="Find us on Glassdoor." src="https://www.glassdoor.co.in/pc-app/static/img/partnerCenter/badges/eng_FIND_US_258x90.png"></a>
    <div>
        <div class="container-fluid careers-banner">
            <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h1><b>Careers</b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4 justify-content-center" v-if="result.length < 0">
            <div class="p-3 col-lg-6 text-center shadow ">
            <h4 class="text-center text-dark ">Please check back later.</h4>
            <p><i>new opportunities opening soon.</i></p>
            </div>
        </div>
        <div class="container py-3" v-else>
            <div class="row justify-content-evenly">
                <h3 class="text-center py-5">Open Positions in <span class="color-blue"> all locations</span></h3>
                <center class="mb-3"><a href="https://www.glassdoor.co.in/Overview/Working-at-ValueXPA-EI_IE7297621.11,19.htm"><img alt="Find us on Glassdoor." src="https://www.glassdoor.co.in/pc-app/static/img/partnerCenter/badges/eng_FIND_US_258x90.png"></a></center>
                <center><img alt="Find us on Glassdoor." src="img/testimonial/7.jpeg"></center>
                <div class="col-lg-3 career-card my-2" v-for="post in result" :key="post.id">
                    <div class="p-2">
                        <h4><b>{{post.title}}</b></h4>
                        <p>Location: <span><b>{{post.location}}</b></span></p>
                        <router-link :to="{name: 'career', params:{title: post.title} }">View Details-</router-link>>
                    </div>
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>
<script>


    import Footer from "../components/Footer.vue"
    import axios from "axios"
export default {
    components:{
        Footer,
    },

    data() {
        return {
            result:[]
        }
    },

    mounted() {
        axios.get('api/career').then((res)=>{
            this.result = res.data
        }).catch((error)=>{
            console.log(error)
        })
    },
}
</script>
<style lang="">

</style>
