<script setup>
import {defineProps} from 'vue'
import {Link} from "@inertiajs/vue3";
import Breadcrumb from "../components/Breadcrumb.vue";
import JobCard from "../components/JobCard.vue";

const props = defineProps({
    job: Object
})
</script>

<template>
    <Breadcrumb title="Job Seekers"/>

    <JobCard :job="job"/>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Applicants</b></h2>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
            <span class="custom_checkbox">
              <input type="checkbox" id="selectAll"><label for="selectAll"></label>
            </span>
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Cv</th>
                    <th>Portfolio</th>
                    <th>Photo</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(applicant, index) in job.applicants">
                    <td>
                        <span class="custom_checkbox">
                          <input type="checkbox" :id="applicant.id" name="options[]" :value="applicant.id">
                          <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td>{{applicant.user.email}}</td>
                    <td>
                        <Link  :href="`/storage/${applicant.cv}`" target="_blank">Download</Link>
                    </td>
                    <td>
                        <Link  :href="`/storage/${applicant.portfolio}`" target="_blank">Portfolio</Link>
                    </td>
                    <td>
                        <img :src="`/storage/${applicant.photo}`" :alt="applicant.user.name">
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</template>

<style scoped>

.table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px 0;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.table-title {
    padding-bottom: 15px;
    background: #a2d8ff;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}

.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}

.table-title .btn-group {
    float: right;
}

.table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}

.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}

.table-title .btn span {
    float: left;
    margin-top: 2px;
}

table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}

table.table tr th:first-child {
    width: 60px;
}

table.table tr th:last-child {
    width: 100px;
}

table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}

table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}

table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}

table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}

table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
    outline: none !important;
}

table.table td a:hover {
    color: #2196F3;
}

table.table td a.edit {
    color: #FFC107;
}

table.table td a.delete {
    color: #F44336;
}

table.table td i {
    //font-size: 19px;
}

table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}

/* Custom checkbox */
.custom_checkbox {
    position: relative;
}

.custom_checkbox input[type="checkbox"] {
    opacity: 0;
    position: absolute;
    margin: 5px 0 0 3px;
    z-index: 9;
}

.custom_checkbox label:before {
    width: 18px;
    height: 18px;
}

.custom_checkbox label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: text-top;
    background: white;
    border: 1px solid #bbb;
    border-radius: 2px;
    box-sizing: border-box;
    z-index: 2;
}

.custom_checkbox input[type="checkbox"]:checked + label:after {
    content: '';
    position: absolute;
    left: 6px;
    top: 3px;
    width: 6px;
    height: 11px;
    border: solid #000;
    border-width: 0 3px 3px 0;
    transform: inherit;
    z-index: 3;
    transform: rotateZ(45deg);
}

.custom_checkbox input[type="checkbox"]:checked + label:before {
    border-color: #03A9F4;
    background: #03A9F4;
}

.custom_checkbox input[type="checkbox"]:checked + label:after {
    border-color: #fff;
}

.custom_checkbox input[type="checkbox"]:disabled + label:before {
    color: #b8b8b8;
    cursor: auto;
    box-shadow: none;
    background: #ddd;
}
</style>
