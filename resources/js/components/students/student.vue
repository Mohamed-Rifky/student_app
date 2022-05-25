<template>
    <div class="card">
        <div class="card-body">
            <div class="loading" v-if="loading">
                <img src="images/loading.gif" alt="">
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" value="" name="search" placeholder="Search Student"
                               aria-label="Search Student" aria-describedby="Search Student" @input="search"
                               class="form-control" autocomplete="off" v-model="search_data">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-group" role="group" aria-label="Action Buttons">
                        <button type="button" class="btn btn-primary float-right" @click="search">Search Student
                        </button>
                        <button type="button" class="btn btn-danger float-right" @click="addStudentModal">Add Student
                        </button>
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Reg No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>DOB</th>
                                <th>Contact No</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(student,key) in students.data">
                                <td> {{ key + 1 }}</td>
                                <td> {{ student.student_profile.student_reg_no }}</td>
                                <td>{{ student.name }}</td>
                                <td> {{ student.student_profile.address }}</td>
                                <td> {{ student.student_profile.dob }}</td>
                                <td> {{ student.student_profile.contact_no }}</td>
                                <td><img :src="student.student_profile.image_path"
                                         :style="[student.student_profile.has_image  ? {'width' : '50%'} : {'width': '20%'}]"
                                         class="img-fluid" alt=""></td>
                            </tr>
                            <tr v-if="students.hasOwnProperty('data') && students.data.length === 0  && !loading">
                                <td colspan="8" class="text-center h4">No Students Found</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <pagination :data="students" :limit="2" v-if="searchByFilters"
                                    @pagination-change-page="search"></pagination>
                        <pagination :data="students" :limit="2" @pagination-change-page="getStudents"
                                    v-else></pagination>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="student_modal" tabindex="-1" role="dialog"
             aria-labelledby="student_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-body py-0">
                        <div class="p-2">
                            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="main-content">
                            <h5>Add Student</h5>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right"> Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control" v-model="student_data.email" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right"> Student Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control" v-model="student_data.name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right"> Student Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control" v-model="student_data.address" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right"> Student Date Of Birth</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date"
                                           class="form-control" v-model="student_data.dob" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right"> Student Contact No</label>
                                <div class="col-md-6">
                                    <input id="cno" type="text"
                                           class="form-control" v-model="student_data.contact_no" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary float-right" @click="addStudent">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Swal from "sweetalert2";

export default {
    name: "student_list",
    components: {},
    data() {
        return {
            loading: false,
            searchByFilters: false,
            students: {},
            search_data: "",
            widowName: "",
            student_data: {
                email: "",
                name: "",
                address: "",
                dob: "",
                contact_no: "",
                image_path: "",
            },

        }
    },
    mounted() {
        this.getStudents();
    },
    methods: {
        getStudents(page = 1) {
            this.loading = true;
            this.searchByFilters = false;
            axios.get(flagsUrl + 'get_students?page=' + page)
                .then((data) => {
                    this.students = data.data;
                })
                .catch((error) => console.log(error))
                .finally(() => {
                    this.loading = false;
                });
        },
        addStudent() {
            axios.post(flagsUrl + 'register_student', this.student_data)
                .then((data) => {
                    if (data.data.status === false) {
                        let html = "<div class='container small'><ul class='list-group'>";
                        $.each(data.data.error, (errorKey, errorValue) => {
                            html += "<li class='list-group-item text-left'>" + errorValue[0] + "</li>";
                        });
                        html += "</ul></div>";
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            html: html,
                        });
                    } else {
                        Swal.fire({
                            title: "Success",
                            text: "Student Added!",
                            icon: "success"
                        }).then(function () {
                            $("#student_modal").modal('hide');
                        });
                    }
                })
                .catch((error) => console.log(error))
                .finally(() => {
                    this.getStudents();
                });
        },
        addStudentModal() {
            $("#student_modal").modal('show');
        },
        search(page = 1) {
            this.searchByFilters = true;
            this.loading = true;
            axios.post(flagsUrl + 'get_students?page=' + page, {
                search: this.search_data,
            })
                .then(response => {
                    this.students = response.data;
                }).finally(() => {
                this.loading = false;
            });
        },
    },
}
</script>

<style scoped>

</style>
