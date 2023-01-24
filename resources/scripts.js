function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

document.getElementById('save-btn').addEventListener("click", function() {
    alert("Plan saved!\nRefresh page to see changes.");

});
