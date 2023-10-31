<template>
  <div v-auto-animate>
    <div v-if="fullScreenLoader" class="fullscreen-loader">
      <div class="spinner"></div>
    </div>
    <div v-if="fileSource" class="file-preview" @click="fileSource = null">
      <button class="btn btn-lg btn-danger" @click="fileSource = null">CLOSE</button>
      <iframe
        :src="fileSource"
        frameborder="0"
        width="100%"
        height="100%"
        allowfullscreen
      ></iframe>
    </div>

    <div class="d-none">
      <input v-model="newFolderName" type="text" placeholder="New folder name" />
      <button @click="createFolder">Create Folder</button>
      <div>
        <label class="btn btn-primary">
          Upload
          <input type="file" @change="uploadFile" class="d-none" />
        </label>
      </div>
      <div class="input-group">
        <input
          v-model="searchQuery"
          @input="searchFiles"
          class="form-control"
          type="text"
          placeholder="Search for files..."
        />
      </div>
    </div>
    <div class="breadcrumbs mb-4">
      <span @click="navigateBreadcrumb(-1)" class="h5 text-dark">My Drive /</span>
      <span v-for="(breadcrumb, index) in breadcrumbs" :key="breadcrumb.id">
        <span @click="navigateBreadcrumb(index)" class="h5 text-dark ms-1">{{
          breadcrumb.name
        }}</span>
      </span>
    </div>
    <div class="d-flex flex-column">
      <div class="row">
        <div class="col-lg-2 bg-light p-0 border overflow-hidden" style="height: 85vh">
          <ul class="list-group bg-light list-group-flush">
            <li
              :class="{ active: selectedSection === 'My Drive' }"
              class="list-group-item"
              style="cursor: pointer"
              @click="fetchFiles"
            >
              My Drive
            </li>
            <li
              :class="{ active: selectedSection === 'Shared with me' }"
              class="list-group-item"
              style="cursor: pointer"
              @click="fetchSharedFiles"
            >
              Shared with me
            </li>

            <li
              :class="{ active: selectedSection === 'Trash' }"
              class="list-group-item"
              style="cursor: pointer"
              @click="fetchTrashFiles"
            >
              Trash
            </li>
          </ul>
        </div>

        <div class="col-lg-10">
          <div class="card">
            <div class="card-body p-0">
              <div class="container-fluid">
                <!-- Breadcrumb and Search Bar -->

                <!-- File List -->
                <div
                  class="files-drop-zone scrollable overflow-auto"
                  @drop.prevent="onDrop"
                  @dragover.prevent
                  @dragenter="dragEnter = true"
                  @dragleave="dragEnter = false"
                >
                  <p v-if="dragEnter" class="drop-hint">Drop your files here to upload</p>

                  <!-- File List -->
                  <div class="files-grid mt-4">
                    <div
                      v-for="folder in folders"
                      :key="folder.id"
                      class="file-item card"
                      @click="selectFolder(folder)"
                    >
                      <div class="card-body">
                        <p>{{ folder.name }} - <strong>folder</strong></p>
                      </div>
                    </div>
                    <div
                      class="card file-item"
                      v-for="file in files"
                      :key="file.id"
                      @contextmenu="showContextMenu(file, $event)"
                    >
                      <div
                        style="
                          height: 15vh;
                          width: auto;
                          background-size: cover;
                          background-position: top;
                        "
                        :style="`background-image:url(${file.thumbnail}); background-repeat : no-repeat;`"
                      ></div>
                      <!-- <img
                      :src="`${file.thumbnail}`"
                      class="card-img-top w-100 bg-light-alt"
                      alt=""
                    /> -->

                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col">
                            <h4 class="h5">{{ file.name }}</h4>
                          </div>
                          <!--end col-->
                          <div class="col-auto">
                            <span class="badge badge-outline-light">{{
                              file.created_at
                            }}</span>
                          </div>
                          <!--end col-->
                        </div>
                        <!--end row-->
                      </div>
                      <!--end card-header-->
                      <div class="card-body">
                        <p class="card-text text-muted">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                      </div>
                      <!--end card -body-->
                    </div>
                    <!-- <div
                    v-for="file in files"
                    :key="file.id"
                    class="file-item card"
                    @contextmenu="showContextMenu(file, $event)"
                  >
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center justify-content-center">
                       
                      </div>
                    </div>

                    <div class="card-footer">
                      {{ file.name }}
                    </div>
                  </div> -->
                  </div>
                </div>

                <!-- Context Menu -->
                <div
                  v-if="contextMenu.show"
                  class="context-menu dropdown-menu show"
                  :style="{ top: contextMenu.y + 'px', left: contextMenu.x + 'px' }"
                >
                  <a class="dropdown-item" @click="renameFile(contextMenu.file)"
                    >Rename</a
                  >
                  <a class="dropdown-item" @click="deleteFile(contextMenu.file)"
                    >Delete</a
                  >
                  <a class="dropdown-item" @click="prepareMoveFile(contextMenu.file)"
                    >Move to...</a
                  >
                  <a class="dropdown-item" @click="viewFile(contextMenu.file)">View</a>
                  <a class="dropdown-item" @click="downloadFile(contextMenu.file)"
                    >Download</a
                  >
                </div>

                <!-- Folder Picker Modal -->
                <div v-if="showFolderPicker" class="folder-picker-modal">
                  <h4>Select Folder</h4>
                  <ul>
                    <li v-for="folder in folders" :key="folder.id">
                      <button @click="moveFileToFolder(folder)">{{ folder.name }}</button>
                    </li>
                  </ul>
                  <button @click="showFolderPicker = false">Close</button>
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
import axios from "axios";

