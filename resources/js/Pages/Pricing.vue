<template>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header col-xxl-6  col-12 mx-auto">
                    <h2 class="modal-title" id="staticBackdropLabel"><img src="/img/logo-mail.png"
                                                                          width="150" alt="..."></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="col-xxl-6 mx-auto">
                        <div class="py-3">
                            <h1 class="text-blue">Let's get in touch</h1>
                            <p class="pt-3">Our experts can help you find the right solutions. Please provide a bit of
                                information and we’ll be in touch.</p>
                        </div>
                        <form class="row g-3"  >
                            <div class="col-md-3 py-2">
                                <label for="first_name" class="form-label">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control p-3" id="first_name" v-model="form.first_name" >
                            </div>
                            <div class="col-md-3 py-2">
                                <label for="last_name" class="form-label">Last Name<span
                                    class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control p-3" id="last_name" v-model="form.last_name" >
                            </div>
                            <div class="col-6 py-2">
                                <label for="inputAddress" class="form-label">Company Name<span
                                    class="text-danger">*</span></label>
                                <input type="text" class="form-control p-3"
                                       placeholder="company" name="company_name" v-model="form.company_name" required>
                            </div>
                            <div class="col-3 py-2">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control p-3"
                                       placeholder="Email Address" name="email" v-model="form.email" required>
                            </div>
                            <div class="col-3 py-2">
                                <label for="email" class="form-label">Phone Number<span
                                    class="text-danger">*</span></label>
                                <input type="text" class="form-control p-3" id="inputAddress2"
                                       placeholder="Phone Number" name="phone" v-model="form.phone" required>
                            </div>
                            <div class="col-6 py-2">
                                <label for="inputState" class="form-label">Industry</label>
                                <select  class="form-select p-3"  v-model="form.industry">
                             <option selected disabled value="">Select Your Industry</option>
                             <option>Select Your Industry</option>
                            <option>Advanced Electronics</option>
                            <option>Aerospace & Defense</option>
                            <option>Agriculture</option>
                            <option>Automotive & Assembly</option>
                            <option>Chemicals</option>
                            <option>Consumer Packaged Goods</option>
                            <option>Education</option>
                            <option>Electric Power & Natural Gas</option>
                            <option>Engineering, Construction & Building</option>
                            <option>Materials</option>
                            <option>Financial Services</option>
                            <option>Healthcare Systems & Services</option>
                            <option >Health Care</option>
                            <option>LifeSciences</option>
                            <option>Metals & Mining</option>
                            <option >Non-Profit</option>
                            <option>Oil & Gas
                            <option>Paper, Forest Products & Packaging</option>
                            <option>Private Equity & Principal Investors</option>
                            <option>Public & Social Sector</option>
                            <option>RealEstate</option>
                            <option>Retail</option></option>
                            <option>Semi conductors</option>
                            <option>Technology, Media & Telecommunications</option>
                            <option>Travel, Logistics & Infrastructure</option>
                            <option>Others</option>
                                </select>
                            </div>
                            <div class="col-6 py-2">
                                <label for="inputState" class="form-label">Number of employees</label>
                                <select id="inputState" class="form-select p-3" v-model="form.employees">
                                    <option selected disabled value="">Select number of your employees</option>
                                    <option>Self-employed</option>
                                    <option>1-10</option>
                                    <option>10-50</option>
                                    <option>50-100</option>
                                    <option>100-500</option>
                                    <option> > 500</option>
                                </select>
                            </div>
                            <div class="col-6 py-2">
                                <label for="inputState" class="form-label">Estimated annual revenue</label>
                                <select id="inputState" class="form-select p-3" v-model="form.revenue">
                                    <option selected disabled value="">Select estimated annual revenue</option>
                                    <option>Select estimated annual revenue</option>
                                    <option>&lt$1M</option>
                                    <option>$1M - $5M</option>
                                    <option>$5M - $10M</option>
                                    <option>$10M - $50M</option>
                                    <option>$50M - $200M</option>
                                    <option>$200M+ </option>






                            </select>
                            </div>
                            <div class="col-12 mb-5">
                               <center> <button type="submit" class="btn btn-secondary-2 px-4 py-2" data-bs-dismiss="modal" aria-label="Close" @click.native.prevent="onSubmit">SUBMIT</button></center>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid pricing">
        <div class="container">
            <div class="row justify-center align-center text-center content-2">
                <div class=" col-xxl-8 col-xl-9 col-lg-8 col-md-10 text-light">
                    <h2><b>Pricing</b></h2>
                    <h2 class="fw-normal">Finance-as-a-Service for Startups and Small Businesses under the US $10mn in
                        Revenue</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="btn-price-wrapper position-relative overflow-hidden">
            <div class="row justify-content-center ">
                <button v-for="btn in planBtn" :key="btn" type="submit" @click="toggleOnTop(btn.id)"
                        :class="currentId.includes(btn.id) ? 'col-xxl-2 col-5 btn  mt-5 mb-5 btn-secondary-2 shadow': 'col-xxl-2 col-5 btn  mt-5 mb-5 btn-light-blue shadow' ">
                    {{ btn.plan }}
                </button>
            </div>
            <div class="currency position-absolute top-0 end-0">
                <div class="dropdown">
                    
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid  py-5">
        <div class="plans px-4">
            <div class="row justify-content-between">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-stretch"
                     v-for="plan in priceLog" :key="plan.type">
                    <div class="bg-light p-3 py-5 mb-4 price-card shadow d-flex flex-column w-100">
                        <div class="price-text text-center">
                            <h5 class="mb-2">{{ plan.type.toUpperCase() }}</h5>
                            <h1>{{ plan.custom }}</h1>
                            <template v-if="plan.price">
                                <h1 v-if="currentId == 1" class="d-flex align-items-end justify-content-center"><span>${{
                                        formatPrice(plan.price)
                                    }} </span><span class="fs-5 pb-2">/mo</span></h1>
                                <h1 v-else class="d-flex align-items-end justify-content-center">
                                    <span>${{ formatPrice(plan.price * 12) }} </span><span class="fs-5 pb-2">/yr</span>
                                </h1>
                            </template>
                            <p class="pt-2">{{ plan.slug }}</p>
                        </div>
                        <div class="py-3 text-center">
                            <h4>{{ plan.plus }}</h4>
                        </div>
                        <div class="plan-goal px-2 ">
                            <template v-for="list in plan.keyBenefit" key="planList">
                                <div class="d-flex align-content-center">
                                    <img src="/img/bullet.png" alt="bullet" class="mt-1" width="20" height="20">
                                    <p class="px-2"> {{ list }}</p>
                                </div>
                            </template>
                        </div>
                        <div class=" align-self-center mt-auto col-10 col-xxl-8 mx-auto pt-3">
                            <button class="btn btn-secondary-2 col-12" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop" type="button">{{ plan.btn }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="col-xxl-10 mx-auto">
            <div class="call-to-action p-xxl-5 p-3 text-center">
                <h4 class="fw-normal px-1 fs-xl-5 px-xxl-3">Connect to know more about our customised services covering
                    Strategic or
                    Business Finance,
                    Finance Transformation, Analytics, Automation and Outsourced Finance Processes.
                </h4>
                <div class=" align-self-center mt-auto pt-3 col-10 col-xxl-4 col-xl-4 col-lg-6 mx-auto ">
                    <button class="btn btn-secondary-2 col-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            type="button">Know More
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid contact-footer-2">
        <div class="container py-5 my-4">
            <div class="row justify-content-evenly">
                <div class="col-lg-5 text-light">
                    <p><b>About Us</b></p>
                   <i> ValueXPA is a Global technology-enabled Finance-as-a-Service Partner for Small and Mid-sized
                            Businesses and Institutions. We help organizations with critical Management Decisions,
                            Financial/operational reporting and insights, Advanced Analytics & Automation and Finance
                            Processes Managed Services</i>
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
                        <p><a class="py-3 text-light" href="/Planing-and-Analysis-Made-Minimal">Extended Planning and
                            Analysis</a></p>
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
</template>

