<template>
  <div>
    <div class="container-fluid about-banner">
      <div class="container">
        <div class="row justify-center align-center text-center content-2">
          <div class="col-lg-6 col-md-8 text-light">
            <h2><b>{{ card.title }}</b></h2>
            <p>{{ card.subheading }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="border-pub mx-lg-3 mx-xl-3 mx-xxl-5 mx-4 my-5 pb-5">
      <div class="row justify-content-center align-items-stretch">
        <h4 class="py-4 text-center pb-4 color-blue">
          Please fill the details to receive download links...
        </h4>

        <div class="p-lg-5 p-md-5 p-4 flex col-12 publication-card align-items-stretch">
          <div class="text-light align-items-center">
            <h3 class="text-center">{{ card.form_header }}</h3>
            <div class="py-5 row justify-content-evenly">
              <div v-if="card.image"
                class="col-xl-6 col-xxl-5 col-lg-5 col-md-6 col-12 border border-3 imgnew"
                :style="{ backgroundImage: 'url(/' + card.image + ')' }"
                :aria-label="card.image_alt || 'Publication image'"
                role="img"
              ></div>

              <div class="py-3 col-xl-6 col-xxl-7 col-lg-7 col-md-6 col-12 p-size">
                <p class="text-justify">{{ card.form_subheading }}</p>
                <p class="text-justify">{{ card.form_subheading2 }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-xl-3 col-xxl-3 col-md-12 col-12 contact-form pt-lg-5">
          <form
            class="row g-3 p-2 mt-4"
            name="publicationForm"
            @submit.prevent="submitForm"
            novalidate
          >
            <div class="col-md-12">
              <label for="name" class="form-label">Name *</label>
              <input
                type="text"
                class="form-control"
                id="name"
                v-model="form.name"
                required
                :disabled="loading"
              />
              <div v-if="errors.name" class="text-danger small">{{ errors.name }}</div>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Email *</label>
              <input
                type="email"
                class="form-control"
                id="email"
                v-model="form.email"
                required
                :disabled="loading"
              />
              <div v-if="errors.email" class="text-danger small">{{ errors.email }}</div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone</label>
              <input
                type="tel"
                class="form-control"
                id="phone"
                v-model="form.phone"
                :disabled="loading"
              />
              <div v-if="errors.phone" class="text-danger small">{{ errors.phone }}</div>
            </div>

            <div class="col-12">
              <label for="company" class="form-label">Company</label>
              <input
                type="text"
                class="form-control"
                id="company"
                v-model="form.company"
                :disabled="loading"
              />
              <div v-if="errors.company" class="text-danger small">{{ errors.company }}</div>
            </div>

            <div class="mb-3">
              <input type="checkbox" id="agree" v-model="form.agree" :disabled="loading" />
              <label for="agree" class="ms-2">
                By filling and submitting this form, you agree to our
                <router-link :to="{ name: 'terms' }" target="_blank" class="text-decoration-underline">Terms</router-link>
                and
                <router-link :to="{ name: 'privacy' }" target="_blank" class="text-decoration-underline">Privacy Policy</router-link>.
              </label>
              <div v-if="errors.agree" class="text-danger small">{{ errors.agree }}</div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-secondary-2 px-5" :disabled="loading">
                <span v-if="loading" class="spinner-border spinner-border-sm me-2"></span>
                {{ loading ? 'Sending...' : 'Send' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import axios from "axios";

export default {
  name: "PublicationForm",
  components: { Footer },
  data() {
    return {
      form: {
        name: "",
        email: "",
        phone: "",
        company: "",
        agree: false,
        publication_id: null,
      },
      card: {},
      errors: {},
      loading: false,
    };
  },
  methods: {
    async loadData() {
      try {
        const slug = this.$route.params.slug;
        const response = await axios.get(`/api/publications/${slug}`);
        this.card = response.data;
        this.form.publication_id = response.data.id;
      } catch (error) {
        alert("Error loading publication details.");
      }
    },

    validateForm() {
      this.errors = {};
      if (!this.form.name.trim()) this.errors.name = "Name is required";
      if (!this.form.email.trim()) this.errors.email = "Email is required";
      else if (!this.isValidEmail(this.form.email))
        this.errors.email = "Please enter a valid email address";
      if (this.form.phone && !this.isValidPhone(this.form.phone))
        this.errors.phone = "Please enter a valid phone number";
      if (!this.form.agree)
        this.errors.agree = "You must agree to the terms and conditions";
      return Object.keys(this.errors).length === 0;
    },

    isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    },
    isValidPhone(phone) {
      const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
      return phoneRegex.test(phone);
    },

    async submitForm() {
      if (!this.validateForm()) return;
      this.loading = true;

      try {
        const response = await axios.post("/api/form/publication", this.form);

        if (response.status === 200) {
          alert(response.data.message);

          // ✅ Auto download PDF
          if (response.data.download_url) {
            const link = document.createElement("a");
            link.href = response.data.download_url;
            link.setAttribute("download", "publication.pdf");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
          }

          this.resetForm();
        }
      } catch (error) {
        this.handleError(error);
      } finally {
        this.loading = false;
      }
    },

    handleError(error) {
      if (error.response?.data?.errors) {
        this.errors = error.response.data.errors;
        alert(error.response.data.message || "Please correct the errors.");
      } else {
        alert("An error occurred. Please try again.");
      }
    },

    resetForm() {
      this.form = {
        name: "",
        email: "",
        phone: "",
        company: "",
        agree: false,
        publication_id: this.form.publication_id,
      };
      this.errors = {};
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>


<style lang="css" scoped>
.btn {
    padding: 5px 40px !important;
}

.text-justify {
    text-align: justify;
}

.imgnew {
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: cover;
    max-width: 400px;
    min-height: 563px;

}
@media (min-width: 992px) {

    /* Changed from 768px to 992px for better tablet handling  */
    .imgnew {
        width: 100%;
        /* height: 700px;
        Desktop height 
        min-height: 650px; */
    }
} 
@media (min-width: 420px) {

    /* Changed from 768px to 992px for better tablet handling  */
    .imgnew {
        width: 100%;
        /* height: 700px;
        Desktop height 
        min-height: 650px; */
    }
} 

.p-size {
    font-size: 18px;
}

/* .bg-img {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    max-width: 100%;
    width: 100%;
    height: 400px;
    Mobile height 
    min-height: 400px;
    /* Ensure it doesn't collapse 
}
@media (min-width: 992px) {

    /* Changed from 768px to 992px for better tablet handling
    .bg-img {
        max-width: 41%;
        height: 700px;
        /* Desktop height 
        min-height: 650px;
    }
}    
*/
</style>
