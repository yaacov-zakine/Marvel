<script>
    async function getcaractersById(requiredId) {
  let url = "http://localhost:8080/get/caracters/" + requiredId;
  await fetch(url, { method: "GET" })
    .then((response) => {
      if (!response.ok) {
        throw new Error("C'cassé");
      }

      let parsedResponse = response.text();
      return parsedResponse;
    })
    .then((data) => {
      console.log(data);
      return data;
    })
    .catch((error) => {
      console.log("There has been a problem:", error);
    });
}

let dbRequest = getUserById(1);
</script>