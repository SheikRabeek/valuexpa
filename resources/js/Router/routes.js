import axios from "axios"

const routes = [
    {
        path: "/",
        component: () => import("../Pages/Home.vue"),
        name: "home",
    },
    {
        path: "/Planing-and-Analysis-Made-Minimal",
        component: () => import("../Pages/ServiceOne.vue"),
        name: "serviceone",
    },
    {
        path: "/Analytical-Process-Automation-and-Business-Intelligence",
        component: () => import("../Pages/ServiceTwo.vue"),
        name: "servicetwo",
    },
    {
        path: "/Finance-Processes-Managed-Services",
        component: () => import("../Pages/ServiceThree.vue"),
        name: "servicethree",
    },
    {
        path: "/about-us",
        component: () => import("../Pages/About.vue"),
        name: "about",
    },
    {
        path: "/contact-us",
        component: () => import("../Pages/ContactUs.vue"),
        name: "contact",
    },
    {
        path: "/careers",
        component: () => import("../Pages/Careers.vue"),
        name: "careers",
    },
    {
        path: "/insights",
        component: () => import("../Pages/Insight.vue"),
        name: "insights",
    },
    {
        path: "/Supply-Chain-Value-Leakage-Diagnostic",
        component: () => import("../Pages/flagship.vue"),
        name: "insights",
    },


    {
        path: "/case-studies",
        component: () => import("../Pages/CaseStudies.vue"),
        name: "casestudy",
    },
    {
        path: "/pricing",
        component: () => import("../Pages/Pricing.vue"),
        name: "pricing",
    },
    {
        path: "/login",
        component: () => import("../Pages/Login.vue"),
        name: "login",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    return next({ name: "dashboard" });
                })
                .catch(() => {
                    next();
                });
        },
    },
    {
        path: "/update-insight",
        component: () => import("../Pages/InsightUpdate.vue"),
        name: "insightupdate",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/update-career",
        component: () => import("../Pages/CareerUpdate.vue"),
        name: "careerupdate",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add-insight",
        component: () => import("../Pages/NewInsight.vue"),
        name: "newinsight",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add-career",
        component: () => import("../Pages/NewCareers.vue"),
        name: "newcareer",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/finacer-main-dashboard",
        component: () => import("../Pages/Dashboard.vue"),
        name: "dashboard",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/register",
        component: () => import("../Pages/Register.vue"),
        name: "resgister",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    return next({ name: "dashboard" });
                })
                .catch(() => {
                    next();
                });
        },
    },
    {
        path: "/insights/:slug",
        component: () => import("../Pages/insightDetails.vue"),
        name: "insight",
    },
    {
        path: "/careers/:title",
        component: () => import("../Pages/CareerDetails.vue"),
        name: "career",
    },
    {
        path: "/case-studies/:id",
        component: () => import("../Pages/CaseDetails.vue"),
        name: "casedetails",
    },
    {
        path: "/profile1",
        component: () => import("../Pages/profile1.vue"),
        name: "profile1",
    },
    {
        path: "/profile2",
        component: () => import("../Pages/profile2.vue"),
        name: "profile2",
    },
    {
        path: "/profile3",
        component: () => import("../Pages/profile3.vue"),
        name: "profile3",
    },
    {
        path: "/profile4",
        component: () => import("../Pages/profile4.vue"),
        name: "profile4",
    },
    {
        path: "/finnacer-users",
        component: () => import("../Pages/finnacer-users.vue"),
        name: "finnacer-users",
    },
    {
        path: "/publication/:slug",
        component: () => import("../Pages/Publication.vue"),
        name: "publication",
    },
    {
        path: "/terms",
        component: () => import("../Pages/Terms.vue"),
        name: "terms",
    },
    {
        path: "/privacy",
        component: () => import("../Pages/Privacy.vue"),
        name: "privacy",
    },
    {
        path: "/update-publication",
        component: () => import("../Pages/PublicationUpdate.vue"),
        name: "publicationupdate",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add-publication",
        component: () => import("../Pages/NewPublication.vue"),
        name: "newpublication",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/view-form-publication",
        component: () => import("../Pages/FormPublications.vue"),
        name: "formpublication",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/view-form-contact",
        component: () => import("../Pages/FormContacts.vue"),
        name: "formcontact",
        beforeEnter: (to, from, next) => {
            axios
                .get("/api/athenticated")
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    }
];

export default routes;
