import React from "react";
import axios from "axios";

axios
  .get("serverappHttpControllersAuthController")
  .then((response) => {
    // Handle the response
    console.log(response.data);
    // You can do more with the data here
  })
  .catch((error) => {
    // Handle errors
    console.error("There was an error with the request:", error);
  });
function Login() {
  return (
    <div>
      <div>
        <p>We use Microsoft 365 for accessing your account.</p>
        <p>Click the button below to get started.</p>
      </div>
      <div>
        <p>
          <a href="{{ route('connect') }}">Login with your Microsoft Account</a>
        </p>
      </div>
    </div>
  );
}

export default Login;
