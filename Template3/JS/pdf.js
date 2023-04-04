function pdfwait() {
    setTimeout(() => {
        flag = true;
    }, 2000);
    window.open("pdf.php");
    setTimeout(() => {
        flag = true;
    }, 4000);
    return flag;
}