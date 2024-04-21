<template>
    <div class="container">
        <div class="d-flex row justify-content-center align-content-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" v-model="remember">
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';

export default {

    setup() {
        const email = ref('');
        const password = ref('');
        const remember = ref(false);

        const submitForm = async () => {
            const formData = new FormData();
            formData.append('email', email.value);
            formData.append('password', password.value);
            formData.append('remember', remember.value ? 'on' : '');

            try {
                const response = await axios.post('/login', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log(response);
                // Handle success, e.g., redirect to dashboard
            } catch (error) {
                console.error(error);
                // Handle error, e.g., show error message
            }
        };

        return {
            email,
            password,
            remember,
            submitForm
        };
    }
};
</script>
