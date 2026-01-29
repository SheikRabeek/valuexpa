<template lang="">
  <div>
    <div class="container-fluid about-banner">
      <div class="container">
        <div class="row justify-center align-center text-center content-2">
          <div class="col-lg-6 col-md-8 text-light">
            <h2><b>About</b></h2>
            <h4>Sharat Satyanarayana</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row p-4">
        <div class="col-lg-3">
          <img src="img/image4.jpg" alt="Sharat Satyanarayana" class="col-12">
          <div class="text-center mt-2">
            <a href="https://www.linkedin.com/in/sharatsatyanarayana" target="_blank">
              <h2><i class="bi bi-linkedin"></i></h2>
            </a>
          </div>
        </div>

        <div class="col-lg-8 text-justify shadow p-3">
          <p>
            <b>Sharat Satyanarayana</b> is a seasoned entrepreneur and consultant with deep
            expertise in building and scaling technology startups. He is currently
            Co-Founder of YouMay.Live, a platform reimagining career exploration
            and discovery for the AI-native generation. Previously, he co-founded
            and led Ederlabs, an accelerator-funded startup pioneering digital
            personalization with Internet User Memory, bridging innovation between
            Bangalore and San Francisco over a six-year journey.
          </p>

          <div class="col-lg-12 justify-content-center">
            <p>
              Before his startup leadership roles, Sharat spent nearly a decade as
              a management consultant, supporting startups and SMEs in identifying
              growth opportunities and solving complex challenges across business
              strategy, innovation, and market development. His consulting
              experience includes engagements with firms such as Target and Quantum
              Consumer Solutions, where he advised on strategy, innovation, and
              human-centered design.
            </p>
          </div>

          <div class="col-lg-12 justify-content-center">
            <p>
              With a career spanning entrepreneurship, consulting, and innovation
              strategy, Sharat combines hands-on startup building with advisory
              expertise. His work reflects a consistent focus on harnessing
              technology to create new business models, drive user-centric
              solutions, and enable companies to scale effectively.
            </p>
          </div>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue"

export default {
  components: {
    Footer,
  },
}
</script>

<style lang="">
</style>
