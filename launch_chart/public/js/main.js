const handleDelete = (event) => {
  event.preventDefault();
  const formData = new FormData(event.target);
  const userId = formData.get("userId");

  fetch(`./profile?userId=${userId}`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
      if (data.message === "Successful") {
        window.location.href = "./login";
      } else {
        console.error("Failed to delete the account:", data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Failed to delete the account");
    });
};

const logout=()=>{
  fetch('./login',{
    method:'PUT'
  })
  .then(response=>response.json())
  .then(data=>{
    if(data.message==="You have been logged out!"){
      window.location.href="./login";
    }
    else{
      console.error("Failed to logout:",data.message);
    }
  })
}