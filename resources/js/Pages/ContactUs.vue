<template lang="html">
    <div>
        <div class="container-fluid about-banner">
            <div class="container">
                <div class="row justify-center align-center text-center content-2">
                    <div class="col-lg-6 col-md-8 text-light">
                        <h2><b>Contact Us</b></h2>
                        <p>Get in touch with us to know how your business can get higher ROI from Finance teams!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-stretch">
                <h5 class="py-4 text-center">Please connect with us for a Consultation</h5>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 p-5 d-flex justify-content-center contact-card align-items-stretch">
                    <div class="text-light align-items-center">
                        <h3 class="text-center">Get in Touch</h3><br>
                        <div class="col-lg-12 py-3 text-center">

                            <h5>Call us at</h5>
                            <p>
                                <a href="tel:+14159093223" class="text-light"><b>+1 (415) 909-3223</b></a><br>
                                <a href="tel:+971551969179" class="text-light"><b>+971 551969179</b></a>
                            </p>

                            <h5>Drop a note to</h5>
                            <p>
                                <a href="mailto:info@valuexpa.com" class="text-light"><b>info@valuexpa.com</b></a><br>
                                or enter your details here and we will respond to you shortly
                            </p><br>

                            <h5>Office Address</h5>
                            <h5>VALUEXPA GROUP - FZCO</h5>
                            <p>
                                58415-001, IFZA Business Park,<br>
                                DDP, Silicon Oasis, Dubai,<br>
                                United Arab Emirates
                            </p>
                            <p>
                                1321 Upland Dr. PMB 15688,<br>
                                Houston, TX 77043-4718, US
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-10 contact-form">
                    <form class="row g-3 p-2" @submit.prevent="submit">
                        <div class="col-md-12">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" v-model="form.name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" v-model="form.email" required>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" v-model="form.phone">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Company</label>
                            <input type="text" class="form-control" name="company" v-model="form.company">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Please write a short message here</label>
                            <textarea class="form-control" name="message" v-model="form.message" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary-2">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid contact-footer-2">
            <div class="container py-5 my-4">
                <div class="row justify-content-evenly">
                    <div class="col-lg-5 text-light">
                        <p><b>About Us</b></p>
                        <i>
                            ValueXPA is a Global technology-enabled Finance-as-a-Service Partner for Small and Mid-sized
                            Businesses and Institutions. We help organizations with critical Management Decisions,
                            Financial/operational reporting and insights, Advanced Analytics & Automation and Finance
                            Processes Managed Services
                        </i>
                    </div>
                    <div class="col-lg-2 text-light">
                        <p><b>Quick Links</b></p>
                        <p><a class="py-3 text-light" href="/">Home</a></p>
                        <p><a class="py-3 text-light" href="/case-studies">Case Studies</a></p>
                        <p><a class="py-3 text-light" href="/insights/insights.php">Insights</a></p>
                        <p><a class="py-3 text-light" href="/insights/magazine.php">Magazine</a></p>
                        <p><a class="py-3 text-light" href="/careers">Careers</a></p>
                        <p><a class="py-3 text-light" href="/contact-us">Contact Us</a></p>
                        <p><a class="py-3 text-light" href="/about-us">About Us</a></p>
                        <p><a class="py-3 text-light" href="https://www.valuexpa.com/terms">Terms</a></p>
                        <p><a class="py-3 text-light" href="https://www.valuexpa.com/FAQs/">FAQs</a></p>
                        <p><a class="py-3 text-light" href="https://www.valuexpa.com/privacy">Privacy Policy</a></p>
                    </div>
                    <div class="col-lg-3 text-light">
                        <p><b>What we Do</b></p>
                        <p><a class="py-3 text-light" href="/Planing-and-Analysis-Made-Minimal">Extended Planning and Analysis</a></p>
                        <p><a class="py-3 text-light" href="/Analytical-Process-Automation-and-Business-Intelligence">Advanced Analytics & Business Intelligence</a></p>
                        <p><a class="py-3 text-light" href="/Finance-Processes-Managed-Services">Finance Processes Managed Services</a></p>
                        <p><a class="py-3 text-light" href="https://www.valuexpa.com/energy/">Energy and Renewables Focus</a></p>
                        <p><a class="py-3 text-light" href="https://www.valuexpa.com/generative-ai-for-finance/">Generative AI For Finance</a></p>
                    </div>
                    <div class="col-lg-2 text-center">
                        <a href="https://www.linkedin.com/company/finpreneurs/?viewAsMember=true" target="_blank"
                           class="mx-3 text-light"><h2><i class="bi bi-linkedin"></i></h2></a>
                    </div>
                </div>
            </div>

            <div class="text-center text-light py-3">&copy; 2025 FinnAcer Technologies LLP.</div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                phone: null,
                company: null,
                message: null
            }
        }
    },
    methods: {
        submit() {
            axios.post('/api/form/contact', this.form)
                .then(() => {
                    alert('Details successfully submitted');
                    this.form = { name: null, email: null, phone: null, company: null, message: null }; // reset
                })
                .catch(function (error) {
                    if (error.response.data.errors) {
                        let errorMsg = error.response.data.message;
                        for (let prop in error.response.data.errors) {
                            errorMsg += "\n" + prop + ": " + error.response.data.errors[prop];
                        }
                        alert(errorMsg);
                    }
                });
        }
    },
}
</script>

<style lang="">
/* Add your custom styles here */
</style>
