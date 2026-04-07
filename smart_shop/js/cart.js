
window.addCart = function (id) {
    alert("Clicked: " + id);

    fetch("api/add_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            product_id: id
        })
    })
        .then(res => res.text())
        .then(data => {
            console.log("Server:", data);
            alert("Added to cart ✅");
        })
        .catch(err => {
            console.error(err);
            alert("Error ❌");
        });
}