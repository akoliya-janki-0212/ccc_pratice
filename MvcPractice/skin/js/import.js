function importData() {
    // document.write(1);
    let type = document.getElementById("import-type").getAttribute("type");
    let pendding = document.getElementById("import-type").getAttribute("pending");
    let penddingCount = document.getElementById("pending-data");
    let count = 0;
    for (let i = 0; i < parseInt(pendding); i++) {
        let obj = new XMLHttpRequest();
        obj.onreadystatechange = function () {
            if (obj.readyState == 4 && obj.status == 200) {
                if (obj.responseText == "true") {
                    count++;
                    document.getElementById(
                        "progressbar"
                    ).innerHTML = `(${count}/${pendding})`;
                    penddingCount.innerHTML = parseInt(pendding) - parseInt(count);
                }
            }
        };
        // print_r(`import?type=${type}`); die;
        obj.open("GET", `import?type=${type}`, true);
        obj.send();
    }
}