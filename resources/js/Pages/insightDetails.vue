<template lang="html">
    <div>
        <div class="insight-banner">
           <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-8 col-md-8 col-sm-12 text-light">
                        <h1><b>Insights</b></h1>
                        <!-- <p>{{card.slug}}</p> -->
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid case-details-head-2 py-5 mb-5 ">
                   <div class="case-details-wrapper container">
                        <div class="row py-4 justify-content-center">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 d-flex align-items-stretch justify-content-center align-self-center">
                                <div class="case-details shadow-lg bg-light p-5">
                                    <h4>{{card.title}}</h4>
                                    <p>{{card.body}}</p>
                                </div>
                            </div>
                        </div>
                   </div>
        </div>

        <div class="container-fluid case-details-2 py-2 my-2">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-light text-justify p-2">
                        <h4>{{card.head1}}</h4>
                        <p>{{card.paragraph1}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-8 col-sm-12 col-12 text-dark  p-2">
                       <div class="">
                            <h5 class="">{{card.head2}}</h5>
                            <p class="pt-1">{{card.paragraph2}}</p>
                       </div>
                        <div class="">
                            <h5>{{card.head3}}</h5>
                            <p class="pt-1">{{card.paragraph3}}</p>
                        </div>
                        <div class="">
                            <h5>{{card.head4}}</h5>
                            <p class="pt-1">{{card.paragraph4}}</p>
                        </div>
                            <div class="">
                                <h5>{{card.head5}}</h5>
                                <p class="pt-1">{{card.paragraph5}}</p>
                            </div>
                        <div class="">
                             <h5>{{card.head6}}</h5>
                            <p class="pt-1">{{card.paragraph6}}</p>
                        </div>
                        <div class="">
                            <h5>{{card.head7}}</h5>
                        <p class="pt-1">{{card.paragraph7}}</p>
                        </div>
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
            let slug = this.$route.params.slug;

            axios.get("/api/insights/" + slug).then((res) => {
                this.card = res.data;
            });
        },
    },
    mounted() {
        this.loadData();
    },
};
</script>
<style lang="css" scoped>
    h5, p {
        text-align: justify !important;
    }
</style>
