<template>
  <div class="form-group mb-2">
    <label class="form-label" for="email">Email</label>
    <div class="input-group">
      <input
        type="email"
        class="form-control"
        name="email"
        id="email"
        placeholder="Enter email"
      />
    </div>
  </div>
  <!--end form-group-->

  <div class="form-group mb-2">
    <label class="form-label" for="password">Password</label>
    <div class="input-group">
      <input
        type="password"
        class="form-control"
        name="password"
        id="password"
        placeholder="Enter password"
      />
    </div>
  </div>
  <!--end form-group-->

  <div class="form-group row my-3">
    <div class="col-sm-6">
      <div class="custom-control custom-switch switch-success">
        <input
          type="checkbox"
          class="custom-control-input"
          id="customSwitchSuccess"
        />
        <label class="form-label text-muted" for="customSwitchSuccess">
          &nbsp; Remember Me</label
        >
      </div>
    </div>
    <!--end col-->
    <div class="col-sm-6 text-end">
      <a href="auth-recover-pw.html" class="text-muted font-13"
        ><i class="dripicons-lock"></i> Forgot password?</a
      >
    </div>
    <!--end col-->
  </div>
  <!--end form-group-->

  <div class="form-group mb-0 row">
    <div class="col-12">
      <button
        class="btn btn-primary w-100 waves-effect waves-light"
        type="submit"
      >
        Log In <i class="fas fa-sign-in-alt ms-1"></i>
      </button>
    </div>
    <!--end col-->
  </div>
  <!--end form-group-->

  <!--end form-->
  <div class="account-social">
    <h6 class="mb-3">OR</h6>
  </div>
  <div class="d-flex align-items-center justify-content-center">
    <!-- auto-login -->
    <center>
      <GoogleLogin :callback="callback" prompt class="cursor-pointer w-100">
      </GoogleLogin>
    </center>
  </div>
</template>
<script setup>
import { decodeCredential, googleLogout } from "vue3-google-login";
import { ref } from "vue";
const user = ref({});
const callback = (response) => {
  user.value = decodeCredential(response.credential);
  console.log(user.value);
  //   if (
  //     user.value.email.endsWith("nemsu.edu.ph") &&
  //     user.value.hd == "nemsu.edu.ph"
  //   ) {
  //     window.location.href = "/dashboard";
  //     localStorage.setItem("user", JSON.stringify(user.value));
  //   }
};
const logout = () => googleLogout();
</script>
