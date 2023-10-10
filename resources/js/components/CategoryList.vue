<template>
  <div>

    <CategoryModal :isEditing="isEditing" :isDisplay="isDisplay" :category="category" @save="saveCategory"
      @close="isDisplay = !isDisplay" ref="categoryModal" />

    <div class="card rounded-0 shadow-sm">
      <div class="card-header d-flex align-items-center justify-content-between bg-white">
        <div class="card-title h6h">Complete listing <span class="text-lowercase">of</span> <span
            class="fw-bold">Categories</span></div>
        <div>
          <button class="btn btn-soft-primary" @click="addCategory">Add New Category</button>
        </div>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr class="bg-light text-uppercase fw-medium">
              <th class="text-center h6 p-2" style="width : 12%;">Name</th>
              <th class="text-center h6 p-2" style="width : 70%;">Description</th>
              <th class="text-center h6 p-2">Slug</th>
              <th class="text-center h6 p-2">Created At</th>
              <th class="text-center h6 p-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="category in categories" :key="category.id">
              <td>
                <div class="ms-2">
                  {{ category.name }}
                </div>
              </td>
              <td>{{ category.description }}</td>
              <td class="text-center">{{ category.slug }}</td>
              <td class="text-center text-truncate">{{ category.created_at }}</td>
              <td class="text-truncate text-center">
                <button class="btn btn-soft-success mx-2" @click="editCategory(category.id)">Edit</button>
                <button class="btn btn-soft-danger" @click="deleteCategory(category.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>

        <nav class="float-end">
          <ul class="pagination">
            <li v-for="link in pagination.links" :key="link.label" class="page-item"
              :class="{ active: link.active, disabled: !link.url }">
              <a v-if="link.url" class="page-link" @click="fetchCategories(link.url)" v-html="link.label"></a>
              <span v-else class="page-link" v-html="link.label"></span>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import CategoryModal from './CategoryModal.vue';
import { ref, onMounted } from 'vue';
import alertify from 'alertifyjs'
import axios from 'axios';
import { Notyf } from 'notyf';


export default {
  components: {
    CategoryModal,
  },
  setup() {
    const isEditing = ref(false);
    const category = ref({
      id: null,
      name: null,
      description: null,
    });
    const isDisplay = ref(false);
    const categories = ref([]);
    const pagination = ref({
      prev_page_url: null,
      next_page_url: null,
      links: [],
    });
    const notyf = new Notyf();


    const fetchCategories = (url = '/api/categories') => {
      axios.get(url)
        .then(response => {
          categories.value = response.data.data;
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

    const addCategory = () => {
      category.value = {
        id: null,
        name: null,
        description: null,
      };
      isEditing.value = false;
      isDisplay.value = true;
    };

    const editCategory = (id) => {
      axios.get(`/api/category/${id}`)
        .then(response => {
          category.value = response.data;
          isEditing.value = true;
          isDisplay.value = true;
        })
        .catch(error => {
          console.error(error);
        });
    };

    const saveCategory = (data) => {
      axios.post(`/api/category`, data).then((response) => {
        if (response.status === 200) {
          let [link] = pagination.value.links.filter((link) => link.active);
          fetchCategories(link.url);
          isEditing.value = false;
          isDisplay.value = false;
          notyf.success('Saved successfully!');
        }
      });
    };

    const deleteCategory = (id) => {
      alertify.confirm("Are you sure you want to delete this record?",
        () => {
          axios.delete(`/api/category`, {
            method: 'DELETE',
            data: {
              id: id,
            },
          }).then(response => {
            if (response.status === 200) {
              let [link] = pagination.value.links.filter((link) => link.active);
              fetchCategories(link.url);
              notyf.success('Deleted successfully!');
            }
          })
        }).set({ title: 'Confirmation' });
    };


    onMounted(() => {
      fetchCategories();
    });

    return {
      categories,
      pagination,
      fetchCategories,
      isEditing,
      isDisplay,
      category,
      addCategory,
      editCategory,
      saveCategory,
      deleteCategory
    };
  }
};
</script>


<style scoped>
.page-link {
  cursor: pointer;
}
</style>