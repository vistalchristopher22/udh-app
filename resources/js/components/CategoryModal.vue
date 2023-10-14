<template>
  <div v-auto-animate>
    <div class="modal-backdrop fade show" v-show="isDisplay">

      <div class="modal fade bd-example-modal-lg show" tabindex="-1" style="display: block;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title m-0" id="myLargeModalLabel">Add New Category</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                @click="closeModal"></button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" v-model="category.name">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" v-model="category.description" rows="3"></textarea>

              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-soft-secondary" @click.prevent="closeModal">Close</button>
              <button type="button" class="btn" :class="`${isEditing ? 'btn-soft-success' : 'btn-soft-primary'}`"
                @click.prevent="saveCategory">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import { onMounted, ref } from 'vue';

export default {
  props: {
    isEditing: Boolean,
    isDisplay: Boolean,
    category: Object,
  },
  setup(props, { emit }) {

    const closeModal = () => emit('close');

    const saveCategory = () => {
      emit('save', props.category);
    };

    return {
      saveCategory,
      closeModal,
    };
  },
};
</script>
  
