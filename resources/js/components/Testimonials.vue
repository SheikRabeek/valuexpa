<template>
  <div class="container py-5">
      <div class="col-lg-12 container">
          <h3>What our Clients Say</h3>
      </div>
      <div class="col-lg-6">
    <carousel  :items-to-show="1.5">
            <slide  v-for="slide in testimonials" :key="slide">
                <div class="">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
                                <div class="my-2 card-serve p-3 mx-3 my-3 text-left">
                                    <div class="col-lg-12 py-2 icon-card-2 px-3 ">
                                        <!-- <img src="/img/testimonial.png" alt="" class="py-2 " style="max-width: 50px;"> -->
                                    </div>
                                    <p class="text-black px-3">{{slide.title}}</p>
                                    <p class="text-black px-3"><b> <br> <span><i>{{slide.name}}</i></span></b></p>
                                </div>
                            </div>
                </div>
            </slide>
    <template #addons>


    </template>
  </carousel>
  </div>
  </div>
</template>

<script>
// If you are using PurgeCSS, make sure to whitelist the carousel CSS classes
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
  name: 'App',
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data() {
      return {
          testimonials:[
              {name: "Founder of India's leading Agri-Tech co", title: "Finnacer Global added immense value by bringing in insights and experience to finance and helped build the financial aspect of our business plan."},
              {name: "Founder & CEO of an Edutech Startup", title: "Views are always strategic looking at the bigger picture, particularly impressive is their ability to understand the nuances of the different stages of business and help us accordingly."},
              {name: "Founder of Early-stage Startup", title: "We received strong inputs on financial strategy and projections. We strongly recommend for start-up financial modeling, fund raise plan and part-time CFO services."},

          ]
      }
  },
};
</script>

<style>
    .carousel__slide{
        /* width: 50% !important; */
    }
    .carousel__viewport{
        overflow: visible !important;
    }
    .carousel{
        text-align: left !important;
    }
    @media(max-width:968px){
         .carousel__viewport{
        overflow: hidden !important;
    }
    }
</style>
