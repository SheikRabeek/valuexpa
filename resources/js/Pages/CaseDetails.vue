<template lang="">
    <div>
        <div class="insight-banner">
           <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h1><b>Case Studies</b></h1>
                    </div>
                </div>
            </div>

        </div>
        <div class="back">
            <div class="btn btn-primary">
                <router-link :to="{name: 'casestudy'}" class="text-light" >Back</router-link>
            </div>
        </div>
        <div class="container-fluid case-details-head-2 py-5 mb-5 ">
                   <div class="case-details-wrapper container">
                        <div class="row py-4 justify-content-center">
                            <div class="col-lg-8 d-flex align-items-stretch justify-content-center align-self-center">
                                <div class="case-details shadow-lg bg-light p-5">
                                    <h4>{{post.head}}</h4>
                                    <p>{{post.body}}</p>
                                </div>
                            </div>
                        </div>
                   </div>
        </div>

        <div class="container-fluid case-details-2 py-3 my-5">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-light p-4">
                        <h4>The Problem we solved</h4>
                        <p>{{post.paragraph1}}</p>
                    </div>
                </div>
            </div>
        </div>

                   <div class=" container">
                        <div class="row py-3 justify-content-center">
                            <div class="col-lg-8 d-flex align-items-stretch justify-content-center align-self-center">
                                <div class="case shadow-lg bg-light p-5">
                                    <h4> What we Did:</h4>
                                    <p>{{post.paragraph2}}</p>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class=" container py-4">
                        <div class="row py-3 justify-content-center">
                            <div class="col-lg-8 d-flex align-items-stretch justify-content-center align-self-center">
                                <div class="case shadow-lg bg-light p-5">
                                    <h4> How we created an Impact:</h4>
                                    <p>{{post.paragraph3}}</p>
                                </div>
                            </div>
                        </div>
                   </div>
                   <!-- <div class="text-center d-flex justify-content-center">
                    <a href=""  class="mx-3"><h4><i class="bi bi-facebook"></i></h4></a>
                    <a href="" class="mx-3"><h4><i class="bi bi-twitter"></i></h4></a>
                    <a :href="linkedinURL" target="_blank" class="mx-3"><h4><i class="bi bi-linkedin"></i></h4></a>
                   </div> -->
         <Footer/>

    </div>

</template>
<script>
   import Footer from "../components/Footer.vue"
export default {
    components:{
        Footer,
    },

    data() {
        return {
            post:[],
        }
    },

    mounted() {
        axios.get('/api/cases/' + this.$route.params.id)
        .then((res)=>{
            this.post = res.data;
        })
    },

}
</script>
<style>
    .back{
        position: fixed;
        bottom: 10%;
    }
    .btn-primary{
        background-color: #174684;
    }
</style>
