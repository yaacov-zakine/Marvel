<script>
    async function createUser(username, password, emailadress, pseudo) {
    let url = "register.php";
    let formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);
    formData.append("emailadress", emailadress);
    formData.append("pseudo", pseudo);
    await fetch(url, { method: "POST", body: formData })
        .then((response) => {
        if (!response.ok) {
            throw new Error("C'cassé");
        }

            let parsedResponse = response.text();
        return parsedResponse;
        })
        .then((data) => {
            return data;
        })
        .catch((error) => {
            console.log("Il y a un probleme :", error);
        });
    }

    createUser(username, password, emailadress, pseudo);
</script>