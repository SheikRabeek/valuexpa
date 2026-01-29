<template lang="">
    <div>
        <div class="container py-5 pt-5 log-in">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-5 contact-form p-2">
                    <h5 class="py-2"><b>Register an Account</b></h5>
                    <form class="row g-3 p-2">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="name"
                                class="form-control"
                                id="name"
                                placeholder="enter name"
                                v-model="form.name"
                            />
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="enter email"
                                v-model="form.email"
                            />
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label"
                                >password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                placeholder="enter password"
                                v-model="form.password"
                            />
                        </div>
                        <div class="col-md-12">
                            <label for="confirmed_password" class="form-label"
                                >confirm password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="enter password"
                                v-model="form.password_confirmation"
                            />
                        </div>
                        <div class="col-12">
                            <button
                                type="submit"
                                @click.prevent="saveform"
                                class="btn btn-secondary-2">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
        };
    },

    methods: {
        saveform() {
            console.log('clicked')
            axios
                .post("/api/register", this.form)
                .then(() => {
                    alert("User Registered Successfully"); 
                     this.$router.push({name: "Login"}) 
                })
                
                .catch((error) => {
                   alert(error.response.data.errors);
                });
        },
    },
};
</script>
<style lang=""></style>
