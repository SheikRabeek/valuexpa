<template lang="html">
    <div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title color-blue" id="offcanvasExampleLabel">ValueXPA</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body  col-12">
                <ul class="navbar-nav">
                    <li class="nav-item py-3"><a class="py-3" href="/Planing-and-Analysis-Made-Minimal"><b>Extended
                        Planning and Analysis</b></a></li>
                    <li class="nav-item py-3"><a class="py-3"
                                                 href="/Analytical-Process-Automation-and-Business-Intelligence"><b>Advanced
                        Analytics and Business Intelligence</b></a></li>
                    <li class="nav-item py-3"><a class="py-3" href="/Finance-Processes-Managed-Services"><b>Finance
                        Processes Managed Services</b></a></li>
                          <li class="nav-item py-3"><a class="py-3" href="/Supply-Chain-Value-Leakage-Diagnostic"><b>Supply Chain Value Leakage Diagnostic</b></a></li>
                        <!-- <li class="nav-item py-3"><a class="py-3" href="https://www.valuexpa.com/energy/"><b> Energy and Renewables Focus</b></a></li> -->
                        <!-- <li class="nav-item py-3"><a class="py-3" href="https://www.valuexpa.com/generative-ai-for-finance/"><b>Generative AI For Finance</b></a></li> -->

                    <li class="nav-item py-3"><a href="/insights/insights.php"><b>Insights</b></a></li>
                    <li class="nav-item py-3"><a href="/case-studies"><b>Case Studies</b></a></li>


                     <li class="nav-item py-3"><a href="/pricing"><b>Pricing</b></a></li>

                    <li class="nav-item py-3"><a href="https://www.valuexpa.com/FAQs/"><b>FAQs</b></a></li>
                     <li class="nav-item py-3 "><a href="/careers"><b>Careers</b></a></li>
                     <li class="nav-item py-3 "><a href="/about-us"><b>About Us</b></a></li>
                     <li class="nav-item py-3"><a href="/contact-us"><b>Contact Us</b></a></li>


                </ul>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg">
            <div class="container ">
                <span class="navbar-toggler-icon px-3 toggle-2" type="button" data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></span>
                <router-link class="navbar-brand text-light px-2" :to="{name: 'home'}"><img src="/img/logo.png"
                                                                                            width="150" alt="...">
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" @click="shownav"></span>
                </button>
                <div class="collapse navbar-collapse" :class="{show}" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light px-2" href="#" id="navbarDropdownMenuLink"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                What we do
                            </a>
                            <ul class="dropdown-menu p-2" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <router-link class="dropdown-item py-2" :to="{name: 'serviceone'}"
                                                 @click="closenav">Extended Planning and Analysis
                                    </router-link>
                                </li>
                                <li>
                                    <router-link class="dropdown-item py-2" :to="{name: 'servicetwo'}"
                                                 @click="closenav">Advanced Analytics and Business Intelligence
                                    </router-link>
                                </li>
                                <li>
                                    <router-link class="dropdown-item py-2" :to="{name: 'servicethree'}"
                                                 @click="closenav">Finance Processes Managed Services
                                    </router-link>
                                </li>

                                 <li>
                                    <a class="dropdown-item py-2" href="/Supply-Chain-Value-Leakage-Diagnostic">
                                   Supply Chain Value Leakage Diagnostic
                                    </a>
                                </li>
                                  <!-- <li>
                                    <a class="dropdown-item py-2" href="https://www.valuexpa.com/energy/">
                                        Energy and Renewables Focus
                                    </a>
                                </li> -->


                                <!-- <li>
                                    <a class="dropdown-item py-2" href="https://www.valuexpa.com/generative-ai-for-finance/">
                                        Generative AI For Finance
                                    </a>
                                </li> -->


                            </ul>
                        </li>
                        <li class="nav-item  px-2">
                            <router-link class="nav-link text-light" :to="{name: 'about'}" @click="closenav">About Us
                            </router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light px-2" href="#" id="navbarDropdownMenuLink"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu p-2" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item py-2" href="insights/insights.php">
                                        Insights
                                    </a>
                                </li>

                                <li>
                                    <router-link class="dropdown-item py-2" :to="{name: 'casestudy'}" @click="closenav">
                                        Case Studies
                                    </router-link>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item  px-2">
                            <router-link class="nav-link text-light" :to="{name: 'pricing'}" @click="closenav">Pricing
                            </router-link>
                        </li>
                        <li class="nav-item  px-2">
                            <router-link class="nav-link text-light" :to="{name: 'careers'}" @click="closenav">Careers
                            </router-link>
                        </li>
                        <li class="nav-item  px-2">
                            <router-link class="nav-link text-light" :to="{name: 'contact'}" @click="closenav">Contact
                                Us
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
<script>

export default {
    data() {
        return {
            show: false
        }
    },

    methods: {
        shownav() {
            this.show = true
            this.$gtag.event('latest-release-click', {
                'event_category': 'docs',
                'event_label': 'Latest Release btn clicked',
                'value': 1
            })
        },

        track() {
            this.$gtag.pageview({page_path: '/'})

            this.$gtag.pageview('/')

            this.$gtag.pageview(this.$route)
        },

        closenav() {
            this.show = false
        }
    },
}
</script>
<style lang="">

</style>
