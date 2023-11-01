<template>
  <div>
    <TagModal :isEditing="isEditing" :isDisplay="isDisplay" :tag="tag" @save="saveTag" @close="isDisplay = !isDisplay"
      ref="tagModal" />
    <div class="card rounded-0 shadow-sm">
      <div class="card-header d-flex align-items-center justify-content-between bg-white">
        <div class="card-title h6h">Complete listing <span class="text-lowercase">of</span>
          <span class="fw-bold"> Tags</span>
        </div>
        <div>
          <button class="btn btn-soft-primary" @click.prevent="addNewTag">Add New Tag</button>
        </div>
      </div>

      <div class="card-body">
        <div v-if="tags.length !== 0">

          <table class="table table-bordered table-hover">
            <thead>
              <tr class="bg-light text-uppercase fw-medium">
                <th class="text-center h6 p-2" style="width : 50%;">Name</th>
                <th class="text-center h6 p-2">No. of documents attached</th>
                <th class="text-center h6 p-2">Created At</th>
                <th class="text-center h6 p-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="tag in tags" :key="tag?.id">
                <td>
                  <div class="ms-2">
                    {{ tag.name }}
                  </div>
                </td>
                <td class="text-center">
                  {{ tag?.documents_count }}
                </td>
                <td class="text-center">
                  {{ tag.created_at }}
                </td>
                <td class="text-truncate text-center">
                  <button class="btn btn-soft-success mx-2" @click="editTag(tag.id)">Edit</button>
                  <button class="btn btn-soft-danger" @click="deleteTag(tag.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>

          <nav class="float-end">
            <ul class="pagination">
              <li v-for="link in pagination.links" :key="link.label" class="page-item"
                :class="{ active: link.active, disabled: !link.url }">
                <a v-if="link.url" class="page-link" @click="fetch(link.url)" v-html="link.label"></a>
                <span v-else class="page-link" v-html="link.label"></span>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TagModal from './TagModal.vue'
import { onMounted, ref } from "vue";
import axios from "axios";
import alertify from 'alertifyjs'
import { Notyf } from 'notyf';

export default {
  components: {
    TagModal,
  },
  setup() {
    let tags = ref([]);
    const pagination = ref({
      prev_page_url: null,
      next_page_url: null,
      links: [],
    });
    const isEditing = ref(false);
    const isDisplay = ref(false);
    const tag = ref({
      id: null,
      name: null,
    });
    const notyf = new Notyf();

    const fetch = (url = '/api/tags') => {
      axios.get(url)
        .then(response => {
          tags.value = response.data.data;
          pagination.value = {
            prev_page_url: response.data.prev_page_url,
            next_page_url: response.data.next_page_url,
            links: response.data.links,
          };
        })
        .catch(error => {
          console.error(error);
        });
    };

    const editTag = (id) => {
      axios.get(`/api/tag/${id}`).then((response) => {
        tag.value = response.data;
        isDisplay.value = true;
        isEditing.value = true;
      });
    };

    const addNewTag = () => {
      isDisplay.value = true;
      isEditing.value = false;
    };

    const saveTag = (data) => {
      axios.post(`/api/tag`, data).then((response) => {
        if (response.status === 200) {
          data.name = null;
          notyf.success('Saved Successfully!');
          let [link] = pagination.value.links.filter((link) => link.active);
          fetch(link.url);
        }
      });
    };

    const deleteTag = (id) => {
      alertify.confirm("Are you sure you want to delete this record?",
        () => {
          axios.delete(`/api/tag`, {
            method: 'DELETE',
            data: {
              id: id,
            },
          }).then(response => {
            if (response.status === 200) {
              let [link] = pagination.value.links.filter((link) => link.active);
              fetch(link.url);
              notyf.success('Deleted successfully!');
            }
          })
        }).set({ title: 'Confirmation' });
    };

    onMounted(() => fetch());

    return {
      tags,
      pagination,
      fetch,
      tag,
      saveTag,
      isEditing,
      isDisplay,
      addNewTag,
      editTag,
      deleteTag,
    };
  },
};
</script>

<style scoped>
.page-link {
  cursor: pointer;
}
</style>