export default {
  data() {
    return {
      fileSource: null,
      searchQuery: null,
      fullScreenLoader: false,
      selectedSection: "My Drive",
      breadcrumbs: [],
      dragEnter: false,
      files: [],
      folders: [],
      selectedFolder: null,
      showFolderPicker: false,
      contextMenu: {
        show: false,
        x: 0,
        y: 0,
        file: null,
      },
      newFolderName: "",
    };
  },
  methods: {
    viewFile(file) {
      const parts = file.file_path.split(".");
      parts[parts.length - 1] = "pdf";
      let pdfFile = parts.join(".");
      this.fileSource = pdfFile.replace("public", "storage");
    },

    downloadFile(file) {
      const downloadLink = document.createElement("a");
      downloadLink.href = file.file_path.replace("public", "/storage/");
      downloadLink.download = file.name;
      downloadLink.click();
    },

    async fetchTrashFiles() {
      this.fullScreenLoader = true;
      this.selectedSection = "Trash";
      let response = await axios.get("/files/trash");
      this.files = response.data;
      this.fullScreenLoader = false;
    },
    async createFolder() {
      if (!this.newFolderName) {
        alert("Please enter a folder name.");
        return;
      }

      try {
        const response = await axios.post("/folders", {
          name: this.newFolderName,
        });

        // Add the newly created folder to the list of folders
        this.folders.push(response.data);

        // Clear the input field
        this.newFolderName = "";
      } catch (error) {
        console.error("Error creating folder:", error);
      }
    },
    async onDrop(event) {
      this.fullScreenLoader = true;
      // Obtain the dragged files from the event
      const files = event.dataTransfer.files;

      if (!files.length) return;

      for (let i = 0; i < files.length; i++) {
        const file = files[i];

        // Use FormData to package each file for uploading
        const formData = new FormData();
        formData.append("file", file);

        try {
          const response = await axios.post("/file/upload", formData);
          this.files.push(response.data);
        } catch (error) {
          console.error(`There was an issue uploading the file ${file.name}:`, error);
        }
      }

      this.fullScreenLoader = false;
      this.dragEnter = false; // Reset drag state
    },
    async searchFiles() {
      if (this.searchQuery.length > 2) {
        const response = await axios.get(`/file/search?query=${this.searchQuery}`);
        this.files = response.data;
      } else {
        this.fetchFiles();
      }
    },
    async renameFile(file) {
      const newName = prompt("Enter new name:", file.name);
      if (newName) {
        await axios.put(`/file/${file.id}/rename`, { new_name: newName });
        this.fetchFiles();
      }
    },
    async deleteFile(file) {
      const confirmDelete = confirm(`Are you sure you want to delete ${file.name}?`);
      if (confirmDelete) {
        await axios.delete(`/file/${file.id}`);
        this.fetchFiles();
      }
    },
    async uploadFile(event) {
      this.fullScreenLoader = true;
      const formData = new FormData();
      formData.append("file", event.target.files[0]);
      formData.append("description", this.description);

      try {
        const response = await axios.post("/file/upload", formData);
        this.files.push(response.data);
        this.description = ""; // reset description
        this.fullScreenLoader = false;
      } catch (error) {
        console.error("File upload error:", error);
        this.fullScreenLoader = false;
      }
    },
    async fetchFiles() {
      this.fullScreenLoader = true;
      this.selectedSection = "My Drive";
      try {
        this.breadcrumbs = [];
        this.fetchFolders();
        const response = await axios.get("/file/files");
        if (response.status === 200) {
          this.files = response.data;
        } else {
          console.error("Failed to fetch files. Status Code:", response.status);
        }
      } catch (error) {
        console.error("An error occurred while fetching files:", error.message);
      } finally {
        this.fullScreenLoader = false;
      }
    },
    showContextMenu(file, event) {
      event.preventDefault();
      this.contextMenu.show = true;
      this.contextMenu.x = event.clientX;
      this.contextMenu.y = event.clientY;
      this.contextMenu.file = file;
    },
    hideContextMenu() {
      this.contextMenu.show = false;
    },
    async fetchFolders() {
      try {
        const response = await axios.get("/folders");
        this.folders = response.data;
      } catch (error) {
        console.error("An error occurred while fetching folders:", error.message);
      }
    },
    navigateBreadcrumb(index) {
      this.breadcrumbs.splice(index + 1);
      const folder = this.breadcrumbs[index];
      if (folder) {
        this.fetchFilesByFolder(folder.id);
      } else {
        this.fetchFiles();
        this.fetchFolders();
      }
    },
    selectFolder(folder) {
      this.selectedFolder = folder;
      this.breadcrumbs.push(folder);
      this.fetchFilesByFolder(folder.id);
    },
    async fetchFilesByFolder(folderId, folderObject = {}) {
      // Clear the current files and folders
      this.files = [];
      this.folders = [];
      this.breadcrumbs.push(folderObject);

      try {
        const response = await axios.get(`/file/folder-files?folder_id=${folderId}`);
        if (response.data && response.data.files) {
          this.files = response.data.files;
        }
        if (response.data && response.data.folders) {
          this.folders = response.data.folders;
        }
      } catch (error) {
        console.error(
          "An error occurred while fetching files for folder:",
          error.message
        );
      }
    },
    prepareMoveFile(file) {
      this.selectedFile = file;
      this.showFolderPicker = true;
    },
    openFolder(folder) {
      this.selectedFolder = folder;
      this.breadcrumbs.push(folder);
      this.fetchFilesByFolder(folder.id);
    },
    async moveFileToFolder(folder) {
      try {
        const response = await axios.put(`/file/${this.selectedFile.id}/move`, {
          folder_id: folder.id,
        });
        if (response.status === 200) {
          this.showFolderPicker = false;
          this.fetchFilesByFolder(response.data.data.id, response.data.data);
        }
      } catch (error) {
        console.error("An error occurred while moving the file:", error.message);
      }
    },
  },
  mounted() {
    this.fetchFiles();
    this.fetchFolders();
    document.addEventListener("click", this.hideContextMenu);
  },
  beforeDestroy() {
    document.removeEventListener("click", this.hideContextMenu);
  },
};
</script>

<style scoped>
.file-manager-container {
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 250px;
  border-right: 1px solid #ddd;
  overflow-y: auto;
}

.main-content {
  flex: 1;
  padding: 20px;
  overflow-y: auto;
}

.top-bar {
  padding: 10px 0;
}

.files-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 15px;
}

.context-menu {
  position: fixed;
  z-index: 1000;
}

.files-drop-zone {
  position: relative;
}

.drop-hint {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
}

.folder-picker-modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2000;
  background: #fff;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.breadcrumbs span {
  cursor: pointer;
}

.breadcrumbs span:hover {
  text-decoration: underline;
}

.scrollable {
  max-height: 75vh;
  overflow-y: auto;
}

.fullscreen-loader {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 99999; /* Ensure it's above other elements */
}

.spinner {
  border: 4px solid rgba(0, 0, 0, 0.3);
  border-top: 4px solid #3498db; /* Blue color, you can change it */
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite; /* CSS animation for spinning */
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.file-preview {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0%;
  right: 0%;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: black; /* Add background color if needed */
  padding-left: 20rem;
  padding-right: 20rem;
  padding-top: 2rem;
  padding-bottom: 6rem;
}
</style>
