<template>
    <div class="alert alert-danger" v-if="errors.message">
        {{ errors.message }}
    </div>

    <div class="alert alert-primary" v-else-if="!errors.message">
        Before proceeding to other features of the system, you must set up your account first.
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Complete your account's profile</div>
        </div>
        <div class="card-body">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link fw-medium" style="cursor:pointer;" :class="{ active: step === 1 }"
                        @click="changeStep(1)">Account Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" style="cursor:pointer;" :class="{ active: step === 2 }"
                        @click="changeStep(2)">Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" style="cursor:pointer;" :class="{ active: step === 3 }"
                        @click="changeStep(3)">Work Information</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <form @submit.prevent="submitForm">
                <div v-if="step === 1">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email:</label>
                            <input type="text" id="email" readonly class="form-control"
                                :class="errors.errors?.email ? 'is-invalid' : ''" v-model="user.email" />
                            <span class="text-danger" v-if="errors.errors?.email">{{ errors.errors?.email[0] }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-dark">Password:</label>
                            <input type="password" id="password" class="form-control"
                                :class="errors.errors?.password ? 'is-invalid' : ''" v-model="user.password" />
                            <span class="text-danger" v-if="errors.errors?.password">{{
                                errors.errors?.password[0]
                            }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-dark">Confirm Password:</label>
                            <input type="password" id="password_confirmation" class="form-control"
                                :class="errors.errors?.password ? 'is-invalid' : ''" v-model="user.password_confirmation" />
                            <span class="text-danger" v-if="errors.errors?.password">{{
                                errors.errors?.password[0]
                            }}</span>
                        </div>
                    </div>
                </div>
                <div v-if="step === 2">
                    <div class="p-3">

                        <!-- Employee ID -->
                        <div class="mb-3">
                            <label for="employee_id" class="form-label text-dark">Employee ID:</label>
                            <input type="text" id="employee_id" v-model="user.employee_id"
                                :class="errors.errors?.employee_id ? 'is-invalid' : ''" class="form-control" required />
                            <span class="text-danger" v-if="errors.errors?.employee_id">{{
                                errors.errors?.employee_id[0]
                            }}</span>
                        </div>

                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label text-dark">First Name:</label>
                            <input type="text" id="first_name" v-model="user.first_name"
                                :class="errors.errors?.first_name ? 'is-invalid' : ''"
                                class="form-control text-uppercase" />
                            <span class="text-danger" v-if="errors.errors?.first_name">{{
                                errors.errors?.first_name[0]
                            }}</span>

                        </div>

                        <!-- Middle Name -->
                        <div class="mb-3">
                            <label for="middle_name" class="text-dark">Middle Name:</label>
                            <input type="text" id="middle_name" v-model="user.middle_name"
                                :class="errors.errors?.middle_name ? 'is-invalid' : ''"
                                class="form-control text-uppercase" />
                            <span class="text-danger" v-if="errors.errors?.middle_name">{{
                                errors.errors?.middle_name[0]
                            }}</span>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label text-dark">Last Name:</label>
                            <input type="text" id="last_name" v-model="user.last_name"
                                :class="errors.errors?.last_name ? 'is-invalid' : ''" class="form-control text-uppercase" />
                            <span class="text-danger" v-if="errors.errors?.last_name">{{
                                errors.errors?.last_name[0]
                            }}</span>
                        </div>

                        <!-- Suffix -->
                        <div class="mb-3">
                            <label for="suffix" class="text-dark">Suffix:</label>
                            <input type="text" id="suffix" v-model="user.suffix"
                                :class="errors.errors?.suffix ? 'is-invalid' : ''" class="form-control text-uppercase" />
                            <span class="text-danger" v-if="errors.errors?.suffix">{{ errors.errors?.suffix[0] }}</span>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email:</label>
                            <input type="email" id="email" v-model="user.email"
                                :class="errors.errors?.email ? 'is-invalid' : ''" class="form-control" required />
                            <span class="text-danger" v-if="errors.errors?.email">{{ errors.errors?.email[0] }}</span>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label text-dark">Phone Number:</label>
                            <input type="text" id="phone_number" v-model="user.phone_number"
                                :class="errors.errors?.phone_number ? 'is-invalid' : ''" class="form-control" />
                            <span class="text-danger" v-if="errors.errors?.phone_number">{{ errors.errors?.phone_number[0]
                            }}</span>
                        </div>


                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label text-dark">Address:</label>
                            <textarea id="address" v-model="user.address"
                                :class="errors.errors?.address ? 'is-invalid' : ''"
                                class="form-control text-uppercase"></textarea>
                            <span class="text-danger" v-if="errors.errors?.address">{{
                                errors.errors?.address[0]
                            }}</span>
                        </div>

                    </div>
                </div>
                <div v-if="step === 3">
                    <div class="p-3">
                        <!-- Position -->
                        <div class="mb-3">
                            <label for="position" class="form-label text-dark">Position:</label>
                            <select id="position" v-model="user.position"
                                :class="errors.errors?.position ? 'is-invalid' : ''" class="form-control">
                                <option v-for="position in positions" :key="position.id" :value="position.id">
                                    {{ position.name }}
                                </option>
                            </select>
                            <span class="text-danger" v-if="errors.errors?.position">{{
                                errors.errors?.position[0]
                            }}</span>
                        </div>

                        <!-- Office -->
                        <div class="mb-3">
                            <label for="office" class="form-label text-dark">Office:</label>
                            <select id="office" v-model="user.office" class="form-control"
                                :class="errors.errors?.office ? 'is-invalid' : ''">
                                <option v-for="office in offices" :key="office.id" :value="office.id">{{ office?.name }}
                                    - {{
                                        office?.code?.toUpperCase()
                                    }}
                                </option>
                            </select>
                            <span class="text-danger" v-if="errors.errors?.office">{{ errors.errors?.office[0] }}</span>
                        </div>

                        <!-- Work Status -->
                        <div class="mb-3">
                            <label for="work_status" class="form-label text-dark">Work Status:</label>
                            <input type="text" id="work_status" v-model="user.work_status"
                                class="form-control text-uppercase"
                                :class="errors.errors?.work_status ? 'is-invalid' : ''" />
                            <span class="text-danger" v-if="errors.errors?.work_status">{{
                                errors.errors?.work_status[0]
                            }}</span>
                        </div>

                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mb-3 float-end">
                    <button type="button" @click="prevStep" :disabled="step === 1" class="btn btn-soft-warning">
                        Previous
                    </button>
                    <button type="button" @click="nextStep" v-if="step !== 3" class="btn btn-soft-primary mx-2">Next
                    </button>
                    <button type="submit" v-if="step === 3" class="btn btn-soft-success mx-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { watchEffect, ref, onMounted } from "vue";
import { Notyf } from 'notyf';
import * as url from "url";

export default {
    props: {
        user: {
            required: true,
            type: Object,
        }
    },
    setup(props) {
        const notyf = new Notyf();
        const step = ref(1);
        const offices = ref([]);
        const positions = ref([]);
        const errors = ref([]);
        const user = ref({
            id: "",
            email: "",
            password: "",
            password_confirmation: "",
            employee_id: "",
            first_name: "",
            middle_name: "",
            last_name: "",
            suffix: "",
            phone_number: "",
            office: "",
            address: "",
            position: "",
            work_status: "",
        });

        watchEffect(() => {
            if (props.user) {
                user.value.email = props.user.email;
                user.value.id = props.user.id;
            }
        });

        const nextStep = () => {
            if (step.value < 3) {
                step.value++;
            }
        };

        const prevStep = () => {
            if (step.value > 1) {
                step.value--;
            }
        };

        const changeStep = (newStep) => {
            step.value = newStep;
        };

        const submitForm = () => {
            axios.post(`account-setup`, user.value).then((response) => {
                if (response.status === 200) {
                    errors.value = [];
                    user.value = {};
                    notyf.success('Account setup successfully, Please wait while finishing some thing up!');
                    setTimeout(() => location.reload(), 1500);
                }
            }).catch(e => {
                errors.value = e.response.data;
            });
        };


        onMounted(() => {
            axios.get('/api/offices').then((response) => offices.value = response.data);
            axios.get('/api/positions').then((response) => positions.value = response.data);
        });

        return {
            user,
            step,
            offices,
            positions,
            errors,
            nextStep,
            prevStep,
            submitForm,
            changeStep,
        };
    },
};
</script>

<style scoped>
.form-label:after {
    content: " *";
    color: red;
}
</style>
