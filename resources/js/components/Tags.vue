<template>
  <div>
    <div class="card">
      <div class="card-header bg-light">
        <div class="card-title text-muted">
          Complete Listing <span class="text-lowercase">of</span> Tags
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center text-uppercase">Name</th>
              <th class="text-uppercase text-center">
                <span class="ms-3"># of Documents Attached</span>
              </th>
              <th class="text-center">
                <span class="ms-3">ACCURACY (Percentage)</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="tag in tags" :key="tag.id">
              <td class="bg-light text-center">
                <span class="badge bg-primary">{{ tag.name }}</span>
              </td>
              <td class="text-center">
                {{ tag.documents_count }}
              </td>
              <td class="text-center">
                100%
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";

export default {
  setup() {
    let tags = ref([]);

    axios("/api/tags").then((response) => {
      tags.value = response.data;
    });

    return {
      tags,
    };
  },
};
</script>
