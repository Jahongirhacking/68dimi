function copyElem(elem){
    var copyText = document.getElementById("copy");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
}