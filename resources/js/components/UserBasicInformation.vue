<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="dastone-profile">
          <div>
            <div class="text-center"
              v-if="information?.first_name == null">
              <div class="spinner-border text-info"
                role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div v-else>
              <div class="row">
                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                  <div class="dastone-profile-main">
                    <div class="dastone-profile-main-pic">
                      <img src="/assets/images/users/user-4.jpg"
                        alt=""
                        height="110"
                        class="rounded-circle">
                    </div>
                    <div class="dastone-profile_user-detail">
                      <h5 class="dastone-user-name">{{ information?.first_name || ''}} {{ information?.last_name || '' }}</h5>
                      <p class="mb-0 dastone-user-name-post">{{ information?.employee_id }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 ms-auto align-self-center">
                  <ul class="list-unstyled personal-detail mb-0">
                    <li class="">
                      Phone Number : <span class="fw-bold">{{ information?.phone_number }}</span>
                    </li>
                    <li class="mt-2">
                      Email : <span class="fw-bold">{{ information?.email }}</span>
                    </li>
                    <li class="mt-2">
                      Address : <span class="fw-bold">{{ information?.address }}</span>
                    </li>
                  </ul>

                </div>

                <div class="col-lg-4 ms-auto align-self-center">
                  <ul class="list-unstyled personal-detail mb-0">
                    <li class="">
                      Joined At : <span class="fw-bold">{{ information?.created_at }}</span>
                    </li>
                    <li class="mt-2">
                      Office : <span class="fw-bold">{{ information?.office_detail.name }}</span>
                    </li>
                    <li class="mt-2">
                      Position : <span class="fw-bold">{{ information?.position_detail.name }}</span>
                    </li>
                  </ul>
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
        const information = ref({});

        watchEffect(() => {
            information.value = props.details.information;
        });

        return {
            information
        }
     },
};
</script>
  

