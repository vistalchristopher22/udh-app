<template>
  <div>
    <div class="modal-backdrop fade show" v-show="isDisplay">

      <div class="modal fade bd-example-modal-lg show" tabindex="-1" style="display: block;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title m-0" id="myLargeModalLabel">Add New Tag</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                @click="closeModal"></button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" v-model="tag.name">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-soft-secondary" @click.prevent="closeModal">Close</button>
              <button type="button" class="btn" :class="`${isEditing ? 'btn-soft-success' : 'btn-soft-primary'}`"
                @click.prevent="saveTag">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>

export default {
  props: {
    isEditing: Boolean,
    isDisplay: Boolean,
    tag: Object,
  },
  setup(props, { emit }) {

    const closeModal = () => emit('close');

    const saveTag = () => {
      emit('save', props.tag);
    };

    return {
      saveTag,
      closeModal,
    };
  },
};
</script>
  
