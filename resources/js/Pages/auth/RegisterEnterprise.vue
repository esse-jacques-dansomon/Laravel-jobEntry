<template>
    <div class="justify-content-center">
        <div class="">
            <div class="card">
                <Breadcrumb title="Register as Enterprise"/>

                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" v-model="description"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-end">Logo</label>
                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" @change="onFileChange">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" v-model="website" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">Register Enterprise</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumb from "../components/Breadcrumb.vue";

export default {
    components: {Breadcrumb},
    data() {
        return {
            name: '',
            email: '',
            description: '',
            logo: null,
            website: '',
            password: '',
            password_confirmation: ''
        };
    },
    methods: {
        onFileChange(e) {
            this.logo = e.target.files[0];
        },
        submitForm() {
            if (!this.name || !this.email || !this.description || !this.logo || !this.website || !this.password || !this.password_confirmation) {
                alert('Please fill in all fields');
                return;
            }

            if (this.password !== this.password_confirmation) {
                alert('Passwords do not match');
                return;
            }

            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('email', this.email);
            formData.append('description', this.description);
            formData.append('logo', this.logo);
            formData.append('website', this.website);
            formData.append('password', this.password);
            formData.append('password_confirmation', this.password_confirmation);

            // Replace '/enterprise' with the actual endpoint for registering an enterprise
            axios.post('/enterprise', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response);
                    // Handle success
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        }
    }
};
</script>


<style scoped>

</style>