<script>
import Footer from "../components/Footer";
import Form from "vform";
import axios from "axios";

export default {
    name: "pricing",
    components: {
        Footer
    },
    data() {
        return {
            form : {
                first_name: null,
                industry: 'Select Your Industry',
                last_name: null,
                company_name: null,
                email: null,
                phone: null,
                employees: 'Self-employed',
                revenue: 'Select estimated annual revenue',
            },
            priceLog: [
               

                {
                    type: 'Growth',
                    price: 999,
                    slug: 'Businesses with Revenue US$1-2m',
                    plus: 'STANDARD+',
                    keyBenefit: [
                        'Board Deck and Metrics Scorecard Report',
                        'Sales Channel ROI Analysis Model',
                        'Customer Cohort Analysis Model ',
                        'Financial Model Update - Monthly',
                    ],
                    btn: 'Get Started'
                },

                {
                    type: 'Scale',
                    price: 2199,
                    slug: 'Businesses with Revenue US$2-5m',
                    plus: 'GROWTH+',
                    keyBenefit: [
                        'Management Valuation Analysis Model',
                        'Investor Executive Summary Report of your Business'
                    ],
                    btn: 'Get Started'
                },

                {
                    type: 'Custom',
                    custom: 'Custom Pricing',
                    slug: 'Businesses with Revenue over US$5m',
                    keyBenefit: [
                        'Customised and Advisory Services ',
                        'Scenario Modelling - Bottom-up Analysis based on Base Financial Model',
                        'Market Sizing Summary Report',
                        'CFO Insights Summary Report for Management Decision-making',
                    ],
                    btn: 'Know More'
                }
            ],

            planBtn: [
                {
                    id: '1',
                    plan: 'Monthly',
                },
                {
                    id: '2',
                    plan: 'Annually',

                },
            ],

            currentId: '1',
            empty: ''
        }
    },


    methods: {
        toggleOnTop(id) {
            this.currentId = id;
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace('.', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },

        onSubmit() {
                axios.post('/notification', this.form)
                alert('Request sent Successfully');
                this.$router.push('/pricing')
        }
    },

}
</script>

<style scoped>
.btn-secondary-2 {
    background-color: #174684 !important;
    color: #fff !important;
    border-radius: 0;
    padding: 15px 20px 15px 20px !important;
    text-transform: uppercase;
}

.btn-secondary-2:hover {
    background-color: #316ebe !important;
    color: #fff !important;
    border-radius: 0;
    padding: 15px 20px 15px 20px !important;
    text-transform: uppercase;
}

.price-card {
    transition: outline 0.2s linear;
    border-radius: 10px;
    outline: solid 0px #ffffff;
    cursor: pointer;
}

.price-card:hover {
    outline: solid 1px #174684;
}

.call-to-action {
    background-color: #C6D8EF;
}

.btn-light-blue {
    background-color: #C6D8EF !important;
    color: #174684 !important;
    border-radius: 0;
    padding: 15px 20px 15px 20px !important;
    text-transform: uppercase;
}

input:focus, button:focus, select:focus {
    box-shadow: none;

}
</style>

