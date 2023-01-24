function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}
function saved(){
    sleep(3000).then(() => {
        document.getElementById('saved').style.display = 'block'
    });
}

setTimeout(function () {
    document.getElementById('saved').style.display = 'none'
}, 10000)