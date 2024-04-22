<template>
    <div class="container h-100" id="login">
        <div class="d-flex row justify-content-center align-content-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body my-5">
                        <form @submit.prevent="login">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="form.email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="current-password">
                                </div>
                            </div>
<!--                            ERRORS-->
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div v-if="form.errors.email" class="alert alert-danger" role="alert">
                                        <strong>{{ form.errors.email }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 ">
                                <div class="offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {usePage} from "@inertiajs/vue3";

const form = useForm({
    email:"",
    password:""
})

const login = () => {
    form.post('/login');
}
</script>

<script>
export default {
    layout: null ,
}
</script>

<style scoped>
#login {
    height: 100vh !important;
}
</style>

