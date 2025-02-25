<script>
const registrationForm = document.getElementById("body");

async function createUser(username, password, emailadress, pseudo) {
  let url = "register.php";
  let formData = new FormData();
  formData.append("username", username);
  formData.append("password", password);
  formData.append("emailadress", emailadress);
  formData.append("pseudo", pseudo);
  await fetch(url, { method: "POST", body: formData })
    .then((response) => {

      console.log("caca");
      if (!response.ok) {
        throw new Error("C'cassé");
      }
      return response.text();
    })
    .then((data) => {
      console.log(data);
      return data;
    })
    .catch((error) => {
      console.log("Il y a un probleme :", error);
    });
}
let registerForm = () => {
  document.addEventListener("click", () => {
    localStorage.setItem('Username',document.querySelector(".username").value);
    localStorage.setItem('Password',document.querySelector(".password").value);
    localStorage.setItem('Email',document.querySelector(".emailadress").value);
    localStorage.setItem('Pseudo',document.querySelector(".pseudo").value);
  });


registerForm();
console.log(localStorage.getItem('Username'));
}

</script>