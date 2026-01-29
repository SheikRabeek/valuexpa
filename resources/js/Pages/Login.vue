<template>
    <div>
        <div class="container py-5 pt-5 log-in">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-5 contact-form p-2">
                    <h5 class="py-2"><b>Login to Your Account</b></h5>
                    <form class="row g-3 p-2">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="enter email" v-model="form.email">
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" placeholder="enter password" v-model="form.password">
                        </div>
                        <div class="col-12">
                            <button type="submit" value="submit" @click.prevent="loginUser" class="btn btn-secondary-2">Login user</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios"
export default {
    data() {
        return {
            form:{
                email: '',
                password: ''
            }
        }
    },

    methods: {
        loginUser(){
            axios.post('/api/login', this.form).then((res)=>{
                alert( res.data.message );

                if ( res.data.success )
                    this.$router.push({name: "dashboard"});
            })
            .catch(()=>{
                console.log(error.response.data)
            });
        }
    }
}
</script>
<style lang="">

</style>
