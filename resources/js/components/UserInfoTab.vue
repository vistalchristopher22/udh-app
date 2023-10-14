<template>
  <div>
    <div class="row d-flex align-items-top justify-content-around">
      <div class="col-lg-8">
        <div class="row">
          <div class="card rounded-0  border-right-0">
            <div class="card-header">
              <h4 class="card-title">Personal Information</h4>
            </div>

            <div class="text-center p-3"
              v-if="details.employee_id == null">
              <div class="spinner-border text-info"
                role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div class="card-body"
              v-else>
              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Employee ID</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text"
                    disabled
                    v-model="details.employee_id">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Firstname</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text"
                    v-model="details.first_name">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Middlename</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text"
                    v-model="details.middle_name">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Lastname</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text"
                    v-model="details.last_name">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Suffix</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    v-model="details.suffix"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Phone Number</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    v-model="details.phone_number"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Address</label>
                <div class="col-lg-10">
                  <textarea class="form-control"
                    v-model="details.address"
                    type="text"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Active Status</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    v-model="details.active_status"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Account Role</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Image</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="file">
                </div>
              </div>

            </div>

            <div class="card-footer text-end">
              <button class="btn btn-soft-success"
                @click="updatePersonalInformation">Update</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="row">
          <div class="card rounded-0 ">
            <div class="card-header">
              <h4 class="card-title">Account Information</h4>
            </div>
            <div class="text-center p-3"
              v-if="details.employee_id == null">
              <div class="spinner-border text-info"
                role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div class="card-body"
              v-else>
              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Email</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    v-model="details.email"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Password</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    v-model="details.password"
                  type="password">
                </div>
              </div>
            </div>

            <div class="card-footer">
              <div class="text-end">
                <button class="btn btn-soft-success" @click.prevent="updateAccountInformation">Update</button>
              </div>
            </div>

          </div>

          <div class="card rounded-0 ">
            <div class="card-header">
              <h4 class="card-title">Position Information</h4>
            </div>
            <div class="text-center p-3"
              v-if="details.employee_id == null">
              <div class="spinner-border text-info"
                role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div class="card-body"
              v-else>
              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Name</label>
                <div class="col-lg-9">
                  <select class="form-select"
                    @change="changePosition(this)"
                    disabled
                    v-model="details.position">
                    <option value=""
                      selected
                      disabled></option>
                    <option :value="position.id"
                      v-for="position in positions"
                      :key="position.id">
                      {{ position.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Description</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    readonly
                    :value="details?.position_detail?.description"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Office</label>
                <div class="col-lg-9">
                  <select class="form-select"
                    disabled
                    v-model="details.office">
                    <option value=""
                      selected
                      disabled></option>
                    <option :value="office.id"
                      v-for="office in offices"
                      :key="office.id">
                      {{ office.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">SG / Step</label>
                <div class="col-lg-4">
                  <div class="col-lg-9">
                    <input class="form-control"
                      readonly
                      :value="details?.position_detail?.salary_grade"
                      type="text">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="col-lg-9">
                    <input class="form-control"
                      readonly
                      :value="details?.position_detail?.step"
                      type="text">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Work Status</label>
                <div class="col-lg-9">
                  <select v-model="details.work_status" 
                    disabled
                    name=""
                    id=""
                    class="form-select">
                    <option value="Full-time">Full-Time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Job Order">Job Order</option>
                    <option value="Contract of Service">Contract of Service</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-end">
                <button class="btn btn-soft-success ">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { watchEffect, ref, onMounted  } from 'vue';
import { Notyf } from 'notyf';


export default {
    props : {
        details : {
            type : Object,
            required : true,
        }
    },
    setup(props, {emit}) {
        const details = ref({});
        const positions = ref([]);
        const offices = ref([]);

        const notyf = new Notyf();

        let fetchPositions = () => {
            axios('/api/positions').then((response) => {
                positions.value = response.data;
            });
        };

        let fetchOffices = () => {
          axios(`/api/offices`).then((response) => {
              offices.value = response.data;
          });
        };

        let changePosition = () => {
          let [selectedPosition] = positions.value.filter((position) => position.id == details.value.position);
          details.value.position_detail = selectedPosition;
        };

        let updatePersonalInformation = () => {
          axios.post(`/api/profile/personal-information`, details.value)
                .then((response) => {
                  if(response.status === 200) {
                    notyf.success('Updated Successfully!');
                  }
                }).catch(err => { 
                  console.log(err);
                });
        };

        let updateAccountInformation = () => {
          axios.post(`/api/profile/account-information`, {
            id : props.details.id,
            email : details.value.email,
            password : details.value.password,
          }).then((response) => {
            if(response.status === 200) {
              notyf.success('Updated Successfully!');
            }
          }).catch(err => console.log(err));
        };
        
        watchEffect(() => {
          Object.assign(details.value, props.details.information);
          details.value.password = null;
        });
        
        onMounted(() => {
            fetchOffices();
            fetchPositions();
        });

        return {
            details,
            offices,
            positions,
            changePosition,
            updatePersonalInformation,
            updateAccountInformation,
        }
     },
};
</script>
  