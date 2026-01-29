<template lang="html">
    <div>
        <div class="insight-banner">
            <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h1><b>Insights</b></h1>
                        <div class="mt-4">
                            <input type="text" class="form-control p-3" id="formGroupExampleInput" placeholder="E.g finance" v-model="search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                   <div class="col-lg-4 col-sm-6 col-md-6 col-12 d-flex align-items-stretch item" v-if="cards.data !== 0" v-for="card in  highSearch" :key="card.id">
                       <div class="bg-light my-3 shadow p-2">
                           <img :src="card.image" alt="" class=" col-12">
                           <hr>
                           <h6 c>{{ card.title }}</h6>
                           <p>{{ card.body?.substring(0,300) + '...'}}</p>
                           <p>
                               <router-link v-bind:to="{ name:'insight', params:{ slug: card.slug }}">Read More
                               </router-link>
                           </p>
                           <div class="px-1 pb-2 mx-2"><small><i>Insight Categories:</i></small></div>
                           <div class="d-flex flex-wrap">
                               <p class="bg-secondary px-2 py-1 mx-2 text-light rounded"><small>{{ card.tag1 }}</small></p>
                               <p class="bg-secondary px-2 py-1 mx-2 text-light rounded"><small>{{ card.tag2 }}</small></p>
                               <p
                                   :class="card.tag3 === ''|| card.tag3 === null ? '' : 'bg-secondary px-2 py-1 mx-2 text-light rounded'"><small>{{
                                       card.tag3
                                   }}</small></p>
                           </div>
                       </div>
                   </div>
                <div class="col-6 mt-3 mb-3 mx-auto" v-else-if="search !== ''">
                    <div class="shadow-sm p-3 text-center">
                        <h4 class="text-center text-dark ">No Insight for  {{search}} Available.</h4>
                    </div>
                </div>
                <div class="col-6 mt-3 mb-3 mx-auto" v-else>
                    <div class="shadow-sm p-3 text-center">
                        <h4 class="text-center text-dark ">No Post Available Yet.</h4>
                        <p class="text-center"><i>We are working on Something.</i></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-center py-5">
                <Pagination :data="cards" @pagination-change-page="view" />
            </div>
        </div>
        <Footer/>
    </div>
</template>
<script>
import axios from 'axios'
import Footer from "../components/Footer.vue"
import LaravelVuePagination from 'laravel-vue-pagination';


export default {
    components: {
        Footer,
        'Pagination': LaravelVuePagination
    },

    mounted(page = 1) {
        axios.get('/api/insight?page=' + page)
            .then((res) => {
                this.cards = res.data
                console.log(this.cards)
            })
    },
    methods: {
        view(page = 1) {
            axios.get('/api/insight?page=' + page)
                .then((res) => {
                    this.cards = res.data
                    console.log(this.cards)
                })
        }
    },

    data() {
        return {
            cards: {},
            search: ''
        }
    },

    computed : {
        highSearch() {
          if (this.search.trim().length > 0) {
              return this.cards.data.filter((res) => res.title.toLowerCase().includes(this.search.toLowerCase()))
          }
          return this.cards.data
        }
    }


}
</script>

<style scoped>

    p {
        text-align: justify;
    }

    .item {
        transition: .5s all ease;
    }
</style>
