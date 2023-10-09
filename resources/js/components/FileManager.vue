<template>
  <div>
    <h5>Recent Files</h5>
    <div>
      <h5>Folder</h5>
      <!-- <div class="row"></div> -->
      <h5>Files</h5>
      <div class="files">
        <div class="row">
          <div
            class="col-lg-2 mb-3 mb-lg-5 file"
            v-for="file in files"
            :key="file.id"
          >
            <div
              class="card card-sm card-hover-shadow card-header-borderless h-100 text-center cursor-pointer"
            >
              <div
                class="card-body bg-light d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-fluid w-25"
                  src="/google-docs-icon.svg"
                  alt="Folder Icon"
                />
              </div>
              <div class="">
                <h6>{{ file.name }}</h6>
                <!-- <p class="small">Last Modified: 9/13/2023, 10:39:43 AM</p> -->
                <!-- <p class="small">0 files, 2 folders</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, reactive, computed, watch } from "vue";
import axios from "axios";

export default {
  setup() {
    let files = ref([]);

    axios("/api/files").then((response) => {
      files.value = response.data;
    });

    return {
      files,
    };
  },
};
</script>
