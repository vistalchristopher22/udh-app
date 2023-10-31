<template>
  <div>
    <div class="card rounded-0 shadow-sm">
      <div class="card-header">
        <div class="card-title">
          Profile
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <BasicInformation :details="information" />
          </div>
        </div>

        <div class="pb-4">
          <ul class="nav-border nav nav-pills mb-0" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link " data-bs-toggle="pill" href="#Profile_Project">Files</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="pill" href="#Profile_Post">Personal Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#Profile_ActivityLog">Activities</a>
            </li>
          </ul>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="Profile_Project" role="tabpanel" aria-labelledby="Profile_Project_tab">
                <UserFileTab />
              </div>

              <div class="tab-pane fade show active" id="Profile_Post" role="tabpanel">
                <UserInfo :details="information" @update="updateBasicInformation" />
              </div>

              <div class="tab-pane fade" id="Profile_ActivityLog" role="tabpanel">
                <UserActivityLog :id="information.id" />
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import BasicInformation from './UserBasicInformation.vue'
import UserFileTab from './UserFileTab.vue'
import UserInfo from './UserInfoTab.vue';
import UserActivityLog from './UserLogTab.vue'

import { onMounted, ref } from "vue";

export default {
  props: {
    id: {
      type: Number,
      required: true,
    }
  },
  components: {
    BasicInformation,
    UserFileTab,
    UserInfo,
    UserActivityLog,
  },
  setup(props) {
    const information = ref({});
    const fetch = async () => {
      try {
        const response = await axios.get(`/api/profile/${props.id}`);
        information.value = response.data;
      } catch (error) {
        console.error(error);
      }
    };

    const updateBasicInformation = (data) => {
      information.value.information.first_name = data.first_name;
      information.value.information.middle_name = data.middle_name;
      information.value.information.last_name = data.last_name;
      information.value.information.suffix = data.suffix;
      information.value.information.email = data.email;
      information.value.information.address = data.address;
      information.value.information.phone_number = data.phone_number;
    };

    onMounted(() => fetch());

    return {
      information,
      updateBasicInformation
    }
  },
};
</script>
  