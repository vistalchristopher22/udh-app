<template>
  <div>
    <div class="row">
      <div class="col-lg-8 ms-5 me-5">
        <div class="row">
          <div class="card rounded-0  border-right-0">
            <div class="card-header">
              <h4 class="card-title">Personal Information</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Employee ID</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    type="text"
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
                <label class="col-xl-2 text-start mb-lg-0 align-self-center">Email Address</label>
                <div class="col-lg-10">
                  <input class="form-control"
                    v-model="details.email"
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
              <button class="btn btn-soft-success">Update</button>
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
            <div class="card-body">
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
                    :value="null"
                    type="password">
                </div>
              </div>
            </div>
          </div>
          <div class="card rounded-0 ">
            <div class="card-header">
              <h4 class="card-title">Office Information</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Name</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Office Head</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>
              
            </div>

            <div class="card-footer">
              <div class="d-grid">
                <button class="btn btn-soft-info btn-block">View More Details</button>
              </div>
            </div>
          </div>

          <div class="card rounded-0 ">
            <div class="card-header">
              <h4 class="card-title">Position Information</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Name</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Description</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">SG / Step</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-xl-3 text-start mb-lg-0 align-self-center">Work Status</label>
                <div class="col-lg-9">
                  <input class="form-control"
                    type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { watchEffect, ref  } from 'vue';
export default {
    props : {
        details : {
            type : Object,
            required : true,
        }
    },
    setup(props) {
        const information = ref({
        });
        const details = ref({});

        
        watchEffect(() => {
          information.value = props.details.information;
          Object.assign(details.value, props.details.information);
        });

        return {
            information,
            details,
        }
     },
};
</script>
  