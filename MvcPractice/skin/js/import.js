
async function importData() {
    let type = document.getElementById("import-type").getAttribute("type");
    console.log(type);
    let pendding = document.getElementById("import-type").getAttribute("pending");
    let penddingCount = document.getElementById("pending-data");
    let count = 0;
    try {
        console.log(parseInt(pendding));
        for (let i = 0; i < parseInt(pendding); i++) {
            const response = await fetch(`import/?type=${type}`);
            // const data = await response.json();
            document.getElementById("progressbar").innerHTML = `(${++count}/${pendding})`;
            penddingCount.innerHTML = parseInt(pendding) - parseInt(count);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}