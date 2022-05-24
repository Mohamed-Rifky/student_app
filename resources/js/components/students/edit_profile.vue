<template>
    <div class="card">
        <div class="card-body">
            <div class="loading" v-if="loading">
                <img src="images/loading.gif" alt="">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>My Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right"> Email</label>
                        <div class="col-md-6">
                            <input id="email" type="text" readonly
                                   class="form-control" v-model="student_data.email" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right"> Registration No</label>
                        <div class="col-md-6">
                            <input id="reg_no" type="text" readonly
                                   class="form-control" v-model="student_data.reg_no" autocomplete="off">
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
                    <div class="form-group row d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" @click="updateProfile">Update Profile</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <img :src="student_data.image_path" :style="[student_data.has_image  ? {'width' : '50%'} : {'width': '80%'}]" class="img-fluid" style="width: 50%" alt="">
                    <div class="row mt-5">
                        <div class="form-group row">
                            <label for="profile"
                                   class="col-md-4 col-form-label text-md-right"> Profile Picture </label>
                            <div class="col-md-6">
                                <input type="file" class="custom-file-input" id="profile" @change="onFileChange" ref="image" accept="image/png,image/*">
                                <label class="custom-file-label" for="files">Choose File(s)</label>
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
            image : "",
            student_data: {
                user_id: "",
                email: "",
                name: "",
                address: "",
                reg_no: "",
                dob: "",
                contact_no: "",
                image_path: "",
            },

        }
    },
    mounted() {
        this.getProfile();
    },
    methods: {
        getProfile() {
            this.loading = true;
            this.searchByFilters = false;
            axios.get(flagsUrl + 'get_profile')
                .then((data) => {
                    this.student_data.name = data.data.name;
                    this.student_data.user_id = data.data.id;
                    this.student_data.address = data.data.student_profile.address;
                    this.student_data.email = data.data.email;
                    this.student_data.dob = data.data.student_profile.dob;
                    this.student_data.contact_no = data.data.student_profile.contact_no;
                    this.student_data.image_path = data.data.student_profile.image_path;
                    this.student_data.reg_no = data.data.student_profile.student_reg_no;
                })
                .catch((error) => console.log(error))
                .finally(() => {
                    this.loading = false;
                });
        },
        updateProfile(){
            this.loading = true;
            axios.post(flagsUrl + 'update_profile',this.student_data)
                .then((data) => {
                    this.getProfile();
                })
                .catch((error) => console.log(error))
                .finally(() => {
                    this.loading = false;
            });
        },
        onFileChange(e){
            this.loading = true;
            this.image = e.target.files[0]
            let formData = new FormData();
            formData.append('id', this.student_data.user_id);
            if(this.image){
                formData.append('image', this.image);
            }
            axios.post(flagsUrl + 'update_profile_picture', formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                }).then((response) => {

                })
                .finally(() => {
                    this.getProfile();
                });
        },
    },
}
</script>

<style scoped>

</style>
