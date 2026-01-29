<template lang="html">
    <div>
        <div class="case-study-banner">
           <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h2><b>Case Studies</b></h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="row  py-4" :class="index % 2 === 0 ? 'flex-row-reverse' : 'row'" v-for="(post,index) in cards" :key="post.id">
                <div class="col-lg-6 d-flex align-items-stretch justify-content-center align-self-center reverse">
                    <div class="case shadow-lg bg-light p-5 main-case" >
                        <h4>{{post.head}}</h4>
                        <p>{{post.body}}</p>
                            <div class="btn btn-light shadow"><router-link v-bind:to="{name:'casedetails', params:{id: post.slug }}">Read more</router-link></div>
                            <br> <br>
                            <div class="px-1 pb-2 mx-2"><small ><i>Solution Categories:</i></small></div>
                            <span class="bg-secondary px-2 py-1 my-4 mx-2 text-light rounded"><small>{{post.tag1}}</small></span>
                            <span class="bg-secondary px-2 py-1 my-4 mx-2 text-light rounded"><small>{{post.tag2}}</small></span>
                            <!-- <span :class="post.tag3 !== '' ? 'bg-secondary px-2 py-1 my-4 mx-2 text-light rounded' : 'bg-none'"><small>{{post.tag}}</small></span> -->
                    </div>
                </div>
                <div class="col-lg-6 align-items-stretch justify-content-center align-self-center">
                    <img :src="post.image" alt="" class=" col-12">
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

    watch:{
        searchQuery: function(val){
            console.log(this.searchQuery)
        }
    },

    data() {
        return {
             cards:[],
             searchQuery: null

        }
    },

    mounted() {
        axios.get('/api/casestudy')
        .then((res)=>{
            this.cards =  res.data;
        })
    },
}
</script>
<style lang="">

</style>
