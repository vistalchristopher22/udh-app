<template>
  <div>

    <div class="card rounded-0  border-right-0">
            <div class="card-header d-flex align-items-center justify-content-between bg-white">
              <div class="card-title h6h">Complete listing <span class="text-lowercase">of</span> <span
                  class="fw-bold">User Authentication Activities</span></div>
            </div>
            
            <div class="card-body">
              <table class="table table-striped table-hover table-bordered border">
                <thead>
                  <tr class="bg-light">
                    <th class="text-uppercase text-center">Action</th>
                    <th class="text-uppercase text-center">Browser</th>
                    <th class="text-uppercase text-center">Platform</th>
                    <th class="text-uppercase text-center">IP</th>
                    <th class="text-uppercase text-center">Page</th>
                    <th class="text-uppercase text-center">Date and Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="authentication in authentications" :key="authentication.id">
                    <td class="text-center">{{ authentication.action_type }}</td>
                    <td class="text-center">{{ authentication.browser_name }}</td>
                    <td class="text-center">{{ authentication.platform }}</td>
                    <td class="text-center">{{ authentication.ip }}</td>
                    <td>{{ authentication.page }}</td>
                    <td>{{ authentication.created_at }}</td>
                  </tr>
                </tbody>
              </table>
              <nav class="float-end">
                <ul class="pagination">
                  <li v-for="link in authenticationPagination.links" :key="link.label" class="page-item"
                    :class="{ active: link.active, disabled: !link.url }">
                    <a v-if="link.url" class="page-link" @click="fetchVisits(link.url)" v-html="link.label"></a>
                    <span v-else class="page-link" v-html="link.label"></span>
                  </li>
                </ul>
              </nav>
            </div>
          </div>

      <div class="card rounded-0  border-right-0">
            <div class="card-header d-flex align-items-center justify-content-between bg-white">
              <div class="card-title h6h">Complete listing <span class="text-lowercase">of</span> <span
                  class="fw-bold">User Visit Activities</span></div>
            </div>
            
            <div class="card-body">
              <table class="table table-striped table-hover table-bordered border">
                <thead>
                  <tr class="bg-light">
                    <th class="text-center text-uppercase">Browser</th>
                    <th class="text-center text-uppercase">Platform</th>
                    <th class="text-center text-uppercase">IP</th>
                    <th>Page</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="visit in visits" :key="visit.id">
                    <td class="text-center">{{ visit.browser_name }}</td>
                    <td class="text-center">{{ visit.platform }}</td>
                    <td class="text-center">{{ visit.ip }}</td>
                    <td>{{ visit.page }}</td>
                  </tr>
                </tbody>
              </table>
              <nav class="float-end">
                <ul class="pagination">
                  <li v-for="link in visitsPagination.links" :key="link.label" class="page-item"
                    :class="{ active: link.active, disabled: !link.url }">
                    <a v-if="link.url" class="page-link" @click="fetchVisits(link.url)" v-html="link.label"></a>
                    <span v-else class="page-link" v-html="link.label"></span>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
  </div>
</template>

<script>
import { onMounted, ref, watchEffect } from "vue";

export default {
  props : {
    id : {
      required : true,
      type :Number,
    },  
  },
  setup(props) {

      const visits = ref([]);
      const visitsPagination = ref({
        prev_page_url: null,
        next_page_url: null,
        links: [],
      });
      const authentications = ref([]);
      const authenticationPagination = ref([]);
   

      const fetchVisits = (url) => {
          axios.get(url)
            .then(response => {
              visits.value = response.data.data;
              visitsPagination.value = {
                prev_page_url: response.data.prev_page_url,
                next_page_url: response.data.next_page_url,
                links: response.data.links,
              };
            })
            .catch(error => {
              console.error(error);
            });
       };
      
       const fetchAuthentication = (url) => {
          axios.get(url)
            .then(response => {
              authentications.value = response.data.data;
              authenticationPagination.value = {
                prev_page_url: response.data.prev_page_url,
                next_page_url: response.data.next_page_url,
                links: response.data.links,
              };
            })
            .catch(error => {
              console.error(error);
            });
       };


      watchEffect(() => {
        if(props.id) {
          fetchVisits(`/api/user-visits-activities/${props.id}`);
          fetchAuthentication(`/api/user-authentications-activities/${props.id}`);
        }
      });
        
      onMounted(() => {
      });

      return {
        authentications,
        authenticationPagination,
        visits,
        visitsPagination,
        fetchVisits,
        fetchAuthentication,
        
      };
  },
};
</script>

<style scoped>
  .page-link {
    cursor:pointer;
  } 
</style>
